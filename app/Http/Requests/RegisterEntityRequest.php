<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEntityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    $type = $this->input('entity_type');

    if ($type === 'association') {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'license_number' => 'required',
            'specialization' => 'required',
            'experience_years' => 'required',
            'end_date' => 'required|date',
            'director_name' => 'required',
            'director_phone' => 'required',
            'director_email' => 'required|email',
            'coordinator_name' => 'required',
            'coordinator_phone' => 'required|regex:/^05[0-9]{8}$/',
            'coordinator_email' => 'required|email',
        ];
    }

    if ($type === 'center') {
        return [
            'center_name' => 'required',
            'center_email' => 'required|email|unique:users,email',
            'center_password' => 'required|min:8',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'center_license_number' => 'required',
            'location' => 'required',
            'website' => 'required|url',
            'specialization' => 'required',
            'experience_years' => 'required',
            'end_date' => 'required|date',
            'director_name' => 'required',
            'director_phone' => 'required|regex:/^05[0-9]{8}$/',
            'director_email' => 'required|email',
            'coordinator_name' => 'required',
            'coordinator_phone' => 'required|regex:/^05[0-9]{8}$/',
            'coordinator_email' => 'required|email',
        ];
    }

    return []; 
}
public function messages()
{
    return [

        'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
        'logo.mimes' => 'الشعار يجب أن يكون من نوع jpeg, png, jpg, gif, svg',
        'coordinator_phone.regex' => 'رقم المنسق يجب أن يكون 10 أرقام ويبدأ ب 05',
        'coordinator_email.email' => 'البريد الإلكتروني غير صالح',
        'coordinator_email.required' => 'البريد الإلكتروني مطلوب',
        'coordinator_phone.regex' => 'رقم المنسق يجب أن يكون 10 أرقام ويبدأ ب 05',
        'coordinator_phone.required' => 'رقم المنسق مطلوب',
        'coordinator_name.required' => 'اسم المنسق مطلوب',
        'director_phone.regex' => 'رقم المدير يجب أن يكون 10 أرقام ويبدأ ب 05',
        'director_phone.required' => 'رقم المدير مطلوب',
        'director_email.email' => 'البريد الإلكتروني غير صالح',
        'director_phone.regex' => '  رقم المدير يجب أن يكون 10 أرقام ويبدأ ب 05',
        'center_password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
        'center_password.required' => 'كلمة المرور مطلوبة',
        'center_name.required' => 'اسم المركز مطلوب',
        'website.url' => 'الموقع الإلكتروني غير صالح',
    ];
}

}
