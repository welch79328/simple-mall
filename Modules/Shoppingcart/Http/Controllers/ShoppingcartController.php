<?php

namespace Modules\Shoppingcart\Http\Controllers;

use Modules\Order\Entities\Order;
use Modules\Commodity\Entities\CommoditySpec;
use App\Helpers\Frontend\CommodityHelper;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Frontend\CommonController;
use Modules\Commodity\Entities\Commodity;

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
        $commodityHelper = new CommodityHelper();
        if (!$commodityHelper->isCommodityInDateRange($commodity_id)) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：商品已超過期限或已下架！"
            ];
            return $response;
        }

        $amount = $request->get("amount", 1);
        $commodity = Commodity::find($commodity_id);
        if (empty($commodity)) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：找不到此商品！"
            ];
            return $response;
        }

        $carts = Cart::content();
        $quantity_in_cart = 0;
        foreach ($carts as $cart) {
            if ($cart->id == $commodity_id) {
                $quantity_in_cart = $cart->qty;
            }
        }
        $sum = (int)$quantity_in_cart + (int)$amount;
        if ($sum > (int)$commodity->commodity_stock) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：商品庫存量不足！"
            ];
            return $response;
        }

        if (!empty($commodity->limit_purchase)) {
            $member_id = $request->session()->get("member.member_id");
            $total_amount = Order::join('order_list', 'order.order_id', '=', 'order_list.order_id')
                ->where(["member_id" => $member_id, "commodity_id" => $commodity->commodity_id, ["order_status", "!=", "cancel"]])
                ->sum("amount");
            $sum += (int)$total_amount;
            if ($sum > (int)$commodity->limit_purchase) {
                $response = [
                    "result" => false,
                    "msg" => "加入購物車失敗：此商品限購 $commodity->limit_purchase 組！"
                ];
                return $response;
            }
        }

        Cart::add($commodity->commodity_id, $commodity->commodity_title, $amount, $commodity->commodity_price);
        $cartCount = Cart::content()->count();
        $response = [
            "result" => true,
            "msg" => "加入購物車成功！",
            "cartCount" => $cartCount
        ];
        return $response;
    }

    public function pushWithSpec(Request $request, $commodity_id)
    {
        $commodityHelper = new CommodityHelper();
        if (!$commodityHelper->isCommodityInDateRange($commodity_id)) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：商品已超過期限或已下架！"
            ];
            return $response;
        }

        $amount = $request->get("amount", 1);
        $specId = $request->get("specId");

        $commodity = Commodity::find($commodity_id);
        $spec = CommoditySpec::find($specId);
        if (empty($commodity)) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：找不到此商品！"
            ];
            return $response;
        }
        if (empty($spec)) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：找不到此商品規格！"
            ];
            return $response;
        }

        $carts = Cart::content();
        $quantity_in_cart = 0;
        foreach ($carts as $cart) {
            if ($cart->id == $commodity_id && $cart->options->specId == $spec->id) {
                $quantity_in_cart = $cart->qty;
            }
        }
        $sum = (int)$quantity_in_cart + (int)$amount;
        if ($sum > (int)$spec->stock) {
            $response = [
                "result" => false,
                "msg" => "加入購物車失敗：商品庫存量不足！"
            ];
            return $response;
        }

        if (!empty($commodity->limit_purchase)) {
            $member_id = $request->session()->get("member.member_id");
            $total_amount = Order::join('order_list', 'order.order_id', '=', 'order_list.order_id')
                ->where(["member_id" => $member_id, "spec_id" => $spec->id, ["order_status", "!=", "cancel"]])
                ->sum("amount");
            $sum += (int)$total_amount;
            if ($sum > (int)$commodity->limit_purchase) {
                $response = [
                    "result" => false,
                    "msg" => "加入購物車失敗：此商品限購 $commodity->limit_purchase 組！"
                ];
                return $response;
            }
        }

        Cart::add($commodity->commodity_id, $commodity->commodity_title, $amount, $commodity->commodity_price, ["specId" => $spec->id, "specName" => $spec->spec]);
        $cartCount = Cart::content()->count();
        $response = [
            "result" => true,
            "msg" => "加入購物車成功！",
            "cartCount" => $cartCount
        ];
        return $response;
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
        $carts = Cart::content();
        $cartItem = $carts["$rowId"];
        if (empty($cartItem)) {
            $response = [
                "result" => false,
                "msg" => "修改數量失敗：此商品不在購物車內！"
            ];
            return $response;
        }
        $commodity = Commodity::find($cartItem->id);
        $stock = $commodity->commodity_stock;
        if (count($cartItem->options) > 0) {
            $specInfo = CommoditySpec::find($cartItem->options->specId);
            $stock = $specInfo->stock;
        };
        if ((int)$amount > (int)$stock) {
            $response = [
                "result" => false,
                "msg" => "修改數量失敗：商品庫存量不足，只剩 $stock 組！"
            ];
            return $response;
        }

        if (!empty($commodity->limit_purchase)) {
            $member_id = $request->session()->get("member.member_id");
            $match = [
                ["member_id", "=", $member_id],
                ["commodity_id", "=", $commodity->commodity_id],
                ["order_status", "!=", "cancel"]
            ];
            if (count($cartItem->options) > 0) {
                $match[] = ["spec_id", "=", $cartItem->options->specId];
            }
            $order_amount = Order::join('order_list', 'order.order_id', '=', 'order_list.order_id')
                ->where($match)
                ->sum("amount");
            $sum = (int)$amount + (int)$order_amount;
            if ($sum > (int)$commodity->limit_purchase) {
                $response = [
                    "result" => false,
                    "msg" => "修改數量失敗：此商品限購 $commodity->limit_purchase 組！"
                ];
                return $response;
            }
        }

        $cartItem->qty = $amount;
        $totalPrice = Cart::total();
        $response = [
            "result" => true,
            "msg" => "修改數量成功！",
            "totalPrice" => $totalPrice
        ];
        return $response;
    }

}
