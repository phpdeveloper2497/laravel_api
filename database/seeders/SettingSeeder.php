<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
            'name' => [
                'en' => 'language',
                'ru' => 'язык',
                'uz' => 'til',
            ],
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                'en' => 'English',
                'ru' => 'English',
                'uz' => 'English',
            ],
        ]);

        $setting->values()->create([
            'name' => [
                'en' => 'Русскый',
                'ru' => 'Русскый',
                'uz' => 'Русскый',
            ],
        ]);

        $setting->values()->create([
            'name' => [
                'en' => 'O\'zbek',
                'ru' => 'O\'zbek',
                'uz' => 'O\'zbek',
            ],
        ]);


        $setting = Setting::create([
            'name' => [
                'en' => 'Currency',
                'ru' => 'Валюта',
                'uz' => 'Pul birligi',
            ],
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                'en' => 'sum',
                'ru' => 'sum',
                'uz' => 'so\'m',
            ],
        ]);

        $setting->values()->create([
            'name' => [
                'en' => 'dollar',
                'ru' => 'dollar',
                'uz' => 'dollar',
            ],
        ]);


        $setting = Setting::create([
            'name' => [
                'en' => 'dark mode',
                'ru' => 'темный режим',
                'uz' => 'qorong\'u rejim',
            ],
            'type' => SettingType::SWITCH->value,
        ]);


        $setting = Setting::create([
            'name' => [
                'en' => 'Notifications',
                'ru' => 'Уведомления',
                'uz' => 'Xabarnomalar',
            ],
            'type' => SettingType::SWITCH->value,
        ]);


    }
}
