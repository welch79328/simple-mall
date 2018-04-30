<?php

namespace App\Http\Controllers\Backstage;

use Illuminate\Support\Facades\Crypt;
use Modules\Member\Entities\Member;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public static function mail()
    {
        //$member_mail = session("member.member_mail");
        //dd($member_mail);
        $title = "測試信件";
        $content = "此為測試信。";
        Mail::send(
            'layouts.email.test',
            ["title" => $title, "content" => $content],
            function ($msg) {
                $member_mail = session("member.member_id");
                $msg->subject('捷 U 購『預購成功』通知');
                $msg->to($member_mail);
            }
        );
    }

    public static function preorderSuccess($recipient)
    {
        Mail::send(
            'layouts.email.preorder',
            [],
            function ($msg) use ($recipient) {
                $msg->subject('捷 U 購『預購成功』通知');
                $msg->to($recipient);
            }
        );
        return true;
    }

    public static function reached($recipient, $data)
    {
        Mail::send(
            'layouts.email.reached',
            compact("data"),
            function ($msg) use ($recipient) {
                $msg->to($recipient)->subject('捷 U 購『預購組數達成!匯款資訊』通知');
            }
        );
        return true;
    }

    public static function paymentSuccess($recipient, $order_number)
    {
        Mail::send(
            'layouts.email.payment',
            compact("order_number"),
            function ($msg) use ($recipient) {
                $msg->subject('捷 U 購『付款完成!出貨中』通知');
                $msg->to($recipient);
            }
        );
        return true;
    }

    public static function cancel($recipient)
    {
        Mail::send(
            'layouts.email.cancel',
            [],
            function ($msg) use ($recipient) {
                $msg->subject('捷 U 購『取消預購』通知');
                $msg->to($recipient);
            }
        );
        return true;
    }

    public static function refund($recipient)
    {
        Mail::send(
            'layouts.email.refund',
            [],
            function ($msg) use ($recipient) {
                $msg->subject('捷 U 購『退貨處理中』通知');
                $msg->to($recipient);
            }
        );
        return true;
    }

    public static function verifyAccount($member_id)
    {
        $member = Member::where("member_id", $member_id)->first();
        $code = $member->member_code;
        $account = Crypt::encrypt($member->member_account);
        $recipient = $member->member_mail;
        Mail::send(
            'layouts.email.verifyAccount',
            compact("code", "account"),
            function ($msg) use ($recipient) {
                $msg->subject('捷 U 購『驗證電子郵件地址』通知');
                $msg->to($recipient);
            }
        );
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }

//    public static function exchange($recipient)
//    {
//        Mail::send(
//            'layouts.email.exchange',
//            [],
//            function ($msg) use ($recipient) {
//                $msg->subject('捷 U 購『退貨瑕疵處理中』通知');
//                $msg->to($recipient);
//            }
//        );
//        return true;
//    }


}
