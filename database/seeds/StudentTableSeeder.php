<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Student;

class StudentTableSeeder extends Seeder
{

    public function run()
    {
        //remember to run this from the VM...

//        DB::table('student')->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 25; $i++) {
            Student::create([
                'name' => $faker->name(),
                'created_at'    => $faker->dateTime,
                'updated_at'    => $faker->dateTime,
            ]);
        }

    }
}
