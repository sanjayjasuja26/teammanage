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
        elseif(Auth::user()->active=='0')
         {
           return redirect('/')->withInput()->with('success', 'You are blocked.');
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
      Auth::logout();
      return redirect('/');
    }
}
