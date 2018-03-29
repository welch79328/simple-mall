<?php

namespace Modules\Shoppingcart\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Frontend\CommonController;

class ShoppingcartController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('shoppingcart::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('shoppingcart::create');
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
//    public function show()
//    {
//        return view('shoppingcart::show');
//    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('shoppingcart::edit');
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
//    public function destroy()
//    {
//    }

    public function push(Request $request, $commodity_id)
    {
        $amount = $request->get("amount", 1);
        $commodity = \Modules\Commodity\Entities\Commodity::where('commodity_id', $commodity_id)->first();
        Cart::add($commodity->commodity_id, $commodity->commodity_title, $amount, $commodity->commodity_price);
        $cart = Cart::content();
        $cartCount = count($cart);
//        $aa = Cart::content();
//        dd($aa);

        return $cartCount;
    }

    public function show()
    {
        new CommonController();
        $cart = Cart::content();
        $total = Cart::total();
        return view('frontend.shopping.shoppingcart', compact('cart', 'total'));
    }

    public function time()
    {
        echo ini_get("session.gc_maxlifetime");
    }

    //delete.admin/'shoppingcart/{rowId}  刪除單個商品
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

    public function updateAmount(Request $request)
    {
        $amount = $request->get("amount");
        $rowId = $request->get("rowId");
        $cart = Cart::content();
        if (!isset($cart["$rowId"])) {
            $response = [
                "result" => false,
                "msg" => "修改數量失敗：此商品不在購物車內！"
            ];
            return $response;
        }
        $cart["$rowId"]->qty = $amount;
        $response = [
            "result" => true,
            "msg" => "修改數量成功！"
        ];
        return $response;
    }

}
