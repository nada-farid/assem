<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseStudent;
use App\Models\CourseAttendance;
use Alert;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('courses')->get();
        $courses = Course::where('avaliable', true)->latest()->paginate(6);

        $totalCoursesCount = Course::where('avaliable', true)->count();

        return view('frontend.courses', compact('courses', 'categories', 'totalCoursesCount'));
    }

    public function filter(Request $request)
    {
        $query = Course::where('avaliable', true);

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

    public function show($id)
    {
        $course = Course::find($id);
        return view('frontend.course-details', compact('course'));
    }
    public function course_attend($id)
    {
        $course = Course::findOrFail(decrypt($id));
        return view('frontend.course_attend', compact('course'));
    }
    public function course_certificate($id)
    {
        $course = Course::findOrFail(decrypt($id));
        return view('frontend.course_certificate', compact('course'));
    }

    public function attend_store(Request $request)
    {
        $courseStudent = CourseStudent::where('course_id', $request->course_id)->where('identity_num', $request->identity_num)->first();
        if (!$courseStudent) {
            return redirect()->back()->withErrors([
                'errors' => [
                    'رقم الهوية' => 'انت غير مسجل في هذه الدورة'
                ]
            ]);
        }
        $courseAttendance = CourseAttendance::where('date', date('Y-m-d'))->where('course_id', $request->course_id)->where('course_student_id', $courseStudent->id)->first();
        if ($courseAttendance) {
            return redirect()->back()->withErrors([
                'errors' => [
                    'رقم الهوية ' => 'لقد قمت بتسجيل حضورك بالفعل في هذا اليوم لهذه الدورة'
                ]
            ]);
        } else {
            $courseAttendance = new CourseAttendance();
            $courseAttendance->course_id = $request->course_id;
            $courseAttendance->course_student_id = $courseStudent->id;
            $courseAttendance->date = date('Y-m-d');
            $courseAttendance->save();
        }

        alert('تم تسجيل حضورك بنجاح', '', 'success');
        return redirect()->back();
    }

    public function certificate_store(Request $request)
    {
        $courseStudent = CourseStudent::where('course_id', $request->course_id)->where('identity_num', $request->identity_num)->first();
        if (!$courseStudent) {
            return redirect()->back()->withErrors([
                'errors' => [
                    'رقم الهوية' => 'انت غير مسجل في هذه الدورة'
                ]
            ]);
        }
        $courseStudent->update(['request_certificate' => 1, 'email_certificate' => $request->email]);
        certificate_store($courseStudent->id);

        alert('تم طلب الشهادة بنجاح', 'وسيتم ارسالها في اقرب وقت', 'success');
        return redirect()->back();
    }
}

