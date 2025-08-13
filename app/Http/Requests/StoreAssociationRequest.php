<?php

namespace App\Http\Requests;

use App\Models\Association;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssociationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('association_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'manager' => [
                'string',
                'nullable',
            ],
            'license_number' => [
                'nullable',
            ],
            'beneficiaries_count' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'linked_in' => [
                'string',
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
              'unique:associations,director_email',
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
              'unique:associations,director_email',
            ],
        ];
    }
     public function messages()
    {
        return [
        'logo.required' => __('global.Please upload an image with required dimensions'),
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
        ,'phone.regex' => 'رقم الجمعية يجب أن يكون 10 أرقام ويبدأ ب 05',
        'phone.required' => 'رقم الجمعية مطلوب',
        'phone.unique' => 'رقم الجمعية مستخدم من قبل',
        ];
    }
}
