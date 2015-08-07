<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Course;
use App\Student;

class CourseStudentSeeder  extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $courseIds = Course::lists('id')->all();
        $studentIds = Student::lists('id')->all();
//        dd($studentIds);

        foreach (range(1, count($courseIds)) as $index) {
            DB::table('course_student')->insert([
                'course_id'     => $faker->randomElement($courseIds),
                'student_id'    => $faker->randomElement($studentIds)
            ]);

        }
    }
}