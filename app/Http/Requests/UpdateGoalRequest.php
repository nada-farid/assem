<?php

namespace App\Http\Requests;

use App\Models\Goal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGoalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('goal_edit');
    }

    public function rules()
    {
        return [
            'description' => [
                'required',
            ],
        ];
    }
}
