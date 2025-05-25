<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Beneficiary;
use App\Models\Association;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function dashboard()
    {
        return view('admin.rep.dashboard');
    }
}