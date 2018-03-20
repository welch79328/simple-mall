<?php

namespace App\Providers;

use Modules\Category\Entities\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
//        $topCategories = Category::where("cate_parent", 0)->orderBy('cate_order', 'asc')->get();
//        $topCategoriesGroup = [];
//        $i = 0;
//        foreach ($topCategories as $index => $topCate) {
//            $topCategoriesGroup[$i][] = $topCate;
//            if ($index % 7 == 0 && $index != 0) {
//                $i++;
//            }
//        }
//        view()->share('topCategoriesGroup', $topCategoriesGroup);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
