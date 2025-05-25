<?php

namespace App\Http\Requests;

use App\Models\Need;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNeedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('need_edit');
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
