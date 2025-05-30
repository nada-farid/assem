<?php
namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAlert;
use App\Models\Association;
use Alert;
use Auth;

class ProfileController extends Controller
{

    public function register(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'user_type' => 'association',
            'approved' => 0
        ]);
        $association = Association::create($request->all());
        $association->user_id = $user->id;
        $association->save();

        $alert = UserAlert::create([
            'alert_text' => " قمت جمعية جديدة بالتسجيل:  {$association->name}",
            'alert_link' => route('admin.associations.edit', $association->id),
        ]);

        $adminUsers = User::where('user_type', 'staff')->get();
        $alert->users()->sync($adminUsers->pluck('id')->toArray());

        Alert::success('اضافة بنجاح', ' تم تسجيل حسابك بنجاح وفي انتظار موافقة المشرف');

        return redirect()->route('frontend.home');
    }

    public function editProfile()
    {
        $association = Association::where('user_id', Auth::id())->first();
        return view('associations.edit-profile', compact('association'));
    }

    public function updateProfile(Request $request)
    {
        $association = Association::where('user_id', Auth::id())->first();

        $request->validate([

            'manager' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'bref' => 'required|string',
            'logo' => 'nullable|image|max:2048',
        ]);


        $association->name = $request->input('name');
        $association->manager = $request->input('manager');
        $association->phone = $request->input('phone');
        $association->bref = $request->input('bref');
        $association->address = $request->input('address') ?? $association->address;

        $association->save();


        if ($request->hasFile('logo')) {

            $association->clearMediaCollection('logo');

            $association->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        Alert::success('تم بنجاح', 'تم تحديث بيانات الجمعية بنجاح');

        return redirect()->back();
    }

}