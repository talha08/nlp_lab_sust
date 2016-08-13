<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 5/30/2016
 * Time: 2:51 PM
 */

use Illuminate\Database\Seeder;

class EventFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\EventFile::class,10)->create();
    }
}
