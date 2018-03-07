<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->string('discount_name');
            $table->enum('discount_type',['satisfy','sort_combination','sort','single'])->default('single');
            $table->string('discount_value')->nallable();
            $table->enum('discount_unit',['%','$'])->default('%');
            $table->integer('discount_level')->default(1);
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
        Schema::dropIfExists('discount');
    }
}
