<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_edit');
    }

    public function rules()
    {
        return [
            'start_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'description' => [
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'center_id' => [
                'required',
                'integer',
            ],
            'trainer' => [
                'string',
                'nullable',
            ],
            'video_url' => [
                'string',
                'required',
            ],
            'duration' => [
                'string',
                'required',
            ],
            'duration_weekly' => [
                'string',
                'required',
            ],
            'beneficiary_count' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'goals' => [
                'required',
            ],
            'video_background' => [
                'required',
            ],
            'photo' => [
                'required',
            ],
            'inside_image' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'photo.required' => __('global.Please upload an image with required dimensions'),
            'inside_imagep.required' => __('global.Please upload inside image with required dimensions'),
        ];
    }
}
