<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return', function (Blueprint $table) {
            $table->increments('return_id');
            $table->integer('order_number');
            $table->enum('return_status', ['refund', 'exchange', 'complete'])->default('refund');;
            $table->string('return_account')->nullable();
            $table->string('return_reason');
            $table->integer('order_id');
            $table->string('creator')->nullable();
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
        Schema::dropIfExists('return');
    }
}
