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

        $categoryArmchair = Category::create([
            'name' => [
                'en' => 'Armchair',
                'ru' =>'Кресло',
                'uz' =>'Kreslo',
            ],
        ]);

        $categoryArmchair->ChildCategories()->create([
            'name' => [
                'en' => 'Gaming',
                'ru' =>'Игровой',
                'uz' =>'O\'yin',
            ],
        ]);

        $officeChildCategory = $categoryArmchair->ChildCategories()->create([
            'name' => [
                'en' => 'Office',
                'ru' =>'Кресло',
                'uz' =>'Idora',
            ],
        ]);

        $officeChildCategory->ChildCategories()->create([
            'name' => [
                'en' => 'Maarten soft',
                'ru' =>'Мартен мягкий',
                'uz' =>'Maarten yumshoq',
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
