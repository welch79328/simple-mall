<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Response;
use App\Helpers\ModuleHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController {

    public function index() {
        $page = [
            "backPage" => 0,
            "nextPage" => 2
        ];
        parent::__construct();
        $now = date("Y-m-d H:i:s");
        $match = [
            ["commodity_status", "=", CommonController::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommonController::COMMODITY_TYPE_LIMITED],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
        ];
        $limitCommodities = Commodity::where($match)->orderBy("commodity_ordering", "asc")->limit(4)->get();

        //剩餘時間
        foreach ($limitCommodities as $limit) {
            $diff = strtotime($limit->commodity_end_time) - strtotime($now);
            $hour = floor($diff / 3600);
            $min = floor(($diff % 3600) / 60);
            $sec = ($diff % 3600) % 60;
            $limit->remainTime = "$hour:$min:$sec";
        }
        $categories = Category::orderBy("cate_order", "asc")->get();
        $commodities = Commodity::all(); //@todo 加上搶先看的條件
        return view("frontend.index", compact("commodities", "limitCommodities", "page"));
    }

    public function getLimitCommodities(Request $request) {
        $page = $request->get("page");
        $limit = 4;
        $now = date("Y-m-d H:i:s");
        $match = [
            ["commodity_status", "=", CommonController::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommonController::COMMODITY_TYPE_LIMITED],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
        ];
        $limitCommodities = Commodity::where($match)->orderBy("commodity_ordering", "asc")->paginate($limit);
        if (count($limitCommodities) == 0) {
            return "";
        }
        //剩餘時間
        foreach ($limitCommodities as $limit) {
            $diff = strtotime($limit->commodity_end_time) - strtotime($now);
            $hour = floor($diff / 3600);
            $min = floor(($diff % 3600) / 60);
            $sec = ($diff % 3600) % 60;
            $limit->remainTime = "$hour:$min:$sec";
        }

        $page = [
            "backPage" => $page - 1,
            "nextPage" => $page + 1
        ];

        return view("frontend.limitCommodityList", compact("limitCommodities", "page"));
    }

}
