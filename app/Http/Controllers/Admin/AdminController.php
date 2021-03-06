<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use Session;
use App\User;
use App\Employ;
use App\Employdocement;
use Redirect;
use File;


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
      $data['users']=User::where('id','!=',Auth::user()->id)->get();

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
        $data=User::find($id);

        if(!Session::has('superadminId')){
         Session::put('superadminrollId', Auth::user()->role_id);
         Session::put('superadminId', Auth::user()->id);
         Session::put('currentUrl', url()->previous());

         Auth::loginUsingId($id);
         if($data->role_id==2){
            return redirect('admin');
          }
          elseif($data->role_id==3){
            return redirect('employee');

          }
         else{
           return redirect('user');
         }
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
          $newregister=new User;
          $newregister->name=$request->name;
          $newregister->email=$request->email;
          $newregister->password=Hash::make($request->password);
          $newregister->role_id=$request->role_id;
          $newregister->active='1';
          $newregister->save();

           return redirect('/admin/manage');

    }
    public function getedit($id)
      {
        return view('admin.manageuser.updateuser',['users'=>User::where('id',$id)->first()]);
      }
    public function updateuser(Request $request)
    {
      $newregister=User::find($request->id);

      if($newregister->email != $request->email){
        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:users'

           ]);

            if ($validator->fails()) {
                       return redirect('/admin/manage/user/edit/'.$request->id)
                                   ->withErrors($validator)
                                   ->withInput();
             }
         }
             $validator = Validator::make($request->all(), [
             'name' => 'required',
             'password' => 'required|min:8',
             'confirm-password'=>'required|min:8|same:password',
             'role_id'=> 'required'
              ]);
               if ($validator->fails()) {

                      return redirect('/admin/manage/user/edit/{{$request->id}}')
                                  ->withErrors($validator)
                                  ->withInput();

                  }

        $newregister =User::firstOrCreate(array('id'=>$request->id));
        $newregister->name=$request->name;
        $newregister->email=$request->email;
        $newregister->password=Hash::make($request->password);
        $newregister->role_id=$request->role_id;
        $newregister->active='1';
        $newregister->save();
        return redirect('/admin/manage');
    }

    public function getprofile($id)
    {
      return view('admin.manageuser.viewprofile',['user'=>User::find($id)]);
    }




}
