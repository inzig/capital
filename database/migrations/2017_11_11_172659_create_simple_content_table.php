<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSimpleContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('simple_content', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('stage')->nullable();
			$table->string('type', 32);
            $table->json('base_extra')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
		});

        Schema::create('simple_content_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('simple_content_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description', 65535)->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->json('extra')->nullable();
            $table->string('locale')->index();

            $table->unique(['simple_content_id','locale']);
            $table->foreign('simple_content_id')->references('id')->on('simple_content')->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('simple_content_translations');
        Schema::drop('simple_content');
	}

}
