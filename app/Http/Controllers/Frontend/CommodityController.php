<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\CommodityHelper;
use Modules\Commodity\Entities\Commodity;
use Modules\Commodity\Entities\CommodityImg;
use Modules\Commodity\Entities\CommoditySpec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommodityController extends CommonController
{

    public function index(Request $request, $commodity_id)
    {
        $rand = $request->get("rand");
        parent::__construct();
        $commodity = Commodity::find($commodity_id);
        $commodity->commodity_view++;
        $commodity->save();
        if ((int)$commodity->commodity_price >= 1000) {
            $commodity->commodity_price = number_format((int)$commodity->commodity_price);
        }
        $imgs = CommodityImg::where("commodity_id", $commodity_id)->get();
        $specArray = CommoditySpec::where("commodity_id", $commodity_id)->orderBy("id", "asc")->get();

        //瀏覽人數的計算
        $commodityHelper = new CommodityHelper();
        $commodityHelper->pageCount($commodity_id);
        $data = $commodityHelper->getPageCount($commodity_id, $rand);
        $commodity->online = $data["count"];
        $commodity->rand = $data["rand"];

        //textarea 換行
        if ($commodity->commodity_description) {
            $commodity->commodity_description = nl2br($commodity->commodity_description);
        }

        //瀏覽過的商品
        $temps = [];
        $sessionTemps = $request->session()->pull("recently_viewed.commodities");
        if (is_null($sessionTemps)) {
            $sessionTemps = [];
        }
        $temps[] = $commodity;
        foreach ($sessionTemps as $sessionTemp) {
            $temps[] = $sessionTemp;
        }
        $temps = $this->unique_multidim_array($temps, "commodity_id");
        foreach ($temps as $temp) {
            $request->session()->push("recently_viewed.commodities", $temp);
        }

        return view("frontend.commodity.commodity", compact("commodity", "imgs", "specArray"));
    }

    public function search(Request $request, $keyword)
    {
        parent::__construct();

        $commodityHelper = new CommodityHelper();
        $conditions = [
            ["commodity_title", "like", "%$keyword%"]
        ];
        $sorts = [
            "commodity_type" => CommodityHelper::SORT_TYPE_DESC
        ];
        $commodities = $commodityHelper->getCommoditiesByQuery(12, $conditions, $sorts);
        foreach ($commodities as $commodity) {
            if ((int)$commodity->commodity_price >= 1000) {
                $commodity->commodity_price = number_format((int)$commodity->commodity_price);
            }
            $data = $commodityHelper->getPageCount($commodity->commodity_id);
            $commodity->online = $data["count"];
            $commodity->rand = $data["rand"];
        }
        $recentlyViewedCommodities = [];
        if ($request->session()->has("recently_viewed.commodities")) {
            $recentlyViewedCommodities = $request->session()->get("recently_viewed.commodities");
        }
        return view("frontend.commodity.search", compact("commodities", "recentlyViewedCommodities", "keyword"));
    }

    public function showChooseSpecDialog($commodity_id)
    {
        $specArray = CommoditySpec::where("commodity_id", $commodity_id)->orderBy("id", "asc")->get();
        if (count($specArray) == 0) {
            return "";
        }
        return view("layouts.frontend.specModal", compact("commodity_id", "specArray"));
    }

    public function getSpecStock($specId)
    {
        $spec = CommoditySpec::find($specId);
        if (empty($spec)) {
            return CommonController::failResponse("無法取得商品規格的庫存！");
        }
        return CommonController::successJsonResponse($spec->stock, "取得商品規格的庫存成功。");
    }

    private function unique_multidim_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (count($temp_array) == 4) {
                break;
            }
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

}
