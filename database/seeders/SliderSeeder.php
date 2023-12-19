<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            ['image' => '64f89cec8f7dd.png'],
            ['image' => '652a79c168d82.png'],
        ];
        foreach ($sliders as $slider) {
            Slider::create($slider);
        }

    }
}
