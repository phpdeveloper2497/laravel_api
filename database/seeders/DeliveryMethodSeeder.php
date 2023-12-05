<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryMethod::create([
            'name' => [
                'en' => 'Free',
                'ru' => 'Бесплптьно',
                'uz' => 'Tekin',
            ],
            'estimated_time' => [
                'en' => 'One week',
                'ru' => 'Неделя',
                'uz' => 'Bir hafta',
            ],
            'delivery_price' => 0,
        ]);

        DeliveryMethod::create([
            'name' => [
                'en' => 'Standard',
                'ru' => 'Стандарт',
                'uz' => 'Standard',
            ],
            'estimated_time' => [
                'en' => 'Three day',
                'ru' => 'Три дня',
                'uz' => 'Uch kun',
            ],
            'delivery_price' => 5,
        ]);

        DeliveryMethod::create([
            'name' => [
                'en' => 'Express',
                'ru' => 'Экспресс',
                'uz' => 'Express',
            ],
            'estimated_time' => [
                'en' => 'One day',
                'ru' => 'Один день',
                'uz' => 'Bir kun',
            ],
            'delivery_price' => 10,
        ]);
    }
}
