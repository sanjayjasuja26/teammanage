<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
      return view('login.index');
    }
    public function login(Request $request)
    {
      $this->validate($request, [
      'email' => 'email|required|exists:users'
      ]);
     if(Auth::attempt(['email' => $request->email, 'password' =>$request->password])){

       if(Auth::user()->role_id==2)
       {
         return redirect('admin');
       }
        elseif(Auth::user()->role_id==3)
         {
           return redirect('employee');
         }
         else {
           return redirect('user');
         }
    }
   else
      {
        return redirect('/');
      }
    }
    public function logout()
      {
        if(\Session::has('superadminId')) {
          \Session::forget('currentUrl');
          \Session::forget('superadminrollId');
          \Session::forget('superadminId');
        Auth::logout();
       }
        return redirect('/');
      }
}
