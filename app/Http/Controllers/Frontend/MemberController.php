<?php

namespace App\Http\Controllers\Frontend;

use Modules\Order\Entities\Orderlist;
use Modules\Order\Entities\Order;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Modules\Member\Entities\Member;
use App\Helpers\TownshipHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends CommonController
{

    public function info(TownshipHelper $townshipHelper)
    {
        parent::__construct();
        $area = $townshipHelper->area();
        $city = $townshipHelper->city();
        $zipcode = $area[0]['area_zipcode'];
        $member_id = session("member.member_id");
        $member = Member::find($member_id);
        if (!empty($member->member_tel)) {
            $tel_explode = explode("-", $member->member_tel);
            $member->tel_code = $tel_explode[0];
            $member->member_tel = $tel_explode[1];
        }
        return view("frontend.member.info", compact("member", "area", "city", "zipcode"));
    }

    public function infoPassword()
    {
        parent::__construct();
        return view("frontend.member.info_password");
    }

    public function update(Request $request)
    {
        $data = $request->except("_token");
        $member_id = $request->session()->get("member.member_id");
//        $rules = [
//            "member_phone" => "numeric",
//            "tel_code" => "numeric",
//            "member_tel" => "numeric",
//        ];
//        $message = [
//            'member_phone.numeric' => '修改資料失敗：手機必須為數字!',
//            'tel_code.numeric' => '修改資料失敗：區碼必須為數字!',
//            'member_tel.numeric' => '修改資料失敗：市內電話必須為數字!',
//        ];
//        $validator = Validator::make($data, $rules, $message);
//        if ($validator->fails()) {
//            return back()->withErrors($validator);
//        }
        ($data["member_sex"] == 0) ? $data["member_sex"] = "female" : $data["member_sex"] = "male";
        $data["member_tel"] = $data["tel_code"] . "-" . $data["member_tel"];
        unset($data["tel_code"]);
        $result = Member::where("member_id", $member_id)->update($data);
        if (!$result) {
            return back()->with("errors.msg", "修改資料失敗，請稍後重試！");
        }
        return redirect("member_info")->with("sussess.msg", "修改資料成功！");
    }

    public function updatePassword(Request $request)
    {
        $input = $request->except("_token");
        $rules = [
            "password" => 'required|regex:/^[a-zA-Z]/|between:6,8|confirmed',
        ];
        $message = [
            'password.required' => '新密碼內容不能為空!',
            'password.regex' => '新密碼開頭必須為英文字母!',
            'password.between' => '新密碼長度必須為6至8位!',
            'password.confirmed' => '密碼不一致!',
        ];
        $validator = Validator::make($input, $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $member_id = $request->session()->get("member.member_id");
        $member = Member::find($member_id);
        if ($input["password_o"] != Crypt::decrypt($member->member_password)) {
            return back()->with("errors.msg", "修改密碼失敗： 原密碼錯誤！");
        }
        $member->member_password = Crypt::encrypt($input["password"]);
        $result = $member->update();
        if (!$result) {
            return back()->with("errors.msg", "修改密碼失敗，請稍後重試！");
        }
        return redirect("member_password")->with("sussess.msg", "修改密碼成功！");
    }

    public function order(Request $request)
    {
        parent::__construct();
        $member_id = $request->session()->get("member.member_id");
        $orders = Order::where("member_id", $member_id)->orderBy('created_at', 'desc')->paginate(10);
        foreach ($orders as $order) {
            switch ($order->order_status) {
                case 'pending':
                    $order->order_status = '待處理';
                    break;
                case 'complete':
                    $order->order_status = '完成';
                    break;
                case 'refund':
                    $order->order_status = '取消';
                    break;
            }
        }
        return view("frontend.member.order", compact("orders"));
    }

    public function order_detail($order_id)
    {
        parent::__construct();
        $order = Order::find($order_id);
        $order_details = Orderlist::where("order_id", $order_id)->get();
        switch ($order->order_status) {
            case 'pending':
                $order->order_status = '待處理';
                break;
            case 'complete':
                $order->order_status = '完成';
                break;
            case 'refund':
                $order->order_status = '取消';
                break;
        }
        foreach ($order_details as $detail) {
            switch ($detail->status) {
                case 'pending':
                    $detail->status = '待處理';
                    break;
                case 'complete':
                    $detail->status = '完成';
                    break;
                case 'refund':
                    $detail->status = '取消';
                    break;
            }
        }
        return view("frontend.member.order_detail", compact("order", "order_details"));
    }


    public function signIn()
    {
        if (!empty(session("member"))) {
            return redirect('/');
        }
        parent::__construct();
        return view("frontend.member.signin");
    }

    public function signUp()
    {
        parent::__construct();
        return view("frontend.member.signup");
    }

}
