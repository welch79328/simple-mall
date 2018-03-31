<?php

namespace Modules\Order\Http\Controllers;

use App\Helpers\TownshipHelper;
use App\Http\Controllers\Frontend\CommonController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Commodity\Entities\Commodity;
use Modules\Member\Entities\Member;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Orderlist;

class OrderController extends CommonController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Order::orderBy('order.updated_at','desc')->paginate(20);
        foreach ($data as $v){
            switch ($v->order_status)
            {
                case 'pending':
                    $v->order_status = '待處理';
                break;
                case 'complete':
                    $v->order_status = '完成';
                break;
                case 'refund':
                    $v->order_status = '取消';
                break;
            }
            $member = Member::where('member_id',$v->member_id)->first();
            $v->member_name = $member['member_name'];
        }

        return view('backstage.order.index',compact('data'));
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
    public function show($order_id,TownshipHelper $townshipHelper)
    {
        $data = Order::join('member','order.member_id','=','member.member_id')->where('order_id',$order_id)->first();
        $data->member_city = $townshipHelper->getCity($data->member_city);
        $data->member_area = $townshipHelper->getArea($data->member_area);
        $orderlist = Orderlist::where('order_id',$order_id)->get();
        switch ($data->order_status)
        {
            case 'pending':
                $data->order_status = '待處理';
                break;
            case 'complete':
                $data->order_status = '完成';
                break;
            case 'refund':
                $data->order_status = '取消';
                break;
        }
        foreach ($orderlist as $v){
            switch ($v->status)
            {
                case 'pending':
                    $v->status = '待處理';
                    break;
                case 'complete':
                    $v->status = '完成';
                    break;
                case 'refund':
                    $v->status = '取消';
                    break;
            }
        }
        switch ($data->member_sex)
        {
            case 'male':
                $data->member_sex = '男士';
                break;
            case 'female':
                $data->member_sex = '女士';
                break;
        }
        return view('backstage.order.show',compact('data','orderlist'));
    }

    public function order_alone($id)
    {
        $data = Orderlist::where('id',$id)->first();

        return view('backstage.order.order_alone',compact('data'));
    }

    public function order_alone_edit($id)
    {

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
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function orderInfo(TownshipHelper $townshipHelper) {
        $cart = Cart::content();
        if(count($cart) == 0){
            return back()->with("errors.msg", "下單失敗：購物車內沒有商品！");
        }
        new CommonController;
        $session = session('member.member_id');
        $data = Member::where('member_id',$session)->first();
        $total = Cart::total();
        $area = $townshipHelper->area();
        $city = $townshipHelper->city();
        $zipcode = $area[0]['area_zipcode'];
        return view('frontend.shopping.orderInfo', compact('area', 'city', 'zipcode', 'total','data'));
    }

    public function orderSetup(Request $request)
    {
        $input = $request->only('member_name','member_phone','member_tel','member_mail','member_city','member_city','member_zipcode','member_location');
//        $session = session('member.member_name');
//        DB::beginTransaction();
//        try{

            $session = 4;

            Member::where('member_id',$session)->update($input);
            $cart = Cart::content();
            $re = Order::create([
                'order_number'=>substr((string)time(),-8),
                'order_total'=>Cart::total(),
                'member_id'=>$session,
            ]);
            if ($re){
                foreach ($cart as $v){
//            dd($v,$v->qty,$v->name,$v->price);
                    $commodity = Commodity::find($v->id);
                    $commodity->commodity_stock -= $v->qty;
                    $commodity->save();

                    Orderlist::create([
                        'name'=>$v->name,
                        'amount'=>$v->qty,
                        'price'=>$v->price,
                        'commodity_id'=>$v->id,
                        'order_id'=>$re['order_id'],
                    ]);
                }
//                DB::commit();
                Cart::destroy();
                $response = [
                    "result" => true,
                    "msg" => "新增訂單成功"
                ];
                return $response;
            }
//        }catch (\Exception $e){
////            DB::rollBack();
//            dd('error');
//        }
    }

    public function commodity_show()
    {
        $data = Commodity::where('commodity_stock',0)->orderBy('created_at','asc')->paginate(20);

        return view('backstage.order.commodity_show',compact('data'));
    }
}
