<?php

namespace App\Http\Controllers\Frontend;

use Modules\Advertisement\Entities\Advertisement;
use App\Helpers\Frontend\CommodityHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{

    public function index(CommodityHelper $commodityHelper, Request $request)
    {
        parent::__construct();
        $page = [
            "backPage" => 0,
            "nowPage" => 1,
            "nextPage" => 2
        ];
        $limitCommodities = $commodityHelper->getLimitCommodities(4, 8);
        $commodities = $commodityHelper->getCommodities(8);
        foreach ($limitCommodities as $limit) {
            if ((int)$limit->commodity_price >= 1000) {
                $limit->commodity_price = number_format((int)$limit->commodity_price);
            }
        }
        foreach ($commodities as $commodity) {
            if ((int)$commodity->commodity_price >= 1000) {
                $commodity->commodity_price = number_format((int)$commodity->commodity_price);
            }
        }
        $recentlyViewedCommodities = [];
        if ($request->session()->has("recently_viewed.commodities")) {
            $recentlyViewedCommodities = $request->session()->get("recently_viewed.commodities");
        }

        $now = date("Y-m-d H:i:s");
        $match = [
            ["advertisement_status", "=", "on"],
            ["advertisement_start_time", "<=", $now],
            ["advertisement_end_time", ">", $now]
        ];
        $ads = Advertisement::where($match)->orderBy("advertisement_ordering")->limit(5)->get();
        return view("frontend.index", compact("commodities", "limitCommodities", "page", "recentlyViewedCommodities", "ads"));

    }

    public function getLimitCommodities(CommodityHelper $commodityHelper)
    {
        $limitCommodities = $commodityHelper->getLimitCommodities(4, 8);
        if (count($limitCommodities) == 0) {
            return "";
        }
        foreach ($limitCommodities as $limit) {
            if ((int)$limit->commodity_price >= 1000) {
                $limit->commodity_price = number_format((int)$limit->commodity_price);
            }
        }
        return view("layouts.frontend.limitCommodityList", compact("limitCommodities"));
    }

    public function getCommodities(CommodityHelper $commodityHelper)
    {
        $commodities = $commodityHelper->getCommodities(8);
        if (count($commodities) == 0) {
            return "";
        }
        foreach ($commodities as $commodity) {
            if ((int)$commodity->commodity_price >= 1000) {
                $commodity->commodity_price = number_format((int)$commodity->commodity_price);
            }
        }
        return view("layouts.frontend.commodityList", compact("commodities"));
    }

}
