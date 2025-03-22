<?php

namespace App\Http\Requests\PersonalRecord;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'exercise_id' => 'required|exists:exercises,id',
            'weight' => 'required|numeric|min:0',
            'reps' => 'required|integer|min:1',
            'date' => 'required|date',
        ];
    }
}