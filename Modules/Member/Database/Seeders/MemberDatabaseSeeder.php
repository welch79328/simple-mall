<?php

namespace Modules\Member\Database\Seeders;


use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Modules\Member\Entities\Member;


class MemberDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Factory $factory)
    {
        Model::unguard();

        $factory->define(Member::class, function (Faker $faker) {
            $str = '1234';
            $password = Crypt::encrypt($str);
            return [
                'member_name' => $faker->name,
                'member_mail' => $faker->unique()->safeEmail,
                'member_account' => str_random(5),
                'member_password' => $password,
            ];
        });

        factory(Member::class, 20)->create();

        // $this->call("OthersTableSeeder");
    }
}
