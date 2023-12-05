<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{

    public function run(): void
    {

        User::find(2)->addresses()->create([

            "latitude" => "52.860014",
            "longitude" =>"45.887412",
           "region" => "Tashkent",
            "district" => "Chilonzor disctict",
            "street" => "Dombirobod MFY",
            "home" => "145"

        ]);

        User::find(2)->addresses()->create([

            "latitude" => "41.310014",
            "longitude" =>"69.2807412",
            "region" => "Tashkent",
            "district" => "Yunusobod disctict",
            "street" => "Istiqbol MFY",
            "home" => "763"

        ]);


    }
}
