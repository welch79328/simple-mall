<?php

namespace App\Http\Controllers\Frontend;

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

    public function order()
    {
        $cart = [];
        $total = 0;
        return view("frontend.member.order", compact("cart", "total"));
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
