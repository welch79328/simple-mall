<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('member_id');
            $table->string('member_account');
            $table->string('member_password');
            $table->string('member_name');
            $table->enum('member_sex', ['boy','girl'])->nullable();
            $table->string('member_birthday')->nullable();
            $table->string('member_mail');
            $table->string('member_phone')->nullable();
            $table->string('member_tel')->nullable();
            $table->string('member_invoice')->nullable();
            $table->string('member_location')->nullable();
            $table->string('member_city')->nullable();
            $table->string('member_area')->nullable();
            $table->integer('member_zipcode')->nullable();
            $table->enum('member_level', ['vip','1','2','3'])->default('3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
