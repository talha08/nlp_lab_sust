<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'slider_title' => 'Natural Language Processing(NLP)',
            'slider_position' => 'k-carousel-caption pos-1-3-left scheme-light',
            'slider_desc' => 'Natural Language Processing(NLP) is a field of intelligence, and computational linguistics concerned with the interaction between computers and human (natural) languages.',
            'img_url' => '/basic/1.png',
            'thumb_url' => '/basic/1.png',
        ]);
        Slider::create([
            'slider_title' => 'Natural Language Processing(NLP)',
            'slider_position' => 'k-carousel-caption pos-1-3-right scheme-light',
            'slider_desc' => 'Natural Language Processing(NLP) is a field of intelligence, and computational linguistics concerned with the interaction between computers and human (natural) languages.',
            'img_url' => '/basic/2.jpg',
            'thumb_url' => '/basic/2.jpg',
        ]);
        Slider::create([
            'slider_title' => 'Natural Language Processing(NLP)',
            'slider_position' => 'k-carousel-caption pos-1-3-left scheme-light',
            'slider_desc' => 'Natural Language Processing(NLP) is a field of intelligence, and computational linguistics concerned with the interaction between computers and human (natural) languages.',
            'img_url' => '/basic/3.jpg',
            'thumb_url' => '/basic/3.jpg',
        ]);
        Slider::create([
            'slider_title' => 'Natural Language Processing(NLP)',
            'slider_position' => 'k-carousel-caption pos-1-3-right scheme-light',
            'slider_desc' => 'Natural Language Processing(NLP) is a field of intelligence, and computational linguistics concerned with the interaction between computers and human (natural) languages.',
            'img_url' => '/basic/4.jpg',
            'thumb_url' => '/basic/4.jpg',
        ]);
    }
}
