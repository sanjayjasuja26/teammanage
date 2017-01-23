<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Redirect;


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
      return view('admin.manageuser.index',['users'=>User::where('role_id',1)->get()]);
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
         Session::put('currentUrl', url()->previous());

         Auth::loginUsingId($id);
         return redirect('user');
       }
         elseif(Session::has('superadminId')) {
           

           $id = Session::get('superadminId');
           $url=Session::get('currentUrl');

           Auth::logout();
           Auth::loginUsingId($id);
           Session::forget('currentUrl');

           Session::forget('superadminrollId');
           Session::forget('superadminId');
           return Redirect::to($url);
         }
    }

    public function create()
    {
      return view('admin.manageuser.create');
    }

}
