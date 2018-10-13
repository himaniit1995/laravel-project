<?php

namespace App\Http\Controllers;
Use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

use Illuminate\Http\Request;

class Userlogincontroller extends Controller
{	

   public function index()
   {
    if (Auth::attempt(array('email' => $request->email, 'password' => $request->password,'status' =>'1')))
      {
            return "User Is Valid ";

        }
        
        else{

            return "Wrong Credentials";
        }

        die;

}
	

}
