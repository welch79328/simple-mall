<?php

namespace App\Http\Controllers\Frontend;

use stdClass;
use App\Helpers\Frontend\CommodityHelper;
use App\Helpers\ModuleHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommonController
{

    public function index(Request $request, CommodityHelper $commodityHelper, $cate_id)
    {
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
        $commodities = $commodityHelper->getCommoditiesByQuery(8, $conditions);

        $recentlyViewedCommodities = [];
        if ($request->session()->has("recently_viewed.commodities")) {
            $recentlyViewedCommodities = $request->session()->get("recently_viewed.commodities");
        }

        return view("frontend.category.category", compact("topCate", "activeCate", "cateTree", "commodities","recentlyViewedCommodities"));
    }

    public function getCommoditiesByQuery(Request $request)
    {
        $cate_id = $request->post("cate_id");
        $minPrice = $request->post("minPrice", CommodityHelper::COMMODITY_PRICE_MIN);
        $maxPrice = $request->post("maxPrice", CommodityHelper::COMMODITY_PRICE_MAX);
        $field = $request->post("sort");
        if (is_null($minPrice))
            $minPrice = CommodityHelper::COMMODITY_PRICE_MIN;

        if (is_null($maxPrice))
            $maxPrice = CommodityHelper::COMMODITY_PRICE_MAX;

        $conditions = [
            ["cate_id", "=", $cate_id],
            ["commodity_price", ">=", $minPrice],
            ["commodity_price", "<=", $maxPrice],
        ];
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
        $commodityHelper = new CommodityHelper();
        $commodities = $commodityHelper->getCommoditiesByQuery(8, $conditions, $sort);
        if (count($commodities) == 0) {
            return "";
        }
        return view("frontend.commodityList", compact("commodities"));
    }

    public function limitCommoditiesPage(Request $request, CommodityHelper $commodityHelper)
    {
        parent::__construct();
        $limitCommodities = $commodityHelper->getLimitCommodities(12, 48);

        $recentlyViewedCommodities = [];
        if ($request->session()->has("recently_viewed.commodities")) {
            $recentlyViewedCommodities = $request->session()->get("recently_viewed.commodities");
        }

        return view("frontend.category.limitCommoditiesPage", compact("limitCommodities", "recentlyViewedCommodities"));
    }

    public function getLimitCommodities(CommodityHelper $commodityHelper)
    {
        $limitCommodities = $commodityHelper->getLimitCommodities(12, 48);
        if (count($limitCommodities) == 0) {
            return "";
        }
        return view("layouts.frontend.limitCommodityList", compact("limitCommodities"));
    }


}
