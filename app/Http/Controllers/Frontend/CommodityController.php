<?php

namespace App\Http\Controllers\Frontend;

use Modules\Commodity\Entities\Commodity;
use Modules\Commodity\Entities\CommodityImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommodityController extends CommonController {


    public function index(Request $request, $commodity_id) {
        parent::__construct();
        $commodity = Commodity::find($commodity_id);
        $commodity->commodity_view++;
        $commodity->save();
        $imgs = CommodityImg::where("commodity_id", $commodity_id)->get();
        return view("frontend.commodity.commodity", compact("commodity", "imgs"));
    }

    public function getCommoditiesArrray(Request $request) {
        
    }

}
