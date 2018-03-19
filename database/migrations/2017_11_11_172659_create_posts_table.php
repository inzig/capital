<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->nullable();
			$table->integer('author_id')->unsigned();
            $table->string('slug')->unique('slug_UNIQUE');
			$table->boolean('status')->default(1);
			$table->integer('weight')->nullable()->default(0);
            $table->date('published_at')->nullable();
            $table->json('base_extra')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('author_id')->references('id')->on('users');
		});

        Schema::create('post_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->string('title');
            $table->text('body', 65535)->nullable();
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->json('extra')->nullable();
            $table->string('locale')->index();

            $table->unique(['post_id','locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('post_translations');
		Schema::drop('posts');
	}

}
