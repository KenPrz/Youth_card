<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commodity;
class CommodityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfCommodities = 50;

        for ($i = 0; $i < $numberOfCommodities; $i++) {

            Commodity::create([
                'item_name' => fake()->sentence,
                'item_description' => fake()->sentence,
                'required_points' => fake()->randomDigit,
                'quantity' => fake()->randomDigit,
                'image' => fake()->imageUrl,
            ]);
        }
    }
}
