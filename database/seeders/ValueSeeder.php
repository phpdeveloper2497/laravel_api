<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{

    public function run(): void
    {

    $attribute = Attribute::find(1);

        $attribute->values()->create([
            'name' =>[
                'en' => 'red',
                'ru' => 'красный',
                'uz' => 'qizil',
            ],
        ]);

       $attribute->values()->create([
            'name' =>[
                'en' => 'yellow',
                'ru' => 'желтый',
                'uz' => 'sariq',
            ],
        ]);

        $attribute->values()->create([
            'name' =>[
                'en' => 'white',
                'ru' => 'белый',
                'uz' => 'oq',
            ],
        ]);

        $attribute = Attribute::find(2);

        $attribute->values()->create([
            'name' =>[
                'en' => 'MDF',
                'ru' => 'МДФ',
                'uz' => 'MDF',
            ],
        ]);

        $attribute->values()->create([
            'name' =>[
                'en' => 'LDSP',
                'ru' => 'ЛДСП',
                'uz' => 'LDSP',
            ],
        ]);
    }
}
