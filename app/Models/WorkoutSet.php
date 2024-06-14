<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_detail_id',
        'set_number',
        'reps',
        'weight',
        'note'
    ];
}
