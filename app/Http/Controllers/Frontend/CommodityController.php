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

        $request->session()->push("recently_viewed.commodities", $commodity);
        $tempCommodities = $request->session()->pull("recently_viewed.commodities");
        $tempCommodities = $this->unique_multidim_array($tempCommodities, "commodity_id");
        foreach ($tempCommodities as $temp) {
            $request->session()->push("recently_viewed.commodities", $temp);
        }
        return view("frontend.commodity.commodity", compact("commodity", "imgs"));
    }

    private function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

}
