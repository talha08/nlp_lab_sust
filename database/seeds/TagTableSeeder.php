<?php
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Tag::class,10)->create();

        Tag::create(['name' => 'Laravel']);
        Tag::create(['name' => 'Android']);
        Tag::create(['name' => 'Php']);
        Tag::create(['name' => 'Java']);
        Tag::create(['name' => 'C#']);
        Tag::create(['name' => 'C & C++']);
        Tag::create(['name' => 'Spring']);
        Tag::create(['name' => 'Javascript']);
        Tag::create(['name' => 'JQuery']);
        Tag::create(['name' => 'Ajax']);
        Tag::create(['name' => 'Node-js']);
        Tag::create(['name' => 'Sails']);
        Tag::create(['name' => 'Express']);
        Tag::create(['name' => 'Rubi on Rail']);
        Tag::create(['name' => 'Angular']);
        Tag::create(['name' => 'Objective C']);
        Tag::create(['name' => 'Python']);
        Tag::create(['name' => 'Networking']);
        Tag::create(['name' => 'Computer Architecture']);
        Tag::create(['name' => 'Data Communication']);
        Tag::create(['name' => 'Machine Learning']);
        Tag::create(['name' => 'Mathematics']);
    }
}
