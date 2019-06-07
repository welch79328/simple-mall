<?php

namespace Modules\Advertisement\Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Advertisement\Entities\Advertisement;

class AdvertisementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Factory $factory)
    {
        Model::unguard();

        $factory->define(Advertisement::class, function (Faker $faker) {
            return [
                'advertisement_name' => $faker->name,
                'advertisement_point' => rand(200,2000),
                'advertisement_start_time'=>'2018-03-01 00:00:00',
                'advertisement_end_time'=>'2018-05-20 23:59:59',
            ];
        });

        factory(Advertisement::class, 20)->create();
        // $this->call("OthersTableSeeder");
    }
}
