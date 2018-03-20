<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ModuleHelper;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function index() {
        $categories = Category::orderBy('cate_order', 'asc')->get();
        $commodities = Commodity::all();//@todo 加上搶先看的條件
        return view('frontend.index', compact("commodities"));
    }
    

}
