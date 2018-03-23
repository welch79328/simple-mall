<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ModuleHelper;
use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommonController {

    public function index(Request $request, $cate_id) {
        parent::__construct();
        $topCate = Category::find($cate_id);


        $categories = Category::orderBy('cate_order', 'asc')->get();
        //$tree = CommonController::getCategoriesTree($categories);
        //dd($tree);
        Category::where("cate_id", $cate_id)->get();
        //CommonController::getCategoriesTree($elements);

        $moduleHelper = new ModuleHelper();
        $a = $moduleHelper->getTree($categories, 'cate_name', 'cate_id', 'cate_parent', 'cate_level', '5', 0, $cate_id);
        return view("frontend.category", compact("topCate"));
    }

}
