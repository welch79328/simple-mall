<?php

namespace App\Helpers\Frontend;

use Modules\Commodity\Entities\Commodity;

class CommodityHelper {

    const COMMODITY_STATUS_ON = "on";
    const COMMODITY_TYPE_LIMITED = "limited";
    const COMMODITY_TYPE_GENERAL = "general";

    private $limitmatch = [];

    private $generalmatch = [];

    
    public function getCommoditiesArray($condition) {
        
    }

    /**
     * 取得限時商品清單(已上架、符合時間內)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public function getLimitCommodities($count,$total) {
        $now = date("Y-m-d H:i:s");
        $this->limitmatch = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_LIMITED],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        $this->generalmatch = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_GENERAL],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        $limit = Commodity::where($this->limitmatch)->orderBy("commodity_ordering", "asc")->take($total)->get();
        $limit_pluck = $limit->pluck('commodity_id')->all();
        $array_merge = $limit_pluck;
        if(count($limit) < $total){
            $general = Commodity::where($this->generalmatch)->orderBy("commodity_ordering", "asc")->take($total-count($limit))->get();
            $general_pluck = $general->pluck('commodity_id')->all();
            $array_merge = array_merge($limit_pluck, $general_pluck);
        }

        return Commodity::whereIn('commodity_id',$array_merge)->orderBy("commodity_type", "desc")->paginate($count);
    }
    
    /**
     * 取得一般商品清單(已上架)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public function getGeneralCommodities($count) {
        $now = date("Y-m-d H:i:s");
        $this->generalmatch = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_GENERAL],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        return Commodity::where($this->generalmatch)->orderBy("commodity_ordering", "asc")->paginate($count);
    }

}
