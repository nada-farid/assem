<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\CourseRequest;
use App\Models\LessonAttendance;
use Illuminate\Support\Facades\Auth;

class AssociationReportController extends Controller
{
    /**
     * عرض قائمة تقارير الجمعية المعتمدة مع ملخصات مرئية.
     */
    public function index()
    {
        // الحصول على الجمعية التابعة للمستخدم الحالي
        $association = Association::where('user_id', Auth::id())->firstOrFail();

        // جلب طلبات الدورات المعتمدة مع المستفيدين والدورات والفصول
        $requests = CourseRequest::where('association_id', $association->id)
            ->where('status', 'approved')
            ->with(['students', 'course.chapters'])
            ->get();

        $chartData = [];

        // تجهيز بيانات الرسم البياني لكل دورة
        foreach ($requests as $request) {
            $studentIds = $request->students->pluck('id');

            $totalAttended = $request->students()->whereHas('attendance', function ($query) use ($request) {
                $query->where('course_id', $request->course_id);
            })->count();


            $totalMissed = $request->students()->whereDoesntHave('attendance', function ($query) use ($request) {
                $query->where('course_id', $request->course_id);
            })->count();



            $attendancePercentage = $request->students->count() > 0
                ? round(($totalAttended / $request->students->count()) * 100, 2)
                : 0;

            $chartData[] = [
                'course_title'         => $request->course->title,
                'total_students'  => $request->students->count(),
                'attendance_percentage'=> $attendancePercentage,
                'total_attended'       => $totalAttended,
                'total_missed'         => $totalMissed,
            ];
        }

        return view('associations.reports.index', compact('requests', 'chartData'));
    }

    /**
     * عرض تقرير تفصيلي لدورة محددة حسب طلب الجمعية.
     */
    public function report($id)
    {
        // التحقق من وجود طلب الدورة
        $courseRequest = CourseRequest::with(['students', 'course.chapters'])->findOrFail($id);

    
        $studentIds = $courseRequest->students->pluck('id');


        $totalAttended = $courseRequest->students()->whereHas('attendance', function ($query) use ($courseRequest) {
            $query->where('course_id', $courseRequest->course_id);
        })->count();
        $totalMissed   = $courseRequest->students()->whereDoesntHave('attendance', function ($query) use ($courseRequest) {
            $query->where('course_id', $courseRequest->course_id);
        })->count();


        $attendancePercentage = $courseRequest->students->count() > 0
        ? round(($totalAttended / $courseRequest->students->count()) * 100, 2)
        : 0;


        return view('associations.reports.show', compact(
            'courseRequest',
            'totalAttended',
            'totalMissed',
            'attendancePercentage'
        ));
    }
}
