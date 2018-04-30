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

    public static function preorderSuccess($recipientMail)
    {
        Mail::send(
            'layouts.email.preorder',
            [],
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『預購成功』通知');
                $msg->to($recipientMail);
            }
        );
        return true;
    }

    public static function reached($recipientMail, $data)
    {
        Mail::send(
            'layouts.email.reached',
            compact("data"),
            function ($msg) use ($recipientMail) {
                $msg->to($recipientMail)->subject('捷 U 購『預購組數達成』通知');
            }
        );
        return true;
    }

    public static function paymentSuccess($recipientMail, $order_number)
    {
        Mail::send(
            'layouts.email.payment',
            compact("order_number"),
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『付款完成』通知');
                $msg->to($recipientMail);
            }
        );
        return true;
    }

    public static function shipping($recipientMail, $order_number)
    {
        Mail::send(
            'layouts.email.shipping',
            compact("order_number"),
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『出貨中』通知');
                $msg->to($recipientMail);
            }
        );
        return true;
    }

    public static function cancel($recipientMail)
    {
        Mail::send(
            'layouts.email.cancel',
            [],
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『取消預購』通知');
                $msg->to($recipientMail);
            }
        );
        return true;
    }

    public static function refund($recipientMail)
    {
        Mail::send(
            'layouts.email.refund',
            [],
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『退貨處理中』通知');
                $msg->to($recipientMail);
            }
        );
        return true;
    }

    public static function verifyAccount($member_id)
    {
        $member = Member::where("member_id", $member_id)->first();
        $code = $member->member_code;
        $account = Crypt::encrypt($member->member_account);
        $recipientMail = $member->member_mail;
        Mail::send(
            'layouts.email.verifyAccount',
            compact("code", "account"),
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『驗證電子郵件地址』通知');
                $msg->to($recipientMail);
            }
        );
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }

    public static function exchange($recipientMail)
    {
        Mail::send(
            'layouts.email.exchange',
            [],
            function ($msg) use ($recipientMail) {
                $msg->subject('捷 U 購『退貨瑕疵處理中』通知');
                $msg->to($recipientMail);
            }
        );
        return true;
    }


}
