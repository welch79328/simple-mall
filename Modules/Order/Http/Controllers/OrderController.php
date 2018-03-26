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
//    /**
//     * Display a listing of the resource.
//     * @return Response
//     */
//    public function index()
//    {
//        return view('order::index');
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     * @return Response
//     */
//    public function create()
//    {
//        return view('order::create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     * @param  Request $request
//     * @return Response
//     */
//    public function store(Request $request)
//    {
//    }
//
//    /**
//     * Show the specified resource.
//     * @return Response
//     */
//    public function show()
//    {
//        return view('order::show');
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     * @return Response
//     */
//    public function edit()
//    {
//        return view('order::edit');
//    }
//
//    /**
//     * Update the specified resource in storage.
//     * @param  Request $request
//     * @return Response
//     */
//    public function update(Request $request)
//    {
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     * @return Response
//     */
//    public function destroy()
//    {
//    }

    public function orderInfo(TownshipHelper $townshipHelper) {
//        $session = session('member.member_name');
        $session = 'Mrs. Lily Smith';
        $data = Member::where('member_name',$session)->first();
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
                        'order_id'=>$re['order_id'],
                    ]);
                }
//                DB::commit();
                Cart::destroy();
                return redirect('/');
            }
//        }catch (\Exception $e){
////            DB::rollBack();
//            dd('error');
//        }

    }
}
