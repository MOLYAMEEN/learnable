<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)//من خلالها انجيب البيانات عن طريق  الريكوست كلاس 
    {
       if (is_numeric($request ->get ('email')))
       {
        return ['mobile'=>$request->get('email'),'password'=> $request->get('password')];
       }
//عشان نتحقق في حاله البيانات  انها كانت ايميل او  يبدا يغير العمود من مبيايل  الى ايميل 
       else if (filter_var($request->get('email'),FILTER_VALIDATE_EMAIL))
       {
       return ['email'=>$request->get('email'),'password'=>$request->get('password')];
       }
//البيانات كلها لا هي ايميل ولا هي مبايل 
      // else  (filter_var($request->get('email'),FILTER_VALIDATE_EMAIL))
      // {
      // return ['name'=>$request->get('email'),'password'=>$request->get('password')];
      // }
       return $request->only ($request->email ,'password');
    }
}
