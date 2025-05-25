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
            ->with(['beneficiaries', 'course.chapters'])
            ->get();

        $chartData = [];

        // تجهيز بيانات الرسم البياني لكل دورة
        foreach ($requests as $request) {
            $totalLessons = $request->course->chapters->count();
            $beneficiaryIds = $request->beneficiaries->pluck('id');

            $totalAttended = LessonAttendance::whereIn('beneficiary_id', $beneficiaryIds)
                ->where('attended', 1)
                ->count();

            $totalMissed = LessonAttendance::whereIn('beneficiary_id', $beneficiaryIds)
                ->where('attended', 0)
                ->count();

            $possibleAttendances = $totalLessons * $request->beneficiaries->count();

            $attendancePercentage = $possibleAttendances > 0
                ? round(($totalAttended / $possibleAttendances) * 100, 2)
                : 0;

            $chartData[] = [
                'course_title'         => $request->course->title,
                'total_beneficiaries'  => $request->beneficiaries->count(),
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
        $courseRequest = CourseRequest::with(['beneficiaries', 'course.chapters'])->findOrFail($id);

        $chapterIds = $courseRequest->course->chapters->pluck('id');
        $totalLessons = $chapterIds->count();
        $beneficiaryIds = $courseRequest->beneficiaries->pluck('id');

        $query = LessonAttendance::whereIn('beneficiary_id', $beneficiaryIds)
            ->whereIn('curriculum_id', $chapterIds);

        $totalAttended = (clone $query)->where('attended', 1)->count();
        $totalMissed   = (clone $query)->where('attended', 0)->count();

        $possibleAttendances = $totalLessons * $courseRequest->beneficiaries->count();

        $overallAttendancePercentage = $possibleAttendances > 0
            ? round(($totalAttended / $possibleAttendances) * 100, 2)
            : 0;

        return view('associations.reports.show', compact(
            'courseRequest',
            'totalLessons',
            'totalAttended',
            'totalMissed',
            'overallAttendancePercentage'
        ));
    }
}
