<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(EntrustTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(ProjectCatTableSeeder::class);
        //$this->call(ProjectTableSeeder::class);
        //$this->call(PaperTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        //$this->call(AwardTableSeeder::class);
        $this->call(EventTableSeeder::class);
       // $this->call(EventFileTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(WelcomeSeederTable::class);



        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        Model::reguard();
    }
}
