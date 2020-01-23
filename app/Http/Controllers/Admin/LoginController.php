<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin/product';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'    => 'required|string',
            'password' => 'required|string',
            'captcha'  => 'required|captcha',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            dd(auth()->guard('admin')->user());

        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function refreshCaptcha(){
        return response()->json(['captcha' => 'captcha_img()']);
    }
}
