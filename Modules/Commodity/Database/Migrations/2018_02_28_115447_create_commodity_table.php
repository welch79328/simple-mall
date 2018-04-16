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
            $table->integer('commodity_originalprice')->default(0);
            $table->integer('commodity_price');
            $table->string('commodity_description')->nullable();
            $table->text('commodity_introduce')->nullable();
            $table->integer('commodity_stock')->default(0);
            $table->integer('commodity_safe_stock')->default(0);
            $table->string('commodity_start_time');
            $table->string('commodity_end_time');
            $table->integer('commodity_ordering')->default(1);
            $table->enum('commodity_status', ['on', 'off'])->default('on');
            $table->enum('commodity_type', ['general', 'limited '])->default('general');
            $table->integer('commodity_view')->default(0);
            $table->integer('cate_id')->nullable();
            $table->integer('discount_id')->nullable();
            $table->enum('discount_status', ['secondary', 'main'])->default('main')->nullable();
            $table->string('commodity_creator')->nullable();
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
