<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'キャンプ',
            'display_order' => 1,
        ]);
        Category::create([
            'name' => 'トレッキング',
            'display_order' => 2,
        ]);
        Category::create([
            'name' => 'サイクリング',
            'display_order' => 3,
        ]);
        Category::create([
            'name' => 'フィッシング',
            'display_order' => 4,
        ]);
        Category::create([
            'name' => 'スキー・スノボ',
            'display_order' => 5,
        ]);
    }
}
