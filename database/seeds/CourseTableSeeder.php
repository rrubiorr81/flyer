<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class CourseTableSeeder extends Seeder {
	public function run()
	{
		$faker = Faker::create();
		foreach (range(1, 5) as $index)
		{
			App\Course::create([
                    'name'          => $faker->word,
                    'created_at'    => $faker->dateTime,
                    'updated_at'    => $faker->dateTime,
			               ]);
		}
	}
}