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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(app()->environment('production')){
            $request->validate([
                'g-recaptcha-response' => 'required|captcha',
            ]);
        }

        if(app()->environment('production') && !$request->has('g-recaptcha-response')){
            return redirect()->back()->with('error', 'يرجى التحقق من أنك لست روبوت.');
        }

        return $this->authenticated($request, $this->guard()->attempt($request->only('email', 'password'), $request->filled('remember')));
        
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
        elseif ($user->user_type == 'center') {
            return redirect()->route('center.home');
        }
    
        return redirect('/home');
    }
}


