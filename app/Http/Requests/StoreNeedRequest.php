<?php

namespace App\Http\Requests;

use App\Models\Need;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNeedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('need_create');
    }

    public function rules()
    {
        return [
            'reason' => [
                'required',
            ],
        ];
    }
}
