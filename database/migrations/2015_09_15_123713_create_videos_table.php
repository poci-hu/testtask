<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->string('video');
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		});

		Schema::create('category_video', function(Blueprint $table)
		{
			$table->integer('category_id')->unsigned();
			$table->integer('video_id')->unsigned();

			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_video');
		Schema::drop('videos');
	}

}
