<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_member', function (Blueprint $table) {
            $table->increments('member_id');
            $table->string('member_account');
            $table->string('member_password');
            $table->string('member_name');
            $table->string('member_mail')->nullable();
            $table->string('member_phone')->nullable();
            $table->string('member_tel')->nullable();
            $table->string('member_location')->nullable();
            $table->enum('member_level', ['member','admin','manager'])->default('member');
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
        Schema::dropIfExists('admin_member');
    }
}
