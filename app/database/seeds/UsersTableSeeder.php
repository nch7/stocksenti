<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
// use Hash;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$companies = Company::all();
		$companyIds = array();
		User::truncate();
		foreach($companies as $company){
			$companyIds[] = $company->id;
		}

		foreach(range(1, 20) as $index)
		{
			$username = $faker->unique()->username();
			$user = User::create([
				'username' => $username,
				'password'=> Hash::make($username),
			]);

			$user->companys()->sync(array_rand($companyIds,$faker->numberBetween(2,5)));
		}
	}

}