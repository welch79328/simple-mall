<?php

namespace Modules\AdminMember\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Modules\AdminMember\Entities\AdminMember;

class AdminMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = AdminMember::orderBy('member_id','desc')->paginate(10);
        return view('backstage.adminmember.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backstage.adminmember.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        $rules=[
            'member_account'=>'required',
            'member_password'=>'required|regex:/^[a-zA-Z]/|between:6,8|same:member_password_check',
//            'member_identity'=>'required|regex:/^[A-Z]/|between:10,10',
            'member_mail'=>'required|email',
        ];

        $message=[
            'member_account.required'=>'會員帳號不能為空!',
            'member_password.required'=>'密碼內容不能為空!',
            'member_password.regex'=>'密碼開頭必須為英文字母!',
            'member_password.between'=>'密碼長度必須為6至8位!',
            'member_password.same'=>'密碼必須相同!',
            'member_mail.required'=>'電子信箱不能為空!',
            'member_mail.email'=>'必須為信箱格式',
//            'member_mail.same'=>'電子信箱必須相同!',
//            'member_identity.required'=>'身分證內容不能為空!',
//            'member_identity.regex'=>'身分證開頭必須為英文字母!',
//            'member_identity.between'=>'身分證長度必須為10位!',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = AdminMember::create($input);
//            BackupMembers::create($input);
            if($re){
                return redirect('admin/member');
            }else {
                return back()->with('errors', '數據填充錯誤, 請稍後重試');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('backstage.adminmember.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($member_id)
    {
        $member = AdminMember::find($member_id);
        $member['member_password'] = Crypt::decrypt($member['member_password']);
        return view('backstage.adminmember.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $member_id)
    {
        $input = Input::except('_token','_method');
        $re = AdminMember::where('member_id',$member_id)->update($input);
        if($re){
            return redirect('admin/member');
        }else{
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
        $re = AdminMember::where('member_id',$member_id)->delete();

        if($re){
            $data = [
                'status' => 0,
                'msg' => '會員刪除成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '會員刪除失敗, 請稍後重試!',
            ];
        }
        return $data;
    }
}
