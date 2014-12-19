<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTwitterTokens extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('twitter_tokens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('consumer_key')->unique();
			$table->string('consumer_secret'); 
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
		Schema::drop('twitter_tokens');
	}

}
