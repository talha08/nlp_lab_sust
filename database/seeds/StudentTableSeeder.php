<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create(['user_id'=> 5,'platform' => 'Data science']);
        Student::create(['user_id'=> 6,'platform' => 'Data science']);
        Student::create(['user_id'=> 7,'platform' => 'Data science']);
        Student::create(['user_id'=> 8,'platform' => 'Data science']);
        Student::create(['user_id'=> 9,'platform' => 'Data science']);
        Student::create(['user_id'=> 10,'platform' => 'Data science']);

    }
}
