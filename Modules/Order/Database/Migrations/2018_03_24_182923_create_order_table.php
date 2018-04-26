<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('order_number');
            $table->integer('order_total');
            $table->enum('order_status', ['complete', 'refund', 'pending', 'cancel', 'shipping'])->default('pending');
            $table->string('order_name');
            $table->string('order_phone')->nullable();
            $table->string('order_tel')->nullable();
            $table->string('order_mail')->nullable();
            $table->integer('order_zipcode')->nullable();
            $table->string('order_address');
            $table->text('order_comment')->nullable();
            $table->boolean('is_mail')->default(0);
            $table->boolean('is_pay')->default(0);
            $table->integer('member_id');
            $table->timestamp('delivery_time')->nullable();
            $table->string('editor')->nullable();
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
        Schema::dropIfExists('order');
    }
}
