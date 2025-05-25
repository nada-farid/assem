<?php

namespace App\Http\Requests;

use App\Models\Slider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slider_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'sub_title' => [
                'string',
                'nullable',
            ],
        ];
    }
     public function messages()
    {
        return [
            'image.required' => __('global.Please upload an image with required dimensions'),
        ];
    }
}
