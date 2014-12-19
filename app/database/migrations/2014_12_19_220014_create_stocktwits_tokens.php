<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocktwitsTokens extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocktwits_tokens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('client_id')->unique();
			$table->integer('last_action')->unsigned()->default('0');
			$table->string('proxy');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stocktwits_tokens');
	}

}
