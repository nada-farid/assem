<?php

namespace App\Http\Requests;

use App\Models\Beneficiary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'birth_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'identity_number' => [
                'string',
                'required',
            ],
            'marital_status' => [
                'required',
            ],
            'marital_state_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
