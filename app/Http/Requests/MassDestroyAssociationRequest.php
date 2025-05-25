<?php

namespace App\Http\Requests;

use App\Models\Association;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssociationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('association_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:associations,id',
        ];
    }
}
