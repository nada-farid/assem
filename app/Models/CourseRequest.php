<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRequest extends Model
{
    public $table = 'course_requests';
    protected $fillable = [
        'association_id',
        'course_id',
        'status',
        'notes',
    ];

    public const STATUS_SELECT = [
        'pending' => 'قيد المراجعة',
        'approved' => 'تمت الموافقة',
        'refused' => 'تم الرفض',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
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

    public function pendingStudents()
    {
        return $this->hasMany(CourseStudent::class, 'course_request_id')->where('approved', false);
    }


}