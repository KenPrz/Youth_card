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
        $numberOfMembers = 200;

        for ($i = 0; $i < $numberOfMembers; $i++) {
            $randomBirthday = $this->generateRandomBirthday();

            Member::create([
                'name' => 'Member ' . ($i + 1),
                'gender' => 'Male',
                'age' => $this->calculateAge($randomBirthday),
                'birthday' => $randomBirthday,
                'email' => 'member' . ($i + 1) . '@example.com',
                'contact_number' => $this->generateRandomPhoneNumber(),
                'purok' => rand(1, 5),
                'youth_classification' => 'Youth',
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
