<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysconfsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sysconfs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('webname'); 
			$table->string('logo');
			$table->string('aboutus');
			$table->string('law');
			$table->string('otherhrefname');
			$table->string('otherhrefpid');
			$table->string('menu');
			$table->string('menuhref');
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
		Schema::drop('sysconfs');
	}

}
