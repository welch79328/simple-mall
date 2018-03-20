<?php

namespace App\Http\Controllers\Frontend;

use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller {

    function __construct() {
        $this->shareTopCategories();
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

    private function shareTopCategories() {
        $topCategories = Category::where("cate_parent", 0)->orderBy('cate_order', 'asc')->get();
        $topCategoriesGroup = [];
        $i = 0;
        foreach ($topCategories as $index => $topCate) {
            $topCategoriesGroup[$i][] = $topCate;
            if ($index % 7 == 0 && $index != 0) {
                $i++;
            }
        }
        view()->share('topCategoriesGroup', $topCategoriesGroup);
    }

}
