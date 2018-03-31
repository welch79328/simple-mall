<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\CommodityHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController {

    public function index(CommodityHelper $commodityHelper, Request $request) {
        parent::__construct();
        $page = [
            "backPage" => 0,
            "nowPage" => 1,
            "nextPage" => 2
        ];
        $limitCommodities = $commodityHelper->getLimitCommodities(4, 8);
        $generalCommodities = $commodityHelper->getGeneralCommodities(8);
        $recentlyViewedCommodities = [];
        if ($request->session()->has("recently_viewed.commodities")) {
            $recentlyViewedCommodities = $request->session()->get("recently_viewed.commodities");
        }
//        dd($request->session()->all());
        return view("frontend.index", compact("generalCommodities", "limitCommodities", "page", "recentlyViewedCommodities"));
    }

    public function getLimitCommodities(CommodityHelper $commodityHelper) {
        $limitCommodities = $commodityHelper->getLimitCommodities(4, 8);
        if (count($limitCommodities) == 0) {
            return "";
        }
        return view("frontend.limitCommodityList", compact("limitCommodities"));
    }

    public function getGeneralCommodities(CommodityHelper $commodityHelper) {
        $generalCommodities = $commodityHelper->getGeneralCommodities(8);
        if (count($generalCommodities) == 0) {
            return "";
        }
        return view("frontend.generalCommodityList", compact("generalCommodities"));
    }

}
