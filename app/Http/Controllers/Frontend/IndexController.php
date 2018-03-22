<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ModuleHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController {

    public function index() {
        parent::__construct();
        $now = date("Y-m-d H:i:s");
        $match = [
            ["commodity_status", "=", CommonController::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommonController::COMMODITY_TYPE_LIMITED],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
        ];
        $limitCommodities = Commodity::where($match)->orderBy("commodity_ordering", "asc")->limit(10)->get();
        //計算剩餘時間
        foreach($limitCommodities as $limit){
            $remainSecond = strtotime($limit->commodity_end_time) - strtotime($now);
            $limit->remainTime = gmstrftime('%H:%M:%S',$remainSecond);
            $limit->now = $now;
        }
        dd($limitCommodities);
        $categories = Category::orderBy("cate_order", "asc")->get();
        $commodities = Commodity::all(); //@todo 加上搶先看的條件
        return view("frontend.index", compact("commodities","limitCommodities"));
    }

}
