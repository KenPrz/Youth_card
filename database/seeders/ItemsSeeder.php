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
        $commodities = [
            ['item_name' => '2 pcs Pancit Canton', 'item_description' => 'Description for Pancit Canton', 'required_points' => 30, 'quantity' => 1, 'image' => null],
            ['item_name' => 'Educational Supplies', 'item_description' => 'Description for Educational Supplies', 'required_points' => 50, 'quantity' => 1, 'image' =>null],
            ['item_name' => '1 kilo Rice', 'item_description' => 'Description for 1 kilo Rice', 'required_points' => 100, 'quantity' => 1, 'image' => null],
            ['item_name' => '50 pesos load', 'item_description' => 'Description for 50 pesos load', 'required_points' => 125, 'quantity' => 1, 'image' => null],
            ['item_name' => '1.5L Softdrink', 'item_description' => 'Description for 1.5L Softdrink', 'required_points' => 150, 'quantity' => 1, 'image' => null],
            ['item_name' => '100 pesos GCASH', 'item_description' => 'Description for 100 pesos GCASH', 'required_points' => 200, 'quantity' => 1, 'image' => null],
            ['item_name' => '1 whole Chicken', 'item_description' => 'Description for 1 whole Chicken', 'required_points' => 250, 'quantity' => 1, 'image' => null],
        ];

        foreach ($commodities as $commodityData) {
            Commodity::create($commodityData);
        }
    }
}
