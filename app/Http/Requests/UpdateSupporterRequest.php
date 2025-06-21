<?php

namespace App\Http\Requests;

use App\Models\Supporter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupporterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supporter_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:supporters,phone,' . request()->route('supporter')->id,
            ],
            'email' => [
                'required',
                'unique:supporters,email,' . request()->route('supporter')->id,
            ],
            'official_name' => [
                'string',
                'nullable',
            ],
            'official_phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
