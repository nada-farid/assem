<?php
namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAlert;
use App\Models\Association;
use Alert;

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
}