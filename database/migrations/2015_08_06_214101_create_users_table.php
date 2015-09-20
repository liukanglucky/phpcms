<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');   //realname
			$table->string('nickname');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->float('point')->default(0);
			$table->float('gold')->default(0);
			$table->integer('status')->default(0);  //status guest:0 member:1 admin:10
			$table->integer('ugid')->default(1);
			$table->string('ugname')->default('普通会员');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
