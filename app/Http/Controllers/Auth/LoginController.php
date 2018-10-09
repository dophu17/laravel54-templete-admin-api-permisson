<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Validator;
use Session;

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
    protected $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login() {
        if (request()->isMethod('post')) {
            $messages = [
                'email.required' => 'Vui lòng nhập email',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ];
            $validator = Validator::make(request()->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ], $messages);
            if ($validator->fails()) {
                return redirect('login')->withErrors($validator)->withInput();
            }

            if (Auth::attempt(['email' => request()->email, 'password' => request()->password])) {
                return redirect()->route('admin.home');
            }
            return redirect()->back()->with(['err', 'Đăng nhập thất bại']);
        }
        return view('auth.login');
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
