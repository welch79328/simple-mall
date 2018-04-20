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
    public static function reached($order_id)
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

    public static function paymentSuccess()
    {

    }

    public static function refund()
    {

    }

}
