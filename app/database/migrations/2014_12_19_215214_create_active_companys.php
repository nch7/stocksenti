<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActiveCompanys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('active_companys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->unique();
			$table->tinyInteger('status')->unsigned();
			$table->integer('last_action')->unsigned();
			$table->tinyInteger('state');  
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('active_companys');
	}

}
