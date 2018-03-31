<?php

namespace App\Http\Middleware\Frontend;

use App\Helpers\Frontend\CommodityHelper;
use Closure;

class CheckCommodityDeadline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $commodity_id = $request->commodity_id;
        $commodityHelper = new CommodityHelper();
        if (!$commodityHelper->isCommodityInDateRange($commodity_id)) {
            //移除存在 session 中超過期限的商品
            $tempCommodities = $request->session()->pull("recently_viewed.commodities");
            for ($i = count($tempCommodities) - 1; $i >= 0; $i--) {
                if ($tempCommodities[$i]->commodity_id == $commodity_id) {
                    array_splice($tempCommodities, $i, 1);
                }
            }
            foreach ($tempCommodities as $temp) {
                $request->session()->push("recently_viewed.commodities", $temp);
            }
            return back()->with("errors.msg", "商品已超過期限或已下架！");
        }
        return $next($request);
    }
}
