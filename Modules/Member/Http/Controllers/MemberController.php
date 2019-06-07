<?php

namespace Modules\Member\Http\Controllers;

use App\Helpers\TownshipHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Modules\Member\Entities\Member;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Member::orderBy('member_id', 'desc')->paginate(20);
        foreach ($data as $value) {
            switch ($value->member_enable) {
                case 0:
                    $value->_member_enable = "未驗證";
                    break;
                case 1:
                    $value->_member_enable = "已驗證";
                    break;
            }
        }
        return view('backstage.member.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(TownshipHelper $townshipHelper)
    {
        $area = $townshipHelper->area();
        $city = $townshipHelper->city();
        $zipcode = $area[0]['area_zipcode'];
        return view('backstage.member.create', compact('area', 'city', 'zipcode'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');


        //dd($input);
        $rules = [
            //'member_account'=>'required',
            'member_password' => 'required|regex:/^[a-zA-Z]/|between:6,8|same:member_password_check',
//            'member_identity'=>'required|regex:/^[A-Z]/|between:10,10',
            'member_mail' => 'required|email',
        ];

        $message = [
            //'member_account.required'=>'會員帳號不能為空!',
            'member_password.required' => '密碼內容不能為空!',
            'member_password.regex' => '密碼開頭必須為英文字母!',
            'member_password.between' => '密碼長度必須為6至8位!',
            'member_password.same' => '密碼必須相同!',
            'member_mail.required' => '電子信箱不能為空!',
            'member_mail.email' => '必須為信箱格式',
//            'member_mail.same'=>'電子信箱必須相同!',
//            'member_identity.required'=>'身分證內容不能為空!',
//            'member_identity.regex'=>'身分證開頭必須為英文字母!',
//            'member_identity.between'=>'身分證長度必須為10位!',
        ];

        $validator = Validator::make($input, $rules, $message);
        $member = Input::except('_token', 'member_password_check');
        $member["member_account"] = $member["member_mail"];
        $member['member_password'] = Crypt::encrypt($member['member_password']);
        if (Member::where("member_account", $member["member_account"])->count() > 0) {
            return back()->with('errors', '此帳號已經被註冊！');
        }
        if ($validator->passes()) {
            $re = Member::create($member);
            if ($re) {
                return redirect('member');
            } else {
                return back()->with('errors', '數據填充錯誤, 請稍後重試');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('backstage.member.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($member_id, TownshipHelper $townshipHelper)
    {
        $data = Member::find($member_id);
        $data['member_password'] = Crypt::decrypt($data['member_password']);
        $city = $townshipHelper->city();
        $area = $townshipHelper->area();

        return view('backstage.member.edit', compact('data', 'city', 'area'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $member_id)
    {
        $input = Input::except('_token', '_method');
        $input['member_password'] = Crypt::encrypt($input['member_password']);
        $re = Member::where('member_id', $member_id)->update($input);
        if ($re) {
            return redirect('member');
        } else {
            return back()->with('errors', '會員更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($member_id)
    {
//        $member = Members::find($member_id);
        $re = Member::where('member_id', $member_id)->delete();

        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '會員刪除成功!',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '會員刪除失敗, 請稍後重試!',
            ];
        }
        return $data;
    }

    //連動下拉城市
    public function city(TownshipHelper $townshipHelper)
    {
        $input = Input::all();
        $re = [];
        foreach ($townshipHelper->area() as $v) {
            if ($input['city_id'] == $v['city_id']) {
                $re[] = [
                    'area' => $v['area'],
                    'areaid' => $v['area_id'],
                    'zipcode' => $v['area_zipcode'],
                ];
            }
        }
        return $re;
    }

    //連動下拉地區
    public function area(TownshipHelper $townshipHelper)
    {
        $input = Input::all();
        foreach ($townshipHelper->area() as $v) {
            if ($input['area_id'] == $v['area_id']) {
                $re = $v['area_zipcode'];
            }
        }
        return $re;
    }
}
