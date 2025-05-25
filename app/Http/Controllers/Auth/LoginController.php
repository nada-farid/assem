<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Alert;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
      protected function authenticated(Request $request, $user)
    { 
        if(!$user->approved){
            Alert::error('حسابك قيد المراجعه قم بالتواصل مع الدعم');
            Auth::logout();
            return redirect()->back();
        }
        
        if ($user->user_type == 'staff') {
            return redirect()->route('admin.home');
        } elseif ($user->user_type == 'association') {
            return redirect()->route('association.home');
        }
    
        return redirect('/home');
    }
}
