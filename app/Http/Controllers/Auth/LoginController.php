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
    use AuthenticatesUsers;

    /**
     *
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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

      
        if (app()->environment('production')) {
            $request->validate([
                'g-recaptcha-response' => 'required|captcha',
            ]);
        }


        if (Auth::attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->filled('remember') 
        )) {
            return redirect()->intended($this->redirectPath());
        }
        


        return redirect()->back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ])->withInput($request->only('email'));
    }


    protected function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            Alert::warning('يجب تفعيل بريدك الإلكتروني قبل تسجيل الدخول.');
            return redirect()->route('verification.notice');
        }
        
 
        if (!$user->approved) {
            Auth::logout();
            Alert::error('حسابك قيد المراجعة، يُرجى التواصل مع الدعم.');
            return redirect()->back();
        }

       
        if ($user->user_type == 'staff') {
            return redirect()->route('admin.home');
        } elseif ($user->user_type == 'association') {
            return redirect()->route('association.home');
        } elseif ($user->user_type == 'center') {
            return redirect()->route('center.home');
        }


        return redirect('/home');
    }
}
