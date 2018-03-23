<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\CommodityHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController {

    public function index() {
        parent::__construct();
        $page = [
            "backPage" => 0,
            "nowPage" => 1,
            "nextPage" => 2
        ];
        $limitCommodities = CommodityHelper::getLimitCommodities(4);
        $generalCommodities = CommodityHelper::getGeneralCommodities(8);
        $commodities = Commodity::all(); //@todo 加上條件
        return view("frontend.index", compact("generalCommodities", "limitCommodities", "page"));
    }

    public function getLimitCommodities() {
        $limitCommodities = CommodityHelper::getLimitCommodities(4);
        if (count($limitCommodities) == 0) {
            return "";
        }
        return view("frontend.limitCommodityList", compact("limitCommodities"));
    }
    
    public function getGeneralCommodities() {
        $generalCommodities = CommodityHelper::getGeneralCommodities(8);
        if (count($generalCommodities) == 0) {
            return "";
        }
        return view("frontend.generalCommodityList", compact("generalCommodities"));
    }

}
