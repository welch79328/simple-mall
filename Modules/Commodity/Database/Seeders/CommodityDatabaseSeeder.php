<?php

namespace Modules\Commodity\Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Commodity\Entities\Commodity;

class CommodityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Factory $factory)
    {
        Model::unguard();

        $factory->define(Commodity::class, function (Faker $faker) {
            return [
                'commodity_title' => $faker->name,
                'commodity_price' => rand(200,2000),
                'commodity_start_time'=>'2018-03-01 00:00:00',
                'commodity_end_time'=>'2018-05-20 23:59:59',
                'commodity_stock' => rand(1,10),
                'commodity_safe_stock' => rand(1,10),
            ];
        });

        factory(Commodity::class, 20)->create();
    }
}
