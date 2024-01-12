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
                'event_name' => fake()->sentence(3),
                'event_description' => fake()->sentence(6),
                'event_date' => fake()->dateTimeBetween('-1 year', '+1 year'),
                'event_level' => fake()->randomElement(['Barangay','City','Province','National']),
            ]);
        }
        for ($i = 0; $i < 5 ; $i++) {

            Event::create([
                'event_name' => fake()->sentence(3),
                'event_description' => fake()->sentence(6),
                'event_date' => fake()->dateTimeBetween('-1 hour', '+1 hour'),
                'event_level' => fake()->randomElement(['Barangay','City','Province','National']),
            ]);
        }
    }
}
