<?php

namespace App\Http\Requests;

use App\Models\Banq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBanqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banq_create');
    }

    public function rules()
    {
        return [
            'bank_name' => [
                'string',
                'required',
            ],
            'bank_number' => [
                'string',
                'required',
            ],
            'iban' => [
                'string',
                'required',
            ],
        ];
    }
}
