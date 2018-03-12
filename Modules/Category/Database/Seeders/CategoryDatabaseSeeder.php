<?php

namespace Modules\Category\Database\Seeders;


use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     */
    public function run()
    {
        Model::unguard();
        $cate_order = [1,2,3,3,1,1,1,1,2,1,1,2,3,2,1];
        $cate_parent = [5,5,5,5,0,0,6,1,1,8,10,11,0,6,14];
        $cate_level = [2,2,2,2,1,1,2,3,3,4,4,5,1,2,2];
        for ($i=0;$i<15;$i++){
            DB::table('category')->insert([
                'cate_name' => 'test'.$i,
                'cate_order' => $cate_order[$i],
                'cate_parent' => $cate_parent[$i],
                'cate_level' => $cate_level[$i],
            ]);
        }


    }
}
