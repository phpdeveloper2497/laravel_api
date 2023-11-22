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
            'name' => [
                'en' => 'Chair',
                'ru' =>'Стул',
                'uz' =>'Stul',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Table',
                'ru' => 'Столь',
                'uz' => 'Stol',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Armchair',
                'ru' =>'Кресло',
                'uz' =>'Kreslo',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Bed',
                'ru' =>'Кровать',
                'uz' =>'To\'shak',
            ],

        ]);
    }
}
