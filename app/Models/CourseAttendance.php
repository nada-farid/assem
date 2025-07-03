<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAttendance extends Model
{
    use  HasFactory;

    public $table = 'course_attendances'; 
    protected $dates = [
        'date',
        'created_at',
        'updated_at', 
    ];

    protected $fillable = [ 
        'course_id',
        'course_student_id',
        'date',
        'created_at',
        'updated_at', 
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    } 

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function student()
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }
}
