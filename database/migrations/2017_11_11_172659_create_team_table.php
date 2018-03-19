<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('stage')->nullable();
			$table->string('type', 32);
			$table->string('image')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('linkedin')->nullable();
			$table->integer('weight')->nullable()->default(0);
            $table->json('base_extra')->nullable();
            $table->softDeletes();
            $table->timestamps();
		});

        Schema::create('team_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->string('name', 64)->nullable();
            $table->string('designation', 64)->nullable();
            $table->text('description', 65535)->nullable();
            $table->json('extra')->nullable();
            $table->string('locale')->index();

            $table->unique(['team_id','locale']);
            $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_translations');
		Schema::drop('team');
	}

}
