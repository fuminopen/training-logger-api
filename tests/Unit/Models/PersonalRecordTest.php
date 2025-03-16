<?php

namespace Tests\Unit\Models;

use App\Models\Exercise;
use App\Models\PersonalRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonalRecordTest extends TestCase
{
    use RefreshDatabase;

    public function test_personal_record_belongs_to_user()
    {
        $personalRecord = PersonalRecord::factory()->create();
        $this->assertInstanceOf(User::class, $personalRecord->user);
    }

    public function test_personal_record_belongs_to_exercise()
    {
        $personalRecord = PersonalRecord::factory()->create();
        $this->assertInstanceOf(Exercise::class, $personalRecord->exercise);
    }

    public function test_personal_record_has_correct_fillable_attributes()
    {
        $personalRecord = new PersonalRecord();
        $expectedFillable = [
            'user_id',
            'exercise_id',
            'value',
            'unit',
            'achieved_date',
            'notes',
        ];
        
        $this->assertEquals($expectedFillable, $personalRecord->getFillable());
    }

    public function test_date_is_cast_correctly()
    {
        $personalRecord = PersonalRecord::factory()->create([
            'achieved_date' => '2023-01-15'
        ]);
        
        $this->assertIsObject($personalRecord->achieved_date);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $personalRecord->achieved_date);
    }
}