<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'body_part_id',
    ];

    public function bodyPart()
    {
        return $this->belongsTo(BodyPart::class);
    }

    public function personalRecords()
    {
        return $this->hasMany(PersonalRecord::class);
    }
}
