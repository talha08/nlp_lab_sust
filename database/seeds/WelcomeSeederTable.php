<?php

use Illuminate\Database\Seeder;

class WelcomeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Welcome::create( [
            'welcome_title' => 'Welcome to the NLP Lab at SUST!',
            'welcome_details' => 'The Natural Language Processing Group at Stanford University is a team of faculty, postdocs, programmers and students who work together on algorithms that allow computers to process and understand human languages. Our work ranges from basic research in computational linguistics to key applications in human language technology, and covers areas such as sentence understanding, automatic question answering, machine translation, syntactic parsing and tagging, sentiment analysis, and models of text and visual scenes, as well as applications of natural language processing to the digital humanities and computational social sciences.

A distinguishing feature of the Stanford NLP Group is our effective combination of sophisticated and deep linguistic modeling and data analysis with innovative probabilistic, machine learning, and deep learning approaches to NLP. Our research has resulted in state-of-the-art technology for robust, broad-coverage natural-language processing in a number of languages. We provide a widely used, integrated NLP toolkit, Stanford CoreNLP. Particular technologies include our competition-winning coreference resolution system; a high speed, high performance neural network dependency parser; a state-of-the-art part-of-speech tagger; a competition-winning named entity recognizer; and algorithms for processing Arabic, Chinese, French, German, and Spanish text.

The Stanford NLP Group includes members of both the Linguistics Department and the Computer Science Department, and is part of the Stanford AI Lab.'

        ]);
    }
}
