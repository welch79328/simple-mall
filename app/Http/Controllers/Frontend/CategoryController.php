<?php

namespace App\Http\Controllers\Frontend;

use stdClass;
use App\Helpers\Frontend\CommodityHelper;
use App\Helpers\ModuleHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommonController {

    public function index(Request $request, CommodityHelper $commodityHelper, $cate_id) {
        parent::__construct();
        $topCateId = $request->get("topCateId");

        $topCate = Category::find($topCateId);
        $activeCate = Category::find($cate_id);
        
        $categories = Category::orderBy('cate_order', 'asc')->get();
        $moduleHelper = new ModuleHelper();
        $cateTree = $moduleHelper->getTree($categories, 'cate_name', 'cate_id', 'cate_parent', 'cate_level', '5', 0, $topCateId);

        $conditions = new stdClass();
        $conditions = [
            ["cate_id", "=", $cate_id],
            ["commodity_price", ">=", CommodityHelper::COMMODITY_PRICE_MIN],
            ["commodity_price", "<=", CommodityHelper::COMMODITY_PRICE_MAX],
        ];

        $generalCommodities = $commodityHelper->getGeneralCommoditiesByQuery(8, $conditions);
        return view("frontend.category.category", compact("topCate", "activeCate", "cateTree", "generalCommodities"));
    }

    public function getGeneralCommoditiesByQuery(Request $request) {
        $cate_id = $request->post("cate_id");
        $minPrice = $request->post("minPrice", CommodityHelper::COMMODITY_PRICE_MIN);
        $maxPrice = $request->post("maxPrice", CommodityHelper::COMMODITY_PRICE_MAX);
        $latest = $request->post("latest", false);
        $popular = $request->post("popular", false);
        $field = $request->post("sort");
        if (is_null($minPrice))
            $minPrice = CommodityHelper::COMMODITY_PRICE_MIN;

        if (is_null($maxPrice))
            $maxPrice = CommodityHelper::COMMODITY_PRICE_MAX;

        $conditions = new \stdClass();
        $conditions = [
            ["cate_id", "=", $cate_id],
            ["commodity_price", ">=", $minPrice],
            ["commodity_price", "<=", $maxPrice],
        ];
        dd($field);
        $sort = [];
        if (!empty($field)) {
            foreach ($field as $value) {
                if (substr($value, 0, 1) === "-") {
                    $sort[substr($value, 1)] = CommodityHelper::SORT_TYPE_DESC;
                } else {
                    $sort[$value] = CommodityHelper::SORT_TYPE_ASC;
                }
            }
        }
        dd($sort);
        $commodityHelper = new CommodityHelper();
        $generalCommodities = $commodityHelper->getGeneralCommoditiesByQuery(8, $conditions, $sort);
        if (count($generalCommodities) == 0) {
            return "";
        }
        return view("frontend.generalCommodityList", compact("generalCommodities"));
    }

}
