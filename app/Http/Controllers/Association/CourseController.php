<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Course;
use App\Models\CourseRequest;
use App\Models\LessonAttendance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\CourseBeneficiariesImport;
use App\imports\CourseBeneficiariesValidator;
use App\Models\Association;
use Illuminate\Support\Facades\Auth;
use Alert;


class CourseController extends Controller
{

    public function addCourse()
    {

        $courses = Course::where('avaliable', true)->get();


        return view('associations.add_courses', compact('courses'));

    }

    public function enroll(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
            'course_id' => 'required|exists:courses,id',
        ]);

        $validator = new CourseBeneficiariesValidator();
        Excel::import($validator, $request->file('file'));

        if ($validator->errors->isNotEmpty()) {
            return back()
                ->withErrors($validator->errors)
                ->with('import_success_count', 0)
                ->withInput();
        }

        $association = Association::where('user_id', Auth::id())->first();
        $course_request = $association->requests()->updateOrCreate([
            'course_id' => $request->course_id,

        ], [
            'course_id' => $request->course_id,
            'status' => 'bending',
        ]);

        Excel::import(new CourseBeneficiariesImport($course_request), $request->file('file'));


        if ($request->hasFile('file')) {
            if (!$course_request->beneficiar || $request->input('beneficiar') !== $course_request->beneficiar->file_name) {
                if ($course_request->beneficiar) {
                    $course_request->beneficiar->delete();
                }
                $course_request->addMedia($request->file('file'))->toMediaCollection('beneficiar');
            }
        } elseif ($course_request->beneficiar) {
            $course_request->beneficiar->delete();
        }

        Alert::success('تم بنجاح', 'تم اضافة طلب انضمام المستفدين للدورة بنجاح وفي انتظار الموافقة');

        return redirect()->route('association.courses.requests');
    }


    //

    public function requests()
    {
        $association = Association::where('user_id', Auth::id())->first();
        $requests = CourseRequest::where('association_id', $association->id)->get();

        return view('associations.requests', compact('requests'));

    }


    public function deleteRequest($id)
    {
        //حذف الغياب والمستفدين المرتبيطن بالطلب دا

        $request = CourseRequest::find($id)->first();
        $ids = $request->beneficiaries()->pluck('beneficiaries.id');
        LessonAttendance::whereIn('beneficiary_id',$ids)->delete();
        Beneficiary::whereIn('id',$ids)->delete();
        $request->delete();


        Alert::success('تم بنجاح', 'تم حذف طلب انضمام المستفدين للدورة بنجاح');


        return back();

    }

}
