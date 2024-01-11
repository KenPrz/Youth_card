<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Carbon\Carbon;
class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfMembers = 500;

        for ($i = 0; $i < $numberOfMembers; $i++) {
            $randomBirthday = $this->generateRandomBirthday();

            Member::create([
                'name' => fake()->name,
                'gender' => fake()->randomElement(['Male','Female']),
                'age' => $this->calculateAge($randomBirthday),
                'birthday' => $randomBirthday,
                'email' => fake()->email,
                'contact_number' => $this->generateRandomPhoneNumber(),
                'purok' => rand(1, 5),
                'youth_classification' => fake()->randomElement(['In-School','Out-of-School']),
                'card_id' => fake()->randomNumber(9, true),
            ]);
        }
    }

    private function calculateAge($birthday)
    {
        return Carbon::parse($birthday)->age;
    }

    private function generateRandomBirthday()
    {
        return Carbon::now()->subYears(rand(18, 40))->subMonths(rand(0, 11))->subDays(rand(0, 30));
    }

        private function generateRandomPhoneNumber()
        {
            // Generate a random Philippine mobile number (Globe or Smart)
            $prefixes = ['0917', '0927', '0937', '0947', '0957', '0967', '0977', '0987'];
            $randomPrefix = $prefixes[array_rand($prefixes)];
            $randomNumber = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
    
            return $randomPrefix . $randomNumber;
        }
}
