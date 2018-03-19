<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {
            $table->increments('advertisement_id');
            $table->string('advertisement_name');
            $table->string('advertisement_image')->nullable();
            $table->string('advertisement_redirect')->nullable();
            $table->string('advertisement_start_time');
            $table->string('advertisement_end_time');
            $table->integer('advertisement_ordering')->default(1);
            $table->integer('advertisement_point')->default(0);
            $table->enum('advertisement_status',['on','off'])->default('on');
            $table->string('advertisement_creator')->nullable();
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
        Schema::dropIfExists('advertisement');
    }
}
