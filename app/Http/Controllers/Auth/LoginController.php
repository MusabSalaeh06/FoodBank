<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function logout(Request $request)
    {
        //member::where('remember_token', 'EZrkJ7Pph5BWNbbFmBw1KoGc5R7i5uYggbyySlq77HTzKrOjicRlERLqPtPv')->update(array('remember_token' => null));
        //$member = member::find(1);
        //dd($member);
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
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
        $this->middleware('guest:member')->except('logout');
    }
    public function login(Request $request){
        $this->validate($request, [
            'tel' => 'required',
            'password' => 'required'
        ]);
            if (Auth::guard('member')->attempt(['tel'=>$request->tel,'password'=>$request->password],
            //$request->get('remember')
            )){
                return redirect()->route('Dashboard');
            }
            else {
                return redirect()->route('login')->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง!');
            }      
    }
}
