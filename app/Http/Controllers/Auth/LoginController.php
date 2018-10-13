<?php

namespace App\Http\Controllers\Auth;
use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

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
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    protected function authenticated (Request $request , $user)

    {   
    
        
        if(Auth::user()->status == '0'){
            
            Auth::logout();
            
            return redirect('/');
       
    }

     return next($request);
}

}