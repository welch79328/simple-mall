<?php

namespace App\Helpers\Frontend;

use Modules\Commodity\Entities\Commodity;

class CommodityHelper
{

    const COMMODITY_STATUS_ON = "on";
    const COMMODITY_TYPE_LIMITED = "limited";
    const COMMODITY_TYPE_GENERAL = "general";
    const SORT_TYPE_ASC = "asc";
    const SORT_TYPE_DESC = "desc";
    const COMMODITY_PRICE_MIN = "0";
    const COMMODITY_PRICE_MAX = "99999999";

    private $limitmatch = [];
    private $match = [];

    /**
     * 取得限時商品清單(已上架、符合時間內)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public function getLimitCommodities($count, $total)
    {
        $now = date("Y-m-d H:i:s");
        $this->limitmatch = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_LIMITED],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        $this->match = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_type", "=", CommodityHelper::COMMODITY_TYPE_GENERAL],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        $limit = Commodity::where($this->limitmatch)->orderBy("commodity_ordering", "asc")->orderByRaw("TIMESTAMPDIFF(SECOND,'$now',commodity_end_time) asc")->take($total)->get();
        $limit_pluck = $limit->pluck('commodity_id')->all();
        $array_merge = $limit_pluck;
        if (count($limit) < $total) {
            $general = Commodity::where($this->match)->orderBy("commodity_ordering", "asc")->orderByRaw("TIMESTAMPDIFF(SECOND,'$now',commodity_end_time) asc")->take($total - count($limit))->get();
            $general_pluck = $general->pluck('commodity_id')->all();
            $array_merge = array_merge($limit_pluck, $general_pluck);
        }
        $string = implode(',', $array_merge);
        return Commodity::whereIn('commodity_id', $array_merge)->orderByRaw("FIELD(commodity_id, $string)")->paginate($count);
    }

    /**
     * 取得全部商品清單(已上架)，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @return type
     */
    public function getCommodities($count)
    {
        $now = date("Y-m-d H:i:s");
        $this->match = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        return Commodity::where($this->match)->orderBy("commodity_ordering", "asc")->paginate($count);
    }

    /**
     * 透過查詢條件取得已上架商品清單，HTTP request 需傳入 $page 參數
     * @param int $count 筆數
     * @param array $conditions 條件
     * [
     *      ["欄位","條件"(=,>,<),"值"]
     *      ["欄位","條件"(=,>,<),"值"]...
     * ]
     * @param array $sort 排序
     * [
     *      "field1" 欲排序的欄位 =>  "type1" 排序方式
     *      "field2" 欲排序的欄位 =>  "type2" 排序方式...
     * ]
     * @return type
     */
    public function getCommoditiesByQuery($count = 8, $conditions = [], $sort = [])
    {
        $now = date("Y-m-d H:i:s");
        $this->match = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        if (!empty($conditions)) {
            foreach ($conditions as $condition) {
                $this->match[] = $condition;
            }
        }
        $query = Commodity::where($this->match);

        if (!empty($sort)) {
            foreach ($sort as $field => $type) {
                $query->orderBy($field, $type);
            }
        }
        return $query->orderBy("commodity_ordering", "asc")->paginate($count);
    }

    /**
     * 判斷已上架商品是否在期限內
     * @param $commodity_id
     */
    public function isCommodityInDateRange($commodity_id)
    {
        $now = date("Y-m-d H:i:s");
        $this->match = [
            ["commodity_id", "=", $commodity_id],
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        $count = Commodity::where($this->match)->count();
        if ($count === 0) {
            return false;
        }
        return true;
    }

    public function getCommoditiesCount()
    {
        $now = date("Y-m-d H:i:s");
        $this->match = [
            ["commodity_status", "=", CommodityHelper::COMMODITY_STATUS_ON],
            ["commodity_start_time", "<=", $now],
            ["commodity_end_time", ">", $now],
            ["commodity_stock", ">", 0],
        ];
        return Commodity::where($this->match)->count();
    }

}
