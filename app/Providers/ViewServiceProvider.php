<?php

namespace App\Providers;


use App\Models\HawkamCategory;
use App\Models\MembershipType;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {  
        $hawkma_categories = HawkamCategory::all();
        View::share('hawkma_categories', $hawkma_categories);
    }
    
    public function register()
    {
        //
    }
}
