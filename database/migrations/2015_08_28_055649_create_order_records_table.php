<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_records', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid');
			$table->float('money');
			$table->float('gold');
			$table->string('consumeorin');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_records');

	}

}
