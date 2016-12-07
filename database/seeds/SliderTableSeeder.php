<?php

use Illuminate\Database\Seeder;
use Simpeg\Model\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('sliders')->truncate();

      Slider::create([
        "title" => "What is Lorem Ipsum?",
        "image" => "slider-1.jpg",
      ]);

      Slider::create([
        "title" => "How is Lorem Ipsum?",
        "image" => "slider-2.jpg",
      ]);
    }
}
