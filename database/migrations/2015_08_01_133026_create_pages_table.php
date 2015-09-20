<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sid');
			$table->string('sname');
			$table->string('ugid');
			$table->timestamps();
			$table->string('title');
			$table->longText('content');
			$table->string('uname')->default('匿名');
			$table->integer('uid')->default(0);
			$table->string('image');
			$table->date("create_at");
			$table->boolean('isCharge')->default(false);;
			$table->float('coin')->default(0);
			$table->string('file');
			$table->integer('comment')->default(0);   // 0不开启，1 开启
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
