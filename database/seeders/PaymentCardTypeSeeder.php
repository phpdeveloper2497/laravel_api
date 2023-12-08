<?php

namespace Database\Seeders;

use App\Models\PaymentCardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentCardType::create([
            'name' => 'Visa',
            'code' => 'VISA',
            'icon' => 'visa',
        ]);

        PaymentCardType::create([
            'name' => 'UzCard',
            'code' => 'uzcard',
            'icon' => 'uzcard',
        ]);

        PaymentCardType::create([
            'name' => 'Humo',
            'code' => 'humo',
            'icon' => 'humo',
        ]);
    }
}
