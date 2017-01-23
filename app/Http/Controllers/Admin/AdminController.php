<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
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

    public function store(Request $request)
    {
    
          $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:8',
          'confirm-password'=>'required|min:8|same:password',
          'role_id'=> 'required'
           ]);
          if ($validator->fails()) {
                     return redirect('/admin/manage/user/create')
                                 ->withErrors($validator)
                                 ->withInput();
                 }



          $newregister->name=$request->name;
          $newregister->email=$request->email;
          $newregister->password=Hash::make($request->password);
          $newregister->role_id=$request->role_id;
          $newregister->active='1';
          $newregister->save();

          return back();

    }
    public function getedit($id)
    {
      $data['users']=User::where('id',$id)->first();
      return view('admin.manageuser.create',$data);
    }

}
