<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
// use Hash;

class StocktwitsTokensTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		DB::statement('DELETE from `stocktwits_tokens`');

		DB::statement('INSERT INTO `stocktwits_tokens` (`client_id`,`proxy`) VALUES ("334c5301dbd603f4a6bf4e31d67cb84d621bed4f","173.234.57.241:3128")');
		
	}

}