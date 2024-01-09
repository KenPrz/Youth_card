<?php

namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfEvents = 30;

        for ($i = 0; $i < $numberOfEvents; $i++) {

            Event::create([
                'event_name' => fake()->sentence,
                'event_description' => fake()->paragraph,
                'event_date' => fake()->date,
                'event_level' => fake()->randomElement(['Barangay','City','Province','National']),
            ]);
        }
    }
}
