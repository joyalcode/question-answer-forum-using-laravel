<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    public function showLoginForm(Request $request)
    {
        Session::forget('redirectPath');
        if($request->src)
        {
            Session::put('redirectPath', $request->src);
        }
        return view('auth.login');
    }    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public $redirectTo = '/questions';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated(Request $request, $user)
    {
        Session::flash('message', 'Welcome '.ucfirst($user->name).'. You have been successfully logged in.');
        return redirect()->intended($this->redirectPath());
    }    

    public function redirectPath()
    {
        if(Session::has('redirectPath'))
        {
            return Session::get('redirectPath');
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }    

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        Session::flash('message', 'You have been successfully logged out.');        
        return redirect('/questions');
    }
}
