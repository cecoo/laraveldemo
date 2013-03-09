<?php

class Create_Photo {

/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table)
		{
		    $table->increments('id');
		    $table->string('title', 128);
		    $table->string('description', 250);
		    $table->integer('user_id');
		    $table->integer('category_id');
		    $table->string('image', 250);
		    $table->integer('totalviews');
		    $table->string('tags', 300);
		    $table->timestamps();
		});

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}