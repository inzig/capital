<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('discount_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discount_id')->unsigned();
            $table->string('currency')->nullable();
            $table->float('min_amount')->nullable();
            $table->float('max_amount')->nullable();
            $table->float('rate');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discount_rates');
    }
}
