<?php

class Add_Name_To_Users_Table {

	public function up()
	{
		Schema::table('users', function($table) 
{
          $table->string('name', 120);

		});
	}

	public function down()
	{
		Schema::table('users', function($table) {
			$table->drop_column('name');
		});
	}

}