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
        $numberOfEvents = 5;
    
        // Generate random events
        for ($i = 0; $i < $numberOfEvents; $i++) {
            Event::create([
                'event_name' => $this->generateEventName(),
                'event_description' => $this->generateEventDescription(),
                'event_date' => fake()->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
                'start_time' => fake()->time('H:i:s'),
                'end_time' => fake()->time('H:i:s'),
                'event_level' => fake()->randomElement(['Barangay', 'City', 'Province', 'National']),
            ]);
        }
    
        // Generate specific events for today
        for ($i = 0; $i < 2; $i++) {
            Event::create([
                'event_name' => $this->generateEventName(),
                'event_description' => $this->generateEventDescription(),
                'event_date' => now()->format('Y-m-d'),
                'start_time' => fake()->time('H:i:s'),
                'end_time' => fake()->time('H:i:s'),
                'event_level' => fake()->randomElement(['Barangay', 'City', 'Province', 'National']),
            ]);
        }
    }
    
    /**
     * Generate a realistic SK event name.
     *
     * @return string
     */
    private function generateEventName(): string
    {
        $eventTypes = ['Seminar', 'Workshop', 'Community Outreach', 'Sports Fest', 'Cultural Night', 'Youth Forum'];
        $locations = ['Park', 'Community Center', 'School Gymnasium', 'Barangay Hall', 'Sports Complex'];
        
        return fake()->randomElement($eventTypes) . ' at ' . fake()->randomElement($locations);
    }
    
    /**
     * Generate a realistic SK event description.
     *
     * @return string
     */
    private function generateEventDescription(): string
    {
        $topics = ['Leadership Development', 'Environmental Awareness', 'Health and Wellness', 'Civic Engagement', 'Youth Empowerment'];
        $activities = ['interactive sessions', 'group discussions', 'demonstrations', 'competitions', 'cultural performances'];
    
        return 'Join us for an engaging ' . fake()->randomElement($topics) . ' event featuring ' . fake()->randomElement($activities) . '.';
    }
    
}
