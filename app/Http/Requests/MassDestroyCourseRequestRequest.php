<?php

namespace App\Http\Requests;

use App\Models\CourseRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_requests,id',
        ];
    }
}
