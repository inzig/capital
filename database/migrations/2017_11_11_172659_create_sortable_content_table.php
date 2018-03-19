<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSortableContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sortable_content', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('stage')->nullable();
			$table->string('type', 32);
            $table->integer('weight')->default(0);
            $table->json('base_extra')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
		});

        Schema::create('sortable_content_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sortable_content_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description', 65535)->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->json('extra')->nullable();
            $table->string('locale')->index();

            $table->unique(['sortable_content_id','locale']);
            $table->foreign('sortable_content_id')->references('id')->on('sortable_content')->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sortable_content_translations');
		Schema::drop('sortable_content');
	}

}
