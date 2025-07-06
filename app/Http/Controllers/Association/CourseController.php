<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Course;
use App\Models\CourseRequest;
use App\Models\LessonAttendance;
use App\Models\UserAlert;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CourseStudent;
use App\Imports\CourseStudentsImport;
use App\Imports\CourseStudentValidator;
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

    // 1. تحقق من صحة البيانات داخل الملف
    $validator = new \App\Imports\CourseStudentValidator();
    \Maatwebsite\Excel\Facades\Excel::import($validator, $request->file('file'));

    if ($validator->errors->isNotEmpty()) {
        return back()
            ->withErrors($validator->errors)
            ->with('import_success_count', $validator->validRows->count())
            ->withInput();
    }

    $course = Course::findOrFail($request->course_id);
    $association = Association::where('user_id', Auth::id())->first();

  $course_request = CourseRequest::updateOrCreate(
    [
        'course_id' => $course->id,
        'association_id' => $association->id
    ],
    [
        'status' => 'pending'
    ]
);



    $allowedCount = $course->number_supported;
    $currentCount = CourseStudent::where('course_id', $course->id)->count();
    $imported = 0;

    foreach ($validator->validRows as $row) {
       
        if ($currentCount + $imported >= $allowedCount) break;

        try {
           
            
         CourseStudent::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'identity_num' => $row['identity_number'],
                'phone_number' => $row['phone'],
                'date_of_birth' => $row['birth_date'],
                'registered' => $row['registered'],
                'certificate' => $row['certificate'],
                'description' => $row['description'],
                'relevance' => $row['relevance_identity'],
                'attend_course' => 0,
                'courses_before' => $row['courses_before'],
                'transportaion' => $row['transportation'],
                'prev_exper' => $row['prev_exper'],
                'address' => $row['address'],
                'request_certificate' => $row['request_certificate'] ?? 0,
                'email_certificate' => $row['email_certificate'],
                'course_id' => $course->id,
                'association_id' => $association->id,
                'course_request_id' => $course_request->id,
            ]);
            
            $imported++;
        } catch (\Exception $e) {
            \Log::error("❌ خطأ أثناء حفظ المستفيد: " . $e->getMessage(), $row->toArray());
            dd($e);
        }
    }
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
 
    if ($imported === 0) {
        $course_request->delete();
        \Alert::warning('لم يتم استيراد أي مستفيد', 'عدد المستفيدين المسجلين في الدورة وصل للحد الأقصى المسموح.');
        return back();
    }


    $alert = UserAlert::create([
        'alert_text' => "طلب انضمام جديد لدورة {$course->title}",
        'alert_link' => route('admin.course-requests.show', $course_request->id),
    ]);
    $adminUsers = \App\Models\User::where('user_type', 'staff')->get();
    $alert->users()->sync($adminUsers->pluck('id')->toArray());


    \Alert::success('تم بنجاح', "تم استيراد $imported مستفيد بنجاح.");

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
  

        $request = CourseRequest::find($id)->first();
        $ids = $request->beneficiaries()->pluck('beneficiaries.id');
        LessonAttendance::whereIn('beneficiary_id', $ids)->delete();
        Beneficiary::whereIn('id', $ids)->delete();
        $request->delete();


        Alert::success('تم بنجاح', 'تم حذف طلب انضمام المستفدين للدورة بنجاح');


        return back();

    }

}
