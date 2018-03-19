<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->dateTime('dated');
            $table->string('currency');
            $table->string('destination_address');
            $table->string('source_address');
            $table->float('amount', 32, 32);
            $table->float('discount', 8, 32)->nullable()->default(null);
            $table->float('estimated_tokens', 32, 32)->nullable()->default(null);
            $table->float('actual_tokens', 32, 32)->nullable()->default(null);
            $table->boolean('is_approved')->nullable()->default(null);
            $table->string('transaction_id')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
