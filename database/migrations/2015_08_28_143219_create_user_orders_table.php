<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('uid');
			$table->string('uname');
			$table->integer('pid');
			$table->string('pname');
			$table->float('gold')->default(0);
			$table->integer('status')->default(0);   // 0起始状态     1待支付  2完成 
			$table->integer('readnum')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_orders');
	}

}
