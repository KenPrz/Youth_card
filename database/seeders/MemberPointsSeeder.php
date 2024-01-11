<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\MemberPoints;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOFMembers = Member::count();

        for ($i = 1; $i <= $numberOFMembers; $i++) {
            MemberPoints::create([
                'member_id' => $i,
                'points' => rand(0, 200),
            ]);
        }
    }
}
