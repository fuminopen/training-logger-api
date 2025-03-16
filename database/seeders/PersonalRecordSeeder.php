<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\PersonalRecord;
use App\Models\User;
use Illuminate\Database\Seeder;

class PersonalRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();
        $exercises = Exercise::take(3)->get();
        
        if ($exercises->isEmpty()) {
            $exercises = Exercise::factory(3)->create();
        }
        
        foreach ($exercises as $exercise) {
            // Create sample personal records with progressively improving performance
            PersonalRecord::factory()->count(5)->create([
                'user_id' => $user->id,
                'exercise_id' => $exercise->id,
                'achieved_date' => now()->subDays(rand(1, 180)),
            ]);
            
            // Create a current personal best
            PersonalRecord::factory()->create([
                'user_id' => $user->id,
                'exercise_id' => $exercise->id,
                'value' => rand(100, 200),
                'achieved_date' => now()->subDays(rand(0, 10)),
                'notes' => 'Current personal best!'
            ]);
        }
    }
}