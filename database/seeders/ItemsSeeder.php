<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commodity;
class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfItems = 1000;

        for ($i = 0; $i < $numberOfItems; $i++) {
            Commodity::create([
                'item_name' => fake()->sentence(3),
                'item_description' => fake()->sentence(6),
                'required_points' => fake()->randomNumber(2, true),
                'quantity' => fake()->randomNumber(3, true),
                'image' => fake()->randomElement([fake()->imageUrl(640, 480, 'cats'), fake()->imageUrl(640, 480, 'abstract'), fake()->imageUrl(640, 480, 'animals'), fake()->imageUrl(640, 480, 'business'), fake()->imageUrl(640, 480, 'cats'), fake()->imageUrl(640, 480, 'city'), fake()->imageUrl(640, 480, 'food'), fake()->imageUrl(640, 480, 'nightlife'), fake()->imageUrl(640, 480, 'fashion'), fake()->imageUrl(640, 480, 'people'), fake()->imageUrl(640, 480, 'nature'), fake()->imageUrl(640, 480, 'sports'), fake()->imageUrl(640, 480, 'technics'), fake()->imageUrl(640, 480, 'transport')])
            ]);
        }
    }
}
