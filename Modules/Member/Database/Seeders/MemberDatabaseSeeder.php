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
            $str = 'a123456';
            $password = Crypt::encrypt($str);
            $mail = $faker->unique()->safeEmail;
            return [
                'member_name' => $faker->name,
                'member_mail' => $mail,
                'member_account' => $mail,
                'member_password' => $password,
            ];
        });

        factory(Member::class, 20)->create();

        // $this->call("OthersTableSeeder");
    }
}
