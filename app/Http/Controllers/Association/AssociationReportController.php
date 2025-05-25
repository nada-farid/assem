<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\CourseRequest;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssociationReportController extends Controller
{
    public function dashboard()
    {
        $requests = CourseRequest::where('association_id', Auth::user()->association->id)->get();
        return view('association.reports.dashboard', compact('requests'));
    }

    public function course($id)
    {
        $request = CourseRequest::with('course', 'course.lessons', 'course.beneficiaries')->findOrFail($id);
        return view('association.reports.course', compact('request'));
    }

    public function beneficiary(Beneficiary $beneficiary)
    {
        return view('association.reports.beneficiary', compact('beneficiary'));
    }
}