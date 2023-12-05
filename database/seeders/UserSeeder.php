<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $admin = User::create([

        'firstname' => 'admin',
        'lastname' => 'admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('password'),
        'phone' => '+998999999999',
       ]);

        $admin->roles()->attach(1);

        $admin = User::create([

            'firstname' => 'developer',
            'lastname' => 'developer',
            'email' => 'developer@developer.com',
            'password' => Hash::make('password'),
            'phone' => '+998989999999',
        ]);

        $admin->roles()->attach(2);

        User::factory()->count(10)->hasAttached(Role::find(3))->create();
    }
}
