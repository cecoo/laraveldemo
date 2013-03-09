<?php

class Create_Users {
/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('username', 64);
		    $table->string('email', 320);
		    $table->string('password', 64);
		    $table->integer('role');
		    $table->boolean('active');
		    $table->timestamps();
		    
		});
		DB::table('users')->insert(array(
		    'username' => 'admin',
		    'email'    => 'nnair@qq.com',
		    'password' => Hash::make('123456'),
		    'role'     => 1,
		    'active'   => true
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}