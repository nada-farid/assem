<?php

namespace App\Http\Controllers\Center;

use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\CourseRequest;
use App\Models\Course;
use App\Models\Association;
use Illuminate\Support\Facades\DB;
use App\Models\Center;

class HomeController
{
    public function index()
    {
        $today = now();

        $centerId = Center::where('user_id', Auth::id())->first()?->id;

        $courseCounts = [
            'new' => Course::where('center_id', $centerId)->where('start_at', '>', $today)->count(),
            'active' => Course::where('center_id', $centerId)->where('start_at', '<=', $today)->where('end_at', '>=', $today)->count(),
            'past' => Course::where('center_id', $centerId)->where('end_at', '<', $today)->count(),
        ];

        return view('center.home', compact(
            'courseCounts'
        ));
    }
}
