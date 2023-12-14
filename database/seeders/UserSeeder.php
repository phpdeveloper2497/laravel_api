<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'firstname' => 'admin',
            'lastname' => 'vladets',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'phone' => '+9989599999',
        ]);
        $user->assignRole('admin');

        $user = User::create([

            'firstname' => 'editor',
            'lastname' => 'o\'zgartiruvchi',
            'email' => 'editor@editor.com',
            'password' => Hash::make('password'),
            'phone' => '+99899999999',
        ]);
        $user->assignRole('editor');

        $user = User::create([

            'firstname' => 'shop',
            'lastname' => 'manager',
            'email' => 'shop@manager.com',
            'password' => Hash::make('password'),
            'phone' => '+9989008199',
        ]);
        $user->assignRole('shop-manager');

        $user = User::create([

            'firstname' => 'customer',
            'lastname' => 'xaridor',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password'),
            'phone' => '+9989008299',
        ]);
        $user->assignRole('customer');

        $users = User::factory()->count(10)->create();

        foreach ($users as $user) {
            $user->assignRole('customer');
        }
    }
}
