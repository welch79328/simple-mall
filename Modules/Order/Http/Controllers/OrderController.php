<?php

namespace Modules\Order\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Http\Controllers\Backstage\MailController;
use App\Helpers\Report;
use App\Helpers\TownshipHelper;
use App\Http\Controllers\Frontend\CommonController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Modules\Commodity\Entities\Commodity;
use Modules\Commodity\Entities\CommoditySpec;
use Modules\Member\Entities\Member;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Orderlist;
use Modules\Returns\Entities\Returns;

class OrderController extends CommonController
{

    public function __construct()
    {
//        $data = Order::get();
//        foreach ($data as $v) {
//            $orderlist = Orderlist::where('order_id', $v->order_id)->get();
//            $orderlist_status = $orderlist->pluck('status')->all();
////            dd($orderlist_status);
//            if (in_array('refund', $orderlist_status) || in_array('pending', $orderlist_status)) {
//                Order::where([['order_id', '=', $v->order_id], ['order_status', '!=', 'refund'],])->update([
//                    'order_status' => 'pending',
//                ]);
//            } else {
//                Order::where([['order_id', '=', $v->order_id], ['order_status', '!=', 'refund'],])->update([
//                    'order_status' => 'complete',
//                ]);
//            }
//        }
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $order_number = $request->get("order_number", "");
        $order_status = $request->get("order_status", "");
        $is_pay = $request->get("is_pay", "");

        $codition = [
            ["order_number", "like", "%$order_number%"],
            ["order_status", "like", "%$order_status%"],
            ["is_pay", "like", "%$is_pay%"]
        ];

        $data = Order::where($codition)->orderBy('created_at', 'desc')->paginate(20);
        //format 資料
        foreach ($data as $v) {
            switch ($v->order_status) {
                case 'pending':
                    $v->_order_status = '待處理';
                    break;
                case 'complete':
                    $v->_order_status = '已送達';
                    break;
                case 'refund':
                    $v->_order_status = '退貨處理中';
                    break;
                case 'shipping':
                    $v->_order_status = '出貨中';
                    break;
                case 'cancel':
                    $v->_order_status = '已取消';
                    break;
            }
            switch ($v->is_pay) {
                case '1':
                    $v->_is_pay = '已付款';
                    break;
                case '0':
                    $v->_is_pay = '尚未付款';
                    break;
            }
            $member = Member::where('member_id', $v->member_id)->first();
            $v->member_account = $member->member_account;
            $v->member_name = $member->member_name;
        }

        $search = new \stdClass();
        $search->order_number = $order_number;
        $search->order_status = $order_status;
        $search->is_pay = $is_pay;
        return view('backstage.order.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backstage.order.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($order_id, TownshipHelper $townshipHelper)
    {
        $data = Order::where('order_id', $order_id)->first();
        $orderlist = Orderlist::where('order_id', $order_id)->get();
        switch ($data->order_status) {
            case 'pending':
                $data->_order_status = '待處理';
                break;
            case 'complete':
                $data->_order_status = '已送達';
                break;
            case 'refund':
                $data->_order_status = '退貨處理中';
                break;
            case 'cancel':
                $data->_order_status = '取消';
                break;
            case 'shipping':
                $data->_order_status = '出貨中';
                break;
        }
        foreach ($orderlist as $v) {
            switch ($v->status) {
                case 'pending':
                    $v->_status = '待處理';
                    break;
                case 'complete':
                    $v->_status = '已送達';
                    break;
                case 'refund':
                    $v->_status = '退貨處理中';
                    break;
                case 'cancel':
                    $v->_status = '取消';
                    break;
                case 'shipping':
                    $v->_status = '出貨中';
                    break;
            }
        }
        $member = Member::select("member_id", "member_account", "member_name")->where("member_id", $data->member_id)->first();
        return view('backstage.order.show', compact('data', 'orderlist', 'member'));
    }

    public function order_alone($id)
    {
        $data = Orderlist::where('id', $id)->first();

        return view('backstage.order.order_alone', compact('data'));
    }

    public function order_alone_update($id)
    {
        $input = Input::all();
        $input['creator'] = session('admin_member.member_name');
        Orderlist::where('id', $id)->update([
            'description' => $input['description'],
            'status' => $input['status'],
            'creator' => $input['creator'],
        ]);
        $orderList = Orderlist::find($id);
        Order::where('order_id', $orderList->order_id)->update([
            'order_status' => $input['status'],
        ]);
        return redirect('admin/order/' . $orderList->order_id);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $order_id)
    {
        $input = $request->except("_token");
        $input['editor'] = session('admin_member.member_name');
        $input['delivery_time'] = null;
        $order = Order::where('order_id', $order_id)->first();
        if ($input['order_status'] == "complete" && $order->order_status != "complete") {
            $input['delivery_time'] = Carbon::now()->format("Y:m:d H:i:s");
        }
        if ($input['is_pay'] == "1" && $order->is_pay != "1") {
            MailController::paymentSuccess($order->order_mail, $order->order_number);
        }

        $result = Order::where('order_id', $order_id)->update($input);
        if (!$result) {
            return back()->with("errors", "修改訂單失敗：請稍後再試！");
        }

        $result = Orderlist::where('order_id', $order_id)->update([
            'status' => $input['order_status'],
            'creator' => $input['editor'],
        ]);
        if (!$result) {
            return back()->with("errors", "修改訂單失敗：請稍後再試！");
        }

        return redirect('admin/order');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function orderInfo(TownshipHelper $townshipHelper)
    {
        $carts = Cart::content();
        if (count($carts) == 0) {
            return redirect("shoppingcart/show")->with("errors.msg", "預購失敗：購物車內沒有商品！");
        }
        foreach ($carts as $item) {
            $commodity = Commodity::find($item->id);
            if ($item->qty > $commodity->commodity_stock) {
                return redirect("shoppingcart/show")->with("errors.msg", "預購失敗：$commodity->commodity_title 的庫存量不足，只剩 $commodity->commodity_stock 組！");
            }
        }
        new CommonController;
        $member_id = session('member.member_id');
        $data = Member::where('member_id', $member_id)->first();
        if (!empty($data->member_tel)) {
            $tel_explode = explode("-", $data->member_tel);
            $data->tel_code = $tel_explode[0];
            $data->member_tel = $tel_explode[1];
        }
        $total = Cart::total();
        $area = $townshipHelper->area();
        $city = $townshipHelper->city();
        $zipcode = $area[0]['area_zipcode'];
        return view('frontend.shopping.orderInfo', compact('area', 'city', 'zipcode', 'total', 'data'));
    }

    public function orderSetup(Request $request)
    {
        $input = $request->except("_token", "agree");
        if (!empty($input["tel_code"]) && !empty($input["order_tel"])) {
            $input["order_tel"] = $input["tel_code"] . "-" . $input["order_tel"];
        }
        $townshipHelper = new TownshipHelper();
        $city = $townshipHelper->getCity($input["order_city"]);
        $area = $townshipHelper->getArea($input["order_area"]);
        $input["order_address"] = $city . $area . $input["order_location"];
        $input["member_id"] = session("member.member_id");

        unset($input["tel_code"]);
        unset($input["order_city"]);
        unset($input["order_area"]);
        unset($input["order_location"]);
        $now = Carbon::now()->format("Y-m-d H:i:s");

        //檢查商品庫存是否足夠
        $carts = Cart::content();
        foreach ($carts as $item) {
            $commodity = Commodity::find($item->id);
            $stock = $commodity->commodity_stock;
            if (count($item->options) > 0) {
                $spec = CommoditySpec::find($item->options->specId);
                $stock = $spec->stock;
            }
            if ($item->qty > $stock) {
                $response = [
                    "result" => false,
                    "msg" => "預購失敗：$commodity->commodity_title 的庫存量不足，只剩 $stock 組！"
                ];
                return $response;
            }
        }

        try {
            $i = 0;
            foreach ($carts as $v) {
                $input["order_number"] = substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
                $input["order_total"] = $v->qty * $v->price;
                $result = Order::create($input);
                if (!$result) {
                    throw new Exception("新增訂單失敗：請稍後再試！");
                }

                DB::beginTransaction();
                $result = DB::table("order_list")->insert([
                    'name' => $v->name,
                    'spec_name' => $v->options->specName,
                    'amount' => $v->qty,
                    'price' => $v->price,
                    'commodity_id' => $v->id,
                    'spec_id' => $v->options->specId,
                    'order_id' => $result["order_id"],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
                if (!$result) {
                    throw new Exception("新增訂單失敗：新增訂單明細失敗！");
                }

                $commodity = DB::table("commodity")->where("commodity_id", $v->id)->first();
                $stock = (int)$commodity->commodity_stock - (int)$v->qty;
                $result = DB::table("commodity")->where("commodity_id", $v->id)->update(["commodity_stock" => $stock, "updated_at" => $now]);
                if (!$result) {
                    throw new Exception("新增訂單失敗：商品庫存修改失敗！");
                }
                if (count($v->options) > 0) {
                    $spec = DB::table("commodity_spec")->where("id", $v->options->specId)->first();
                    $stock = (int)$spec->stock - (int)$v->qty;
                    $result = DB::table("commodity_spec")->where("id", $v->options->specId)->update(["stock" => $stock, "updated_at" => $now]);
                    if (!$result) {
                        throw new Exception("新增訂單失敗：商品規格庫存修改失敗！");
                    }
                }
                DB::commit();
                $i++;
            }
            Cart::destroy();
            if (!empty($input["order_mail"])) {
                MailController::preorderSuccess($input["order_mail"]);
            }
            $response = [
                "result" => true,
                "msg" => "新增訂單成功"
            ];
            return $response;
        } catch (Exception $e) {
            DB::rollback();
            $response = [
                "result" => false,
                "msg" => $e->getMessage()
            ];
            return $response;
        }
    }

    public function commodity_reached()
    {
        $condition = [
            ['commodity_stock', 0],
            ['is_pay', 0],
            ['is_mail', 0],
            ['order_status', '!=', 'cancel']
        ];
        $datas = Orderlist::join('order', 'order_list.order_id', '=', 'order.order_id')
            ->join('commodity', 'order_list.commodity_id', '=', 'commodity.commodity_id')
            ->where($condition)
            ->get();
        $order_ids = [];
        foreach ($datas as $data) {
            $recipient = $data->order_mail;
            MailController::reached($recipient, $data);
            $order_ids[] = $data->order_id;
        }
        Order::whereIn("order_id", $order_ids)->update(["is_mail" => 1]);
    }

    public function commodity_show()
    {
        $data = Commodity::where('commodity_stock', 0)->orderBy('created_at', 'asc')->paginate(20);

        return view('backstage.order.commodity_show', compact('data'));
    }

    public function commodity_show_list($commodity_id)
    {
//        $data = Orderlist::where('commodity_id',$commodity_id)->get();
        $data = Orderlist::join('order', 'order_list.order_id', '=', 'order.order_id')->join('member', 'order.member_id', '=', 'member.member_id')->where([['commodity_id', $commodity_id], ['order_status', '!=', 'cancel'],])->get();
        foreach ($data as $v) {
            switch ($v->status) {
                case 'pending':
                    $v->_status = '待處理';
                    break;
                case 'complete':
                    $v->_status = '已送達';
                    break;
                case 'refund':
                    $v->_status = '退貨處理中';
                    break;
                case 'cancel':
                    $v->_status = '取消';
                    break;
                case 'shipping':
                    $v->_status = '出貨中';
                    break;
            }
        }
        return view('backstage.order.commodity_show_list', compact('data', 'commodity_id'));
    }

    public function commodity_show_list_edit()
    {
        $input = Input::except('_token');
        $input['creator'] = session('admin_member.member_name');
        if (empty($input['list'])) {
            return back()->with("errors", "修改失敗：無資料被勾選！");
        }
        foreach ($input['list'] as $v) {
            Orderlist::where('id', $v)->update([
                'status' => $input['status'],
                'creator' => $input['creator'],
            ]);
            $orderList = Orderlist::where('id', $v)->first();
            Order::where('order_id', $orderList->order_id)->update([
                'order_status' => $input['status'],
            ]);
        }
        return redirect()->back()->with('success', "修改成功！");
    }

    public function commodity_show_list_excel(Report $report, $commodity_id)
    {
        $report->generateReport($commodity_id);
    }

}
