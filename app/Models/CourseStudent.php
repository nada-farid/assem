<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseStudent extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'course_students';

    public const REGISTERED_RADIO = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public const CERTIFICATE_RADIO = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'identity_num',
        'phone_number',
        'date_of_birth',
        'registered',
        'certificate',
        'description',
        'relevance',
        'relevance_identity',
        'attend_course',
        'courses_before', 
        'transportaion',
        'prev_exper',
        'address',
        'request_certificate',
        'email_certificate',
        'course_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function attendance(){
        return $this->hasMany(CourseAttendance::class,'course_student_id');
    }
}
