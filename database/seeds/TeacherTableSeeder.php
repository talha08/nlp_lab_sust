<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create(['user_id'=> 1,'position' => 'Lecturer']);
        Teacher::create(['user_id'=> 2,'position' => 'Lecturer']);
        Teacher::create(['user_id'=> 3,'position' => 'Lecturer']);
        Teacher::create(['user_id'=> 4,'position' => 'Lecturer']);

    }
}
