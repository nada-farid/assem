<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CourseRequest extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'course_requests';

    protected $appends = [
        'beneficiar',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'course_id',
        'association_id',
        'beneficiar_count',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'bending' => 'قيد المراجعة',
        'approved' => 'تمت الموافقة',
        'refused' => 'تم الرفض',
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

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function association()
    {
        return $this->belongsTo(Association::class, 'association_id');
    }

    public function getBeneficiarAttribute()
    {
        return $this->getMedia('beneficiar')->last();
    }

    public function beneficiaries()
    {
        return $this->belongsToMany(Beneficiary::class, 'course_request_beneficiary')
            ->withTimestamps();
    }

}
