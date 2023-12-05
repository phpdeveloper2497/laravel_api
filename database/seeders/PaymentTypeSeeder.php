<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentType::create([
            'name' =>[
                'en' => 'Cash',
                'ru' => 'Наличные',
                'uz' => 'Naqd',
            ],
        ]);

        PaymentType::create([
            'name' =>[
                'en' => 'With card upon receipt',
                'ru' => 'С картой при получения',
                'uz' => 'Qabul qilgandan keyin karta bilan',
            ],
        ]);

        PaymentType::create([
            'name' =>[
                'en' => 'Click',
                'ru' => 'Click',
                'uz' => 'Click',
            ],
        ]);

        PaymentType::create([
            'name' =>[
                'en' => 'Payme',
                'ru' => 'Payme',
                'uz' => 'Payme',
            ],
        ]);

        PaymentType::create([
            'name' =>[
                'en' => 'Uzumbank',
                'ru' => 'Uzumbank',
                'uz' => 'Uzumbank',
            ],
        ]);
    }
}
