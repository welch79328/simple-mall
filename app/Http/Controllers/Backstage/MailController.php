<?php

namespace App\Http\Controllers\Backstage;

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

    //@todo
    public static function reached()
    {
        Mail::send(
            'layouts.email.reached',
            function ($msg) {
                $msg->subject('捷 U 購『預購達成!匯款資訊』通知');
                $msg->to('ren096358@gmail.com');
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

    public static function exchange($recipient)
    {
        Mail::send(
            'layouts.email.exchange',
            [],
            function ($msg) use ($recipient) {
                $msg->subject('捷 U 購『退貨瑕疵處理中』通知');
                $msg->to($recipient);
            }
        );
        return true;
    }

}
