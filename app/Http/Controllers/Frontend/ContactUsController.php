<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreSubscribeRequest;
use App\Models\Contact;
use App\Models\Subscribe;
use App\Models\Banq;
use Illuminate\Http\Request;
use Alert;

class ContactUsController extends Controller
{
    //

    public function contact(){
        $banks = Banq::get();
        return view('frontend.contact',compact('banks'));
    }

    public function store(StoreContactRequest $request)
    {
       
        if(app()->environment('production')){
            $request->validate([
                'g-recaptcha-response' => 'required|captcha',
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'يرجى التحقق من أنك لست روبوت.'
            ]);
        }

        $contact = Contact::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'تم الحفظ بنجاح'
        ]);
    }
}
