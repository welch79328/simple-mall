<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller {

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

}
