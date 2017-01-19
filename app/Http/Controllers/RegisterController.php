<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index');
    }

    public function store(Request $request)
    {
      echo "<pre>";print_r($request->all());die;
    }
}
