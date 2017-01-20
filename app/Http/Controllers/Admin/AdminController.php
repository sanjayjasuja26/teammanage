<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
      if(!Auth::check())
      {
       return redirect('/');
      }
      else
      {
      return view('admin.index');
      }

    }
    public function manageuser()
    {
      $data['users']=User::where('role','user')->get();
      return view('admin.manageuser.index',$data);
    }
    public function getdelete($id)
    {
      User::find($id)->delete();
      return back();

    }
    public function getblock($id)
    {
      $user = User::firstOrCreate(array('id' =>$id));

     $user->active='0';
     $user->save();
     return back();
    }
    public function getunblock($id)
    {
        $user = User::firstOrCreate(array('id' =>$id));

       $user->active='1';
       $user->save();
       return back();
    }
}
