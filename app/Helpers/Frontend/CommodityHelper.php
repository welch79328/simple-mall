<?php

namespace App\Helpers\Frontend;

use Modules\Commodity\Entities\Commodity;

class CommodityHelper {

    const COMMODITY_STATUS_ON = "on";
    const COMMODITY_TYPE_LIMITED = "limited";
    const COMMODITY_TYPE_GENERAL = "general";

    
    public function getCommoditiesArray($condition) {
        
    }

    /**
     * 取得限時商品清單(已上架、符合時間內)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public static function getLimitCommodities($count) {
        $now = date("Y-m-d H:i:s");
        $match = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_LIMITED],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
        ];
        return Commodity::where($match)->orderBy("commodity_ordering", "asc")->paginate($count);
    }
    
    /**
     * 取得一般商品清單(已上架)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public static function getGeneralCommodities($count) {
        $now = date("Y-m-d H:i:s");
        $match = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_GENERAL],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
        ];
        return Commodity::where($match)->orderBy("commodity_ordering", "asc")->paginate($count);
    }

}
