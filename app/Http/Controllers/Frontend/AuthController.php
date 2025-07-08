<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Association;
use App\Models\Center;
use App\Models\User;
use Alert;
use App\Http\Requests\RegisterEntityRequest;
use App\Models\UserAlert;

class AuthController extends Controller
{
    //

    public function login(){

        return view('frontend.login');
    }

    public function register(){

        return view('frontend.register');
    }

    public function store(RegisterEntityRequest $request)
    {
        $type = $request->input('entity_type');


        $adminUsers = User::where('user_type', 'staff')->get();
    

        if ($type === 'association') {

                $user = User::create([
                    'email' => $request->email,
                    'password' => $request->password,
                    'name' => $request->name,
                    'user_type' =>   $type,
                    'approved' => 0
                ]);
                
            $association = Association::create($request->all());
            $association->name = $request->name;
            $association->user_id = $user->id;
            $association->save();

            if ($request->hasFile('logo')) {
                $association->addMediaFromRequest('logo')->toMediaCollection('logo');
            }
            $alert = UserAlert::create([
                'alert_text' => " قمت جمعية جديدة بالتسجيل:  {$association->name}",
                'alert_link' => route('admin.associations.show', $association->id),
            ]);
    
            $alert->users()->sync($adminUsers->pluck('id')->toArray());

        } elseif ($type === 'center') {
        
            $user = User::create([
                'email' => $request->center_email,
                'password' => $request->center_password,
                'name' => $request->center_name,
                'user_type' =>   $type,
                'approved' => 0
            ]);
            $center = Center::create([
                'name' => $request->center_name,
                'location' => $request->location,
                'website' => $request->website,
                'license_number' => $request->center_license_number,
                'specialization' => $request->specialization,
                'experience_years' => $request->experience_years,
                'end_date' => $request->center_end_date,
                'director_name' => $request->center_director_name,
                'director_phone' => $request->center_director_phone,
                'director_email' => $request->center_director_email,
                'coordinator_name' => $request->center_coordinator_name,
                'coordinator_phone' => $request->center_coordinator_phone,
                'coordinator_email' => $request->center_coordinator_email,
                'description' => $request->description,
                'user_id' => $user->id,
                'facebook_link' => $request->center_facebook_link,
                'twitter_link' => $request->center_twitter_link,
                'linked_in' => $request->center_linked_in,
            ]);
    

            if ($request->hasFile('center_logo')) {
                $center->addMediaFromRequest('center_logo')->toMediaCollection('logo');
            }

            if ($request->hasFile('license_image')) {
                $center->addMediaFromRequest('license_image')->toMediaCollection('license_image');
            }
            $alert = UserAlert::create([
                'alert_text' => " قم مركز جديد بالتسجيل:  {$center->name}",
                'alert_link' => route('admin.centers.show', $center->id),
            ]);
    
            $alert->users()->sync($adminUsers->pluck('id')->toArray());
        }
        Alert::success('اضافة بنجاح', ' تم تسجيل حسابك بنجاح وفي انتظار موافقة المشرف');
        return redirect()->back();
    }
}
