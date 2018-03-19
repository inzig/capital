<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('slug', 64)->unique('slug_UNIQUE');
            $table->string('type', 32);
            $table->json('base_extra')->nullable();
            $table->softDeletes();
            $table->timestamps();
		});

        Schema::create('category_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('title', 64);
            $table->json('extra')->nullable();
            $table->string('locale')->index();

            $table->unique(['category_id','locale']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_translations');
        Schema::drop('categories');
	}

}
