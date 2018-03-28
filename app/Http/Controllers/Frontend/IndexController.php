<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\CommodityHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController {

    public function index(CommodityHelper $commodityHelper) {
        parent::__construct();
        $page = [
            "backPage" => 0,
            "nowPage" => 1,
            "nextPage" => 2
        ];
        $limitCommodities = $commodityHelper->getLimitCommodities(4,8);
        $generalCommodities = $commodityHelper->getGeneralCommodities(8);
        return view("frontend.index", compact("generalCommodities", "limitCommodities", "page"));
    }

    public function getLimitCommodities(CommodityHelper $commodityHelper) {
        $limitCommodities = $commodityHelper->getLimitCommodities(4,8);
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
