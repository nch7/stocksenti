<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CompanyScoresTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::statement('DELETE FROM `active_companys`');
		$data = '';
		for($i=0; $i<2000; $i++){
			// $data[] = array('score'=>$faker->numberBetween(30,190),'time'=>time()-$faker->numberBetween(1,300000));
			$data.=sprintf('( "%d","%d","%d"),',rand(30,190),time()-rand(1,300000),rand(1,100));
		}
		$data = trim($data,',');

		DB::statement(sprintf('INSERT INTO `company_scores` (`score`,`time`,`company_id`) VALUES %s',$data));
	}

}