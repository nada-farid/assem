<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\CourseRequest;
use App\Models\BeneficiaryEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Association;
use App\Models\Course;


class HomeController extends Controller
{
  public function index()
  {
    $association=  $assocation = Auth::check()
            ? Association::where('user_id', Auth::id())->first()
            : null;

    // أكثر الدورات طلبًا من قبل الجمعية
    $popularCourses = CourseRequest::select('course_id', DB::raw('count(*) as total'))
      ->where('association_id', $association->id)
      ->groupBy('course_id')
      ->with('course')
      ->orderByDesc('total')
      ->take(5)
      ->get();

    // الطلبات الشهرية الخاصة بالجمعية
    $monthlyRequests = CourseRequest::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('count(*) as total'))
      ->where('association_id', $association->id)
      ->groupBy('month')
      ->orderBy('month')
      ->get();

    $association = Association::where('user_id', Auth::id())->first();
    $ben_count = $association->beneficiars()->count();
    $courses_count = Course::count();
    $orders_count = CourseRequest::where('association_id', $association->id)->count();

    return view('associations.index', compact('ben_count', 'courses_count', 'orders_count', 'popularCourses',  'monthlyRequests'));

  }
}
