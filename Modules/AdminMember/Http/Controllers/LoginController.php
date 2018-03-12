<?php

namespace Modules\AdminMember\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Modules\AdminMember\Entities\AdminMember;
use Modules\AdminMember\Entities\AdminMemberLog;

class LoginController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     * @return Response
//     */
//    public function index()
//    {
//        return view('adminmember::index');
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     * @return Response
//     */
//    public function create()
//    {
//        return view('adminmember::create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     * @param  Request $request
//     * @return Response
//     */
//    public function store(Request $request)
//    {
//    }
//
//    /**
//     * Show the specified resource.
//     * @return Response
//     */
//    public function show()
//    {
//        return view('adminmember::show');
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     * @return Response
//     */
//    public function edit()
//    {
//        return view('adminmember::edit');
//    }
//
//    /**
//     * Update the specified resource in storage.
//     * @param  Request $request
//     * @return Response
//     */
//    public function update(Request $request)
//    {
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     * @return Response
//     */
//    public function destroy()
//    {
//    }
    public function login(Request $request) {
        try{
            $input = $request->input();
            $admin_member = AdminMember::where('member_account',$input['member_account'])->first();

            if(empty($admin_member)){
                return back()->with('msg','帳號或是密碼錯誤');
            }else if($admin_member->member_account != $input['member_account'] || Crypt::decrypt($admin_member->member_password) != $input['member_password']){
                return back()->with('msg','帳號或是密碼錯誤');
            }

            session(['admin_member'=>$admin_member]);

//            dd(session('member.member_level'));

            $ip = $this->transform_ip($_SERVER['REMOTE_ADDR']);;

            AdminMemberLog::create([
                'account'=>$input['member_account'],
                'ip'=>$ip,
            ]);

            return redirect('admin');

        }catch (\Exception $e){
            return view('backstage.adminmember.login');
        }

    }

    public function quit()
    {
        session(['member'=>null]);
        return redirect('member/login');
    }

//    public function generate_password()
//    {
//        $str = '1234';
//        $password = Crypt::encrypt($str);
//        echo $password;
//    }

    public function transform_ip($ip)
    {
        //ipv6 轉 ipv4
        if (($ip == '0000:0000:0000:0000:0000:0000:0000:0001') OR ($ip == '::1')) {
            $ip = '127.0.0.1';
        }
        $ip = strtolower($ip);
        // remove unsupported parts
        if (($pos = strrpos($ip, '%')) !== false) {
            $ip = substr($ip, 0, $pos);
        }
        if (($pos = strrpos($ip, '/')) !== false) {
            $ip = substr($ip, 0, $pos);
        }
        $ip = preg_replace("/[^0-9a-f:\.]+/si", '', $ip);
        // check address type
        $is_ipv6 = (strpos($ip, ':') !== false);
        $is_ipv4 = (strpos($ip, '.') !== false);
        if ((!$is_ipv4) AND (!$is_ipv6)) {
            return false;
        }
        if ($is_ipv6 AND $is_ipv4) {
            // strip IPv4 compatibility notation from IPv6 address
            $ip = substr($ip, strrpos($ip, ':') + 1);
            $is_ipv6 = false;
        }
        if ($is_ipv4) {
            // convert IPv4 to IPv6
            $ip_parts = array_pad(explode('.', $ip), 4, 0);
            if (count($ip_parts) > 4) {
                return false;
            }
            for ($i = 0; $i < 4; ++$i) {
                if ($ip_parts[$i] > 255) {
                    return false;
                }
            }
            $part7 = base_convert(($ip_parts[0] * 256) + $ip_parts[1], 10, 16);
            $part8 = base_convert(($ip_parts[2] * 256) + $ip_parts[3], 10, 16);
            $ip = '::ffff:'.$part7.':'.$part8;
        }
        // expand IPv6 notation
        if (strpos($ip, '::') !== false) {
            $ip = str_replace('::', str_repeat(':0000', (8 - substr_count($ip, ':'))).':', $ip);
        }
        if (strpos($ip, ':') === 0) {
            $ip = '0000'.$ip;
        }
        // normalize parts to 4 bytes
        $ip_parts = explode(':', $ip);
        foreach ($ip_parts as $key => $num) {
            $ip_parts[$key] = sprintf('%04s', $num);
        }
        $ip = implode(':', $ip_parts);
        $aa = base_convert(substr($ip_parts['6'],2),16,10);
        $bb = base_convert(substr($ip_parts['6'],0,2),16,10);
        $cc = base_convert(substr($ip_parts['7'],2),16,10);
        $dd = base_convert(substr($ip_parts['7'],0,2),16,10);
        $ip = $bb.'.'.$aa.'.'.$dd.'.'.$cc;

        return $ip;
    }
}
