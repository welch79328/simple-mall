<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
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
            $table->string('member_name')->nullable();
            $table->enum('member_sex', ['male', 'female'])->nullable();
            $table->string('member_year')->nullable();
            $table->string('member_month')->nullable();
            $table->string('member_mail');
            $table->string('member_phone')->nullable();
            $table->string('member_tel')->nullable();
            $table->string('member_invoice')->nullable();
            $table->string('member_location')->nullable();
            $table->string('member_city')->nullable();
            $table->string('member_area')->nullable();
            $table->integer('member_zipcode')->nullable();
            $table->enum('member_level', ['member'])->default('member');
            $table->string('member_code');
            $table->boolean('member_enable')->default(0);
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
        Schema::dropIfExists('member');
    }
}
