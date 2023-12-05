<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'category_id' => rand(1,4),
        'name' => [
            "en" => fake()->sentence(2),
            "ru" =>"Мебели появилась за 500 лет до н.э",
            "uz" => "Yog'och mebellari 500 yil "
        ],
        'price' => rand(10,200),
        'description' =>
            [
                'en' => fake()->paragraph(6),
                'ru' =>'Беспорядочно разбросанные вещи по углам, вместо шкафа. Камни с сеном, вместо кроватей, именно такие спальные места были у наших предков. Чуть позже, люди привыкли спать на печах, и так продолжалось до 17го века. Пространство застилали сеном или другими высушенными растениями, и благополучно спали на них.',
                "uz" => "Shkaf o'rniga burchaklarda narsalar tasodifiy tarqalib ketgan. Ko'rpa-to'shak o'rniga pichan bilan toshlar, bu bizning ota-bobolarimiz bo'lgan uyqu joylari. Biroz vaqt o'tgach, odamlar pechkada uxlashga o'rgandilar va bu 17-asrgacha davom etdi. Bo'shliq pichan yoki boshqa quritilgan o'simliklar bilan qoplangan va ular ustiga xavfsiz tarzda uxlab qolishgan."
            ]
        ];
    }
}
