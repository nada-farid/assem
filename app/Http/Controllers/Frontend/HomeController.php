<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Course;
use App\Models\Director;
use App\Models\Gallery;
use App\Models\Goal;
use App\Models\HawkamCategory;
use App\Models\Hawkma;
use App\Models\Need;
use App\Models\News;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Project;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\SaidAboutUs;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::all();
        $partners = Partner::all();
        $courses = Course::where('avaliable',true)->get();
        $centers = Center::all();
        return view('frontend.index', compact('sliders','partners','courses','centers'));
    }
  
    public function about()
    {
        $partners = Partner::all();
        $directors = Director::all();
        $goals =   Goal::all();
        return view('frontend.about',compact('partners','directors','goals'));
    }
    public function beneficars()
    {
        return view('frontend.beneficars');
    }
    public function structure()
    {
        return view('frontend.structure');
    }

    public function needs()
    {
        $needs  = Need::all();   
        return view('frontend.needs',compact('needs'));
    }

    public function programs()
    {
        $programs  = Program::all();   
        return view('frontend.programs',compact('programs'));
    }
    public function directors()
    {
        $directors = Director::all();
        return view('frontend.directors',compact('directors'));
    }
    
    public function hawkma(HawkamCategory $category)
    {
        $files = Hawkma::where('category_id',$category->id)->get();
        return view('frontend.hawkma',compact('files','category'));
    }
    public function reports($type)
    {
        $categories = ReportCategory::where('type',$type)->get();
        return view('frontend.reports',compact('categories','type'));
    }

    
    public function gallery()
    {
        $galleries = Gallery::get();
        return view('frontend.gallery',compact('galleries'));
    }

    public function cache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
      
            Artisan::call('storage:link');
    }
}
