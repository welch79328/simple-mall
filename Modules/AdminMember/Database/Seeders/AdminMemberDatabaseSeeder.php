<?php

namespace Modules\AdminMember\Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Modules\AdminMember\Entities\AdminMember;

class AdminMemberDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Factory $factory)
    {
        Model::unguard();

        $factory->define(AdminMember::class, function (Faker $faker) {
            $str = '1234';
            $password = Crypt::encrypt($str);
            return [
                'member_name' => $faker->name,
                'member_mail' => $faker->unique()->safeEmail,
                'member_account' => str_random(5),
                'member_password' => $password,
            ];
        });

        $factory->defineAs(AdminMember::class, 'admin', function (Faker $faker) {
            $str = '1234';
            $password = Crypt::encrypt($str);
            return [
                'member_name' => 'admin',
                'member_mail' => $faker->unique()->safeEmail,
                'member_account' => 'admin',
                'member_password' => $password,
            ];
        });


        factory(AdminMember::class, 'admin')->create();
        factory(AdminMember::class, 20)->create();
    }
}
