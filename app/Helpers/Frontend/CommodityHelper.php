<?php

namespace App\Helpers\Frontend;

use Modules\Commodity\Entities\Commodity;

class CommodityHelper {

    const COMMODITY_STATUS_ON = "on";
    const COMMODITY_TYPE_LIMITED = "limited";
    const COMMODITY_TYPE_GENERAL = "general";
    const SORT_TYPE_ASC = "asc";
    const SORT_TYPE_DESC = "desc";
    const COMMODITY_PRICE_MIN = "0";
    const COMMODITY_PRICE_MAX = "99999";

    private $limitmatch = [];
    private $generalmatch = [];

    public function getCommoditiesArray($condition) {
        
    }

    /**
     * 取得限時商品清單(已上架、符合時間內)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public function getLimitCommodities($count, $total) {
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
        if (count($limit) < $total) {
            $general = Commodity::where($this->generalmatch)->orderBy("commodity_ordering", "asc")->take($total - count($limit))->get();
            $general_pluck = $general->pluck('commodity_id')->all();
            $array_merge = array_merge($limit_pluck, $general_pluck);
        }

        return Commodity::whereIn('commodity_id', $array_merge)->orderBy("commodity_type", "desc")->paginate($count);
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

    /**
     * 透過查詢條件取得一般商品清單(已上架)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @param stdClass $conditions 條件
     * [
     *      ["欄位","條件"(=,>,<),"值"]
     *      ["欄位","條件"(=,>,<),"值"]...
     * ]
     * @param array $sort 排序
     * field1 欲排序的欄位 =>  type1 排序方式
     * field2 欲排序的欄位 =>  type2 排序方式...
     * @return type
     */
    public function getGeneralCommoditiesByQuery($count = 8, $conditions = [], $sort = []) {
        $now = date("Y-m-d H:i:s");
        $this->generalmatch = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_GENERAL],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        if (!empty($conditions)) {
            foreach ($conditions as $condition) {
                $this->generalmatch[] = $condition;
            }
        }
        $query = Commodity::where($this->generalmatch);

        if (!empty($sort)) {
            foreach ($sort as $field => $type) {
                $query->orderBy($field, $type);
            }
        }
        return $query->orderBy("commodity_ordering", "asc")->paginate($count);
    }

}
