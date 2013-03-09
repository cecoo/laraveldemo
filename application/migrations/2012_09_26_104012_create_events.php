<?php

class Create_Event {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table)
		{
		    $table->increments('id');
		    $table->string('title', 128);
		    $table->string('description', 250);
		    $table->text('content');
		    $table->integer('user_id');
		    $table->timestamp('start_day');
		    $table->timestamp('end_day');
		    $table->string('from', 250);
		    $table->string('to', 250);
		    $table->string('image', 250);
		    $table->integer('maxattend');
		    $table->timestamp('over_day');
		    $table->string('budget', 250);
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
		Schema::drop('events');
	}

}