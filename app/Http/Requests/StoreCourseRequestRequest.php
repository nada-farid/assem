<?php

namespace App\Http\Requests;

use App\Models\CourseRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_request_create');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'association_id' => [
                'required',
                'integer',
            ],
            'beneficiar' => [
                'required',
            ],
        ];
    }
}
