<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Beneficiary;
use App\Models\Course;
use App\Models\CourseRequest;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
  //

  public function index()
  {
    $association = Association::where('user_id',Auth::id())->first();
    $ben_count = $association->beneficiars()->count();
    $courses_count = Course::count();
    $orders_count = CourseRequest::where('association_id',  $association->id)->count();

    return view('associations.index', compact('ben_count','courses_count','orders_count'));
  }
}
