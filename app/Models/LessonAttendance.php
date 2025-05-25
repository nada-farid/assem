<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiary_id',
        'curriculum_id',
        'attended',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
