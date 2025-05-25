<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('courses')->get( );
        $courses = Course::where('avaliable',true)->latest()->paginate(6);

        $totalCoursesCount = Course::where('avaliable',true)->count();

        return view('frontend.courses', compact('courses', 'categories','totalCoursesCount'));
    }

    public function filter(Request $request)
    {
        $query = Course::where('avaliable',true);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $courses = $query->latest()->paginate(6);

        $view = view('frontend.partials.course_list', compact('courses'))->render();

        return response()->json(['html' => $view]);
    }

    public function show($id){
         $course  = Course::find($id);
        return view('frontend.course-details',compact('course'));
    }
}

