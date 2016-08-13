<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>1]);
        User::create(['name' => 'Admin1','email' => 'admin1@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>1]);
        User::create(['name' => 'Admin2','email' => 'admin2@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>1]);
        User::create(['name' => 'Admin3','email' => 'admin3@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>1]);
        User::create(['name' => 'Admin4','email' => 'admin4@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>0]);
        User::create(['name' => 'Admin5','email' => 'admin5@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>0]);
        User::create(['name' => 'Admin6','email' => 'admin6@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>0]);
        User::create(['name' => 'Admin7','email' => 'admin7@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>2]);
        User::create(['name' => 'Admin8','email' => 'admin8@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>2]);
        User::create(['name' => 'Admin9','email' => 'admin9@gmail.com','password' => bcrypt('a'),'status'=> true,'is_teacher'=>2]);

        //creating 10 test users
        // factory(User::class,10)->create();

    }
}
