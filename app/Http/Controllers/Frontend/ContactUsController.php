<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreSubscribeRequest;
use App\Models\Contact;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Alert;

class ContactUsController extends Controller
{
    //

    public function contact(){
        return view('frontend.contact');
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        return response()->json();
    }
}
