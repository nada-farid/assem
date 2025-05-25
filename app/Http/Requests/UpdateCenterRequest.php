<?php

namespace App\Http\Requests;

use App\Models\Center;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('center_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'specialization' => [
                'string',
                'required',
            ],
            'experience_years' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'beneficiar_count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'description' => [
                'required',
            ],
            'facebook_link' => [
                'string',
                'nullable',
            ],
            'twitter_link' => [
                'string',
                'nullable',
            ],
            'linked_in' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'required',
            ],
            'image' => [
                'required',
            ],

        ];
    }

    public function messages()
    {
        return [
            'logo.required' => __('global.Please upload an image with required dimensions'),
            'image.required' => __('global.Please upload inside image with required dimensions'),
        ];
    }
}
