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
      return redirect('admin');
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
