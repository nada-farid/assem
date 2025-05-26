<?php

namespace App\Providers;


use App\Models\Association;
use App\Models\HawkamCategory;
use App\Models\MembershipType;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;



class ViewServiceProvider extends ServiceProvider
{
   public function boot()
{
    View::composer('*', function ($view) {
        $hawkma_categories = HawkamCategory::all();
        $assocation = Auth::check()
            ? Association::where('user_id', Auth::id())->first()
            : null;

        $view->with('hawkma_categories', $hawkma_categories);
        $view->with('assocation', $assocation);
    });
}



    public function register()
    {
        //
    }
}
