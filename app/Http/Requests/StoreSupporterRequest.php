<?php

namespace App\Http\Requests;

use App\Models\Supporter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupporterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supporter_create');
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
                'unique:supporters,phone',
            ],
            'email' => [
                'required',
                'unique:supporters',
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
