<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRequest extends Model
{
    protected $fillable = [
        'association_id',
        'course_id',
        'status',
        'notes',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class, 'course_id', 'course_id')
            ->where('association_id', $this->association_id);
    }
}
