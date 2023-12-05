<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => [
                'en' => 'New',
                'ru' => 'Новый',
                'uz' => 'Yangi',
            ],
            'code' => 'new',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Confirmed',
                'ru' => 'Подтвержденный',
                'uz' => 'Tasdiqlangan',
            ],
            'code' => 'confirmed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Processing continues',
                'ru' => 'Обработка продолжается',
                'uz' => 'Ishlab chiqilmoqda',
            ],
            'code' => 'processing_continues',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Awaiting payment',
                'ru' => 'Ожидание оплаты',
                'uz' => 'To\'lovni kutmoqda',
            ],
            'code' => 'waiting_payment',
            'for' => 'order'
        ]);


        Status::create([
            'name' => [
                'en' => 'Payment accepted',
                'ru' => 'Платеж принят',
                'uz' => 'To\'lov qabul qilindi',
            ],
            'code' => 'payment_accepted',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Payment error',
                'ru' => 'Ошибка оплаты',
                'uz' => 'To\'lov xatosi',
            ],
            'code' => 'payment_error',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'To\'lov qaytarildi',
                'ru' => 'Возвращено',
                'uz' => 'Refunded',
            ],
            'code' => 'refunded',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Cancelled',
                'ru' => 'Отменено',
                'uz' => 'Bekor qilingan',
            ],
            'code' => 'canceled',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Shipping',
                'ru' => 'Перевозки',
                'uz' => 'Yetkazib berilyapti',
            ],
            'code' => 'shipping',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Yetkazib berildi',
                'ru' => 'Доставленный',
                'uz' => 'Delivered',
            ],
            'code' => 'delivered',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Completed',
                'ru' => 'Завершенный',
                'uz' => 'Bajarildi',
            ],
            'code' => 'completed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'en' => 'Closed',
                'ru' => 'Yopildi',
                'uz' => 'Закрыто',
            ],
            'code' => 'closed',
            'for' => 'order'
        ]);

    }
}
