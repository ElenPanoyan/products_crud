<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Male Clothes',
            'description' => 'Clothing for men',
        ]);

        Category::create([
            'title' => 'Female Clothes',
            'description' => 'Clothing for women',
        ]);

        Category::create([
            'title' => 'Baby Clothes',
            'description' => 'Clothing for children',
        ]);
    }
}
