<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Gate;

class UpdateCenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('center_edit');
    }

    public function rules()
    {
        $centerId = $this->route('center')->id ?? null;

        return [
            'name' => [
                'string',
                'required',
            ],
            'specialization' => [
                'string',
                'required',
            ],
            'experience_years' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'beneficiar_count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'description' => [
                'required',
            ],
            'facebook_link' => [
                'string',
                'nullable',
            ],
            'twitter_link' => [
                'string',
                'nullable',
            ],
            'linked_in' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'nullable', // لا يُطلب إعادة رفعه عند التحديث
            ],
            'image' => [
                'nullable',
            ],
            'director_name' => [
                'required',
            ],
            'director_phone' => [
                'required',
                'regex:/^05[0-9]{8}$/',
            ],
            'director_email' => [
                'required',
                'email',
                Rule::unique('centers', 'director_email')->ignore($centerId),
            ],
            'coordinator_name' => [
                'required',
            ],
            'coordinator_phone' => [
                'required',
                'regex:/^05[0-9]{8}$/',
            ],
            'coordinator_email' => [
                'required',
                'email',
                Rule::unique('centers', 'coordinator_email')->ignore($centerId),
            ],
            'phone' => [
                'required',
                'regex:/^05[0-9]{8}$/',
                Rule::unique('centers', 'phone')->ignore($centerId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => __('global.Please upload an image with required dimensions'),
            'image.required' => __('global.Please upload inside image with required dimensions'),
         'coordinator_phone.regex' => 'رقم المنسق يجب أن يكون 10 أرقام ويبدأ ب 05',
        'coordinator_email.email' => 'البريد الإلكتروني غير صالح',
        'coordinator_email.required' => 'البريد الإلكتروني مطلوب',
        'coordinator_phone.regex' => 'رقم المنسق يجب أن يكون 10 أرقام ويبدأ ب 05',
        'coordinator_phone.required' => 'رقم المنسق مطلوب',
        'coordinator_name.required' => 'اسم المنسق مطلوب',
        'director_phone.regex' => 'رقم المدير يجب أن يكون 10 أرقام ويبدأ ب 05',
        'director_phone.required' => 'رقم المدير مطلوب',
        'director_email.email' => 'البريد الإلكتروني غير صالح',
        'director_email.unique' =>     ' بريد المسئول مأخوذ من قبل',
         'coordinator_email.unique' =>     ' بريد المنسق مأخوذ من قبل',
        'director_phone.regex' => '  رقم المدير يجب أن يكون 10 أرقام ويبدأ ب 05',
                'director_name.required' => 'اسم المسئول مطلوب',
         'director_email.required' => 'بريد المسئول مطلوب'
        ,'phone.regex' => 'رقم المركز يجب أن يكون 10 أرقام ويبدأ ب 05',
        'phone.required' => 'رقم المركز مطلوب',
        'phone.unique' => 'رقم المركز مستخدم من قبل',
        ];
    }
}
