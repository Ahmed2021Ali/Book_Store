<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run(): void
    {
        $banners = [
            ['image' => '64f8a230cd73a.png'],
            ['image' => '64f8fdfdbba7f.png'],
            ['image' => '64f8fe035c0f4.png'],
        ];
        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
