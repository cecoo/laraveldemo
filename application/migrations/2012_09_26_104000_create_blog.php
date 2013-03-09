<?php

class Create_Blog {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function($table)
		{
		    $table->increments('id');
		    $table->string('title', 128);
		    $table->string('description', 250);
		    $table->text('content');
		    $table->integer('author_id');
		    $table->integer('views');
		    $table->string('pictrue', 280);
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
		Schema::drop('blogs');
	}
	

}