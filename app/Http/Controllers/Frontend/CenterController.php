<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Center;


class CenterController extends Controller
{


  public function index()
  {
    $centers = Center::all();
    return view('frontend.centers', compact('centers'));
  }

  public function show($id)
  {
    $center = Center::find($id);
    return view('frontend.center-details', compact('center'));
  }

}
