<?php

namespace Modules\Discount\Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Discount\Entities\Discount;

class DiscountDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Factory $factory)
    {
        Model::unguard();

        $factory->define(Discount::class, function (Faker $faker) {
            $discount_type = ['satisfy','sort_combination','sort','single'];
            $discount_unit = ['%','$'];
            return [
                'discount_name' => $faker->name,
                'discount_type' => $discount_type[rand(0,3)],
                'discount_value' => rand(20,100),
                'discount_unit' => $discount_unit[rand(0,1)],
                'discount_level' => rand(1,5),
            ];
        });

        factory(Discount::class, 20)->create();
    }
}
