<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CompanysTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('TwitterTokensTableSeeder');
		$this->call('StocktwitsTokensTableSeeder');
		$this->call('CompanyScoresTableSeeder');
	}

}
