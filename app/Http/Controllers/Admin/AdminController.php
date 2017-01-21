<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
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
      $data['users']=User::where('role_id',1)->get();
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
    public function accessaccount($id)
    {
      if(!Session::has('superadminId')){
         Session::put('superadminrollId', Auth::user()->role_id);
         Session::put('superadminId', Auth::user()->id);

         Auth::loginUsingId($id);
       }
         elseif(Session::has('superadminId')) {

           $id = Session::get('superadminId');
           Auth::logout();
           Auth::loginUsingId($id);
           Session::forget('superadminrollId');
           Session::forget('superadminId');
         }



       return redirect('user');
    }

}
