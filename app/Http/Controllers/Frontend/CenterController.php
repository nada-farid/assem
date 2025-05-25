<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Center;


class CenterController extends Controller
{
   

    public function index()
    {
      $centers   = Center::all();
        return view('frontend.centers',compact('centers'));
    }

}
