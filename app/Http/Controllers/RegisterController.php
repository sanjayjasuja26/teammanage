<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;


class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index');
    }

    public function store(Request $request)
    {
      echo "here";die;
      $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
      'confirm-password'=>'required|min:8|same:password'
]);
if ($validator->fails()) {
           return redirect('register')
                       ->withErrors($validator)
                       ->withInput();
       }

      $newregister=new User;
      $newregister->name=$request->name;
      $newregister->email=$request->email;
      $newregister->password=Hash::make($request->password);
      $newregister->role='user';
      $newregister->active='1';
      $newregister->save();
      return redirect('register');
    }
}
