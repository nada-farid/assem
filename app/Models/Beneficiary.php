<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    public $table = 'beneficiaries';

    protected $dates = [
        'birth_date',
        'marital_state_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const Gender = [
        'male' => 'ذكر',
        'female' => 'أنثي',
    ];

    protected $fillable = [
        'birth_date',
        'identity_number',
        'gender',
        'user_id',
        'association_id',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMaritalStateDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMaritalStateDateAttribute($value)
    {
        $this->attributes['marital_state_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function courseRequests()
    {
        return $this->belongsToMany(CourseRequest::class, 'course_request_beneficiary')
            ->withTimestamps();
    }

    public function attendances()
    {
        return $this->hasMany(LessonAttendance::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    }


