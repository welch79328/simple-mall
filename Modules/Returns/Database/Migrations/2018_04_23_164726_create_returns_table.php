<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('returns_id');
            $table->string('order_number');
            $table->enum('returns_reason', ['1', '2', '3', '4'])->default('1');
            $table->enum('returns_status', ['complete', 'pending'])->default('pending');
            $table->string('bank_code')->nullable();
            $table->string('returns_account')->nullable();
            $table->string('returns_account_name')->nullable();
            $table->string('returns_name');
            $table->string('returns_phone')->nullable();
            $table->string('returns_tel')->nullable();
            $table->string('returns_mail')->nullable();
            $table->integer('returns_zipcode')->nullable();
            $table->string('returns_address');
            $table->text('returns_comment')->nullable();
            $table->integer('member_id');
            $table->integer('order_id');
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
        Schema::dropIfExists('returns');
    }
}
