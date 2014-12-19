<?php
use Faker\Factory as Faker;
class TwitterTokensTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		DB::statement('DELETE from `twitter_tokens`');

		DB::statement('INSERT INTO `twitter_tokens` (`consumer_key`,`consumer_secret`,`proxy`) VALUES ("3nVuSoBZnx6U4vzUxf5w","Bcs59EFbbsdF6Sl9Ng71smgStWEGwXXKSjYvPVt7qys","173.234.227.19:3128")');
		
	}

}
?>