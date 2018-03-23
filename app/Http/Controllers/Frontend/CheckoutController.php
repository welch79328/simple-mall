<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\TownshipHelper;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends CommonController {
    
    function __construct() {
        parent::__construct();
    }

    public function orderInfo(TownshipHelper $townshipHelper) {
        $total = Cart::total();
        $area = $townshipHelper->area();
        $city = $townshipHelper->city();
        $zipcode = $area[0]['area_zipcode'];
        return view('frontend.shopping.orderInfo', compact('area', 'city', 'zipcode', 'total'));
    }

}
