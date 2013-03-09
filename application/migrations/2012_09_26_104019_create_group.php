<?php

class Create_Group {

/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function($table)
		{
		    $table->increments('id');
		    $table->string('name', 128);
		    $table->string('description', 250);
		    $table->integer('user_id');
		    $table->string('logo', 250);
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
		Schema::drop('groups');
	}
}