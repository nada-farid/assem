<?php

namespace App\Http\Requests;

use App\Models\Curriculum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCurriculumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('curriculum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:curricula,id',
        ];
    }
}
