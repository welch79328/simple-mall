<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity', function (Blueprint $table) {
            $table->increments('commodity_id');
            $table->string('commodity_title');
            $table->string('commodity_subtitle')->nullable();
            $table->string('commodity_image')->nullable();
            $table->integer('commodity_price');
            $table->string('commodity_description')->nullable();
            $table->string('commodity_guide')->nullable();
            $table->integer('commodity_stock')->default(0);
            $table->integer('commodity_safe_stock')->default(0);
            $table->enum('commodity_status',['on','off'])->default('on');
            $table->integer('commodity_view')->default(0);
            $table->integer('cate_id')->nullable();
            $table->integer('discount_id')->nullable();
            $table->enum('discount_status',['secondary','main'])->default('main')->nullable();
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
        Schema::dropIfExists('commodity');
    }
}
