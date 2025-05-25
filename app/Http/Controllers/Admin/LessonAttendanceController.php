<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseRequest;
use App\Models\LessonAttendance;
use App\Models\Curriculum;
use Illuminate\Http\Request;
class LessonAttendanceController
{
    public function index($lessonId)
    {
        $lesson = Curriculum::with(['course.chapters', 'attendances'])->findOrFail($lessonId);


        $courseRequest = CourseRequest::where('course_id', $lesson->course_id)->get()->last();

        if (!$courseRequest) {
            abort(404, 'لا يوجد طلب دورة مرتبط بهذا الدرس');
        }

        $beneficiaries = $courseRequest->beneficiaries;

        return view('admin.attendance.index', compact('lesson', 'beneficiaries'));
    }
    public function store(Request $request)
    {
        $lessonId = $request->input('lesson_id');
        $attendanceData = $request->input('attendance', []);

        foreach ($attendanceData as $beneficiaryId => $attended) {
            LessonAttendance::updateOrCreate(
                [
                    'curriculum_id' => $lessonId,
                    'beneficiary_id' => $beneficiaryId,
                ],
                [
                    'attended' => $attended,
                ]
            );
        }

        return redirect()->back()->with('success', 'تم تحديث الحضور بنجاح');
    }

}