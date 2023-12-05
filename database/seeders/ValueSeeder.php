<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'attribute_id' =>1,
            'name' =>[
                'en' => 'red',
                'ru' => 'красный',
                'uz' => 'qizil',
            ],
        ]);

        Value::create([
            'attribute_id' =>1,
            'name' =>[
                'en' => 'yellow',
                'ru' => 'желтый',
                'uz' => 'sariq',
            ],
        ]);

        Value::create([
            'attribute_id' =>1,
            'name' =>[
                'en' => 'white',
                'ru' => 'белый',
                'uz' => 'oq',
            ],
        ]);

        Value::create([
            'attribute_id' =>2,
            'name' =>[
                'en' => 'MDF',
                'ru' => 'МДФ',
                'uz' => 'MDF',
            ],
        ]);

        Value::create([
            'attribute_id' =>2,
            'name' =>[
                'en' => 'LDSP',
                'ru' => 'ЛДСП',
                'uz' => 'LDSP',
            ],
        ]);
    }
}
