<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLastFetchedCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('last_fetched_tweet', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('tweet_id')->unsigned();
			$table->integer('company_id')->unique()->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('last_fetched_tweet');
	}

}
