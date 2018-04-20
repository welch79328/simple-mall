<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends CommonController
{

    public function index()
    {
        parent::__construct();
        return view("frontend.contact");
    }

    public function mailToUs(Request $request)
    {
        $input = $request->except("_token");
        $name = $input["name"];
        $phone = $input["phone"];
        $email = $input["email"];
        $subject = $input["subject"];
        $comment = nl2br($input["comment"]);
        Mail::send(
            'layouts.email.contactUs',
            compact("name", "phone", "email", "subject", "comment"),
            function ($msg) use ($subject) {
                $msg->subject("捷 U 購 客服信件 $subject");
                $msg->to(env('MAIL_USERNAME'));
            }
        );
        if (count(Mail::failures()) > 0) {
            return CommonController::failResponse("寄信失敗：請稍後再試！");
        }
        return CommonController::successResponse("寄信成功。");
    }

}
