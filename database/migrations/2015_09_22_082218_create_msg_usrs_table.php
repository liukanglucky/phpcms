<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsgUsrsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('msg_usrs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('msgid');
			$table->integer('senderid');
			$table->string('sender');
			$table->integer('ugid');
			$table->integer('receiverid');
			$table->string('receiver');
			$table->integer('stat');    //0 未读 1 已读
			$table->integer('usrtype')->default(0);    //0 个人 1 用户组织
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('msg_usrs');
	}

}
