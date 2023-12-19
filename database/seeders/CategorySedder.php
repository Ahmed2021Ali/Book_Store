<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySedder extends Seeder
{

    public function run(): void
    {
        $categories = [
            ['title' => 'كتب العربية'],
            ['title' => 'كتب الانجليزية'],
            ['title' => 'كتب الدينية'],
            ['title' => 'كتب البرمجة'],
            ['title' => 'كتب التاريخية'],

        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
