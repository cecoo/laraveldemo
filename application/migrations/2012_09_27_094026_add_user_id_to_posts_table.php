<?php

class Add_User_Id_To_Posts_Table {

	public function up()
	{
		Schema::table('posts', function($table) {
			$table->integer('user_id');
		});
	}

	public function down()
	{
		Schema::table('posts', function($table) {
			$table->drop_column('user_id');
		});
	}

}