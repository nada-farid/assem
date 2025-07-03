<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'courses';

    protected $appends = [
        'photo',
        'inside_image',
        'video_background',
    ];

    protected $dates = [
        'start_at',
        'end_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'offline' => 'حضوري',
        'online'  => 'اون لاين',
        'blended' => 'حضوري / اون لاين',
    ];

    protected $fillable = [
        'description',
        'category_id',
        'title',
        'short_description',
        'center_id',
        'type',
        'trainer',
        'video_url',
        'duration',
        'duration_weekly',
        'avaliable',
        'start_at',
        'end_at',
        'goal_id',
        'assistant',
        'supporter_id',
        'support_value',
        'number_supported',
        'location',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function courseCourseRequests()
    {
        return $this->hasMany(CourseRequest::class, 'course_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function getInsideImageAttribute()
    {
        $file = $this->getMedia('inside_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getVideoBackgroundAttribute()
    {
        $file = $this->getMedia('video_background')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getStartAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }

    public function supporter()
    {
        return $this->belongsTo(Supporter::class, 'supporter_id');
    }
    public function chapters()
    {
        return $this->hasMany(Curriculum::class, 'course_id');
    }

    public function getCustomDateAttribute()
    {
        return $this->created_at->translatedFormat('F d, Y');
    }


    public function getStatusAttribute()
    {
        $today = now();
        if ($this->start_at > $today) {
            return 'new';
        } elseif ($this->start_at <= $today && $this->end_at >= $today) {
            return 'active';
        } elseif ($this->end_at < $today) {
            return 'past';
        }
    }

       public function courseCourseStudents()
    {
        return $this->hasMany(CourseStudent::class, 'course_id', 'id')->where('approved', true);
    }


}
