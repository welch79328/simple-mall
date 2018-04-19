<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('spec_name')->nullable();
            $table->integer('amount');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->string('creator')->nullable();
            $table->enum('status', ['complete', 'refund', 'pending', 'cancel', 'shipping'])->default('pending');
            $table->integer('commodity_id');
            $table->integer('spec_id')->nullable();
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
        Schema::dropIfExists('order_list');
    }
}
