<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'short_description' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'photo' => [
                'required',
            ],
            'inside_image' => [
                'required',
            ],
            'description_2' => [
                'required',
            ],
            'views' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'video_url' => [
                'string',
                'nullable',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
