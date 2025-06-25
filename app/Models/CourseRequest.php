<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseRequest extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

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
        'rejected' => 'تم الرفض',
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
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

    
    public function approvedStudents()
    {
        return $this->hasMany(CourseStudent::class, 'course_request_id')->where('approved', true);
    }

    public function students()
    {
        return $this->hasMany(CourseStudent::class, 'course_request_id');
    }


    public function getBeneficiarAttribute()
    {
        return $this->getMedia('beneficiar')->last();
    }
}