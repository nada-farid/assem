<?php

namespace App\Http\Requests;

use App\Models\Curriculum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurriculumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('curriculum_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
