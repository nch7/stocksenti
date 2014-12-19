<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CompanysTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Company::truncate();
		foreach(range(1, 100) as $index)
		{
			Company::create([
				'symbol' => $faker->randomLetter().$faker->randomLetter().$faker->randomLetter().$faker->randomLetter(),
				'name' => $faker->sentence(4)
			]);
		}
	}

}