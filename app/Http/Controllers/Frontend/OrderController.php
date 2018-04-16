<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use Exception;
use Modules\Commodity\Entities\Commodity;
use Modules\Order\Entities\Orderlist;
use Modules\Order\Entities\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends CommonController
{
    const ORDER_STATUS_PENDING = "pending"; //處理中
    const ORDER_STATUS_COMPLETE = "complete"; //已送達(完成)
    const ORDER_STATUS_REFUND = "refund"; // 退貨處理中
    const ORDER_STATUS_SHIPPING = "shipping"; // 出貨中
    const ORDER_STATUS_CANCEL = "cancel"; // 已取消

    public function order(Request $request)
    {
        parent::__construct();
        $member_id = $request->session()->get("member.member_id");
        $orders = Order::where("member_id", $member_id)->orderBy('created_at', 'desc')->paginate(10);
        foreach ($orders as $order) {
            switch ($order->order_status) {
                case self::ORDER_STATUS_PENDING:
                    $order->_order_status = "處理中";
                    break;
                case self::ORDER_STATUS_COMPLETE:
                    $order->_order_status = "已送達";
                    break;
                case self::ORDER_STATUS_REFUND:
                    $order->_order_status = "退貨處理中";
                    break;
                case self::ORDER_STATUS_SHIPPING:
                    $order->_order_status = "出貨中";
                    break;
                case self::ORDER_STATUS_CANCEL:
                    $order->_order_status = "已取消";
                    break;
            }
        }
        return view("frontend.member.order", compact("orders"));
    }

    public function orderDetail($order_id)
    {
        parent::__construct();
        $order = Order::find($order_id);
        switch ($order->order_status) {
            case self::ORDER_STATUS_PENDING:
                $order->_order_status = "處理中";
                break;
            case self::ORDER_STATUS_COMPLETE:
                $order->_order_status = "已送達";
                break;
            case self::ORDER_STATUS_REFUND:
                $order->_order_status = "退貨處理中";
                break;
            case self::ORDER_STATUS_SHIPPING:
                $order->_order_status = "出貨中";
                break;
            case self::ORDER_STATUS_CANCEL:
                $order->_order_status = "已取消";
                break;
        }
        $order_details = Orderlist::where("order_id", $order_id)->get();
        foreach ($order_details as $detail) {
            switch ($detail->status) {
                case self::ORDER_STATUS_PENDING:
                    $detail->_status = "處理中";
                    break;
                case self::ORDER_STATUS_COMPLETE:
                    $detail->_status = "已送達";
                    break;
                case self::ORDER_STATUS_REFUND:
                    $detail->_status = "退貨處理中";
                    break;
                case self::ORDER_STATUS_SHIPPING:
                    $detail->_status = "出貨中";
                    break;
                case self::ORDER_STATUS_CANCEL:
                    $detail->_status = "已取消";
                    break;
            }
        }
        return view("frontend.member.order_detail", compact("order", "order_details"));
    }

    public function cancel(Request $request)
    {
        $order_id = $request->post("order_id");
        if (empty($order_id)) {
            return CommonController::failResponse("取消訂單失敗：未傳入訂單流水號！");
        }
        try {
            DB::beginTransaction();
            $order = Order::find($order_id);
            if (empty($order)) {
                throw new Exception("取消訂單失敗：找不到此筆訂單！");
            }
            if ($order->order_status != self::ORDER_STATUS_SHIPPING && $order->order_status != self::ORDER_STATUS_PENDING) {
                throw new Exception("取消訂單失敗：只有狀態為處理中與出貨中的訂單才可取消！");
            }
            //復原商品庫存數量
            $details = Orderlist::where("order_id", $order_id)->get();
            foreach ($details as $detail) {
                $comodity = Commodity::find($detail->commodity_id);
                $commodity_stock = (int)$comodity->commodity_stock + (int)$detail->amount;
                $result = DB::table("commodity")->where("commodity_id", $detail->commodity_id)->update(["commodity_stock" => $commodity_stock]);
                if (!$result) {
                    throw new Exception("取消訂單失敗：復原商品庫存數量失敗！");
                }
            }
            $result = DB::table("order")->where("order_id", $order_id)->update(["order_status" => self::ORDER_STATUS_CANCEL]);
            if (!$result) {
                throw new Exception("取消訂單失敗：請稍後再試！");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return CommonController::failResponse($e->getMessage());
        }
        return CommonController::successResponse("取消訂單成功。");
    }

}
