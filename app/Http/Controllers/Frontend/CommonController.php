<?php

namespace App\Http\Controllers\Frontend;

use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller {

    const COMMODITY_STATUS_ON = "on";
    const COMMODITY_TYPE_LIMITED = "limited";
    const ERROR_IMG_URL = "/images/no_img.gif";

    function __construct() {
        $this->shareTopCategories();
        $this->shareTopCategoriesGroup();
        $this->shareErrorImgUrl();
    }

    public static function getCategoriesTree($elements, $parentId = 0) {
        $categories = array();
        foreach ($elements as $element) {
            if ($element->cate_parent == $parentId) {
                $children = self::getCategoriesTree($elements, $element->cate_id);
                $element->children = ($children) ? $children : [];
                $categories[] = $element;
            }
        }
        return $categories;
    }

    private function shareTopCategoriesGroup() {
        $topCategories = Category::where("cate_parent", 0)->orderBy('cate_order', 'asc')->get();
        $topCategoriesGroup = [];
        $i = 0;
        foreach ($topCategories as $index => $topCate) {
            $topCategoriesGroup[$i][] = $topCate;
            if ($index % 12 == 0 && $index != 0) {
                $i++;
            }
        }
        view()->share('topCategoriesGroup', $topCategoriesGroup);
    }

    private function shareTopCategories() {
        $topCategories = Category::where("cate_parent", 0)->orderBy('cate_order', 'asc')->get();
        view()->share('topCategories', $topCategories);
    }

    private function shareErrorImgUrl() {
        view()->share('errorImgUrl', self::ERROR_IMG_URL);
    }

}
