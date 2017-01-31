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

          return back();

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


    public function manageemployee()
    {
     return view('admin.manageemploy.index',['employs'=>Employ::all()]);
    }

    public function employeecreate()
    {
      return view('admin.manageemploy.create');
    }

    public function employeestore(Request $request)
    {

        $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email||unique:employs',
        'phone_no'=>'required|numeric',
        'fileupload'=>'required',
        'dagination_id'=> 'required'
       ]);
          if ($validator->fails()) {
                     return redirect('/employee/create')
                                 ->withErrors($validator)
                                 ->withInput();
          }


          $employ= new Employ;
          $employ->name=$request->name;
          $employ->email=$request->email;
          $employ->phone_no=$request->phone_no;
          $employ->dagination_id=$request->dagination_id;
          $employ->save();

          if($request->hasfile('fileupload'))
          {
            $uploadfile=new Employdocement;
            $upload=$request->file('fileupload');
            $path='uploads';
            $uploadname=$upload->getClientOriginalName();
            $uploadfile->fileupload=$path.'/'.$uploadname;
            $uploadfile->employ_id=$employ->id;
            $upload->move($path,$uploadname);
            $uploadfile->save();
          }

          return redirect('/employee');
    }


    public function employeedelete($id)
    {
      Employ::find($id)->delete();
      return back();
    }

    public function employeeedit($id)
    {

      $data['employs']=Employ::find($id);

      return view('admin.manageemploy.update',$data);
    }

    public function employeeupdate(Request $request)
    {
      $data=Employ::find($request->id);
       if($data->email != $request->email){
        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:employs'
           ]);
            if ($validator->fails()) {
                       return redirect('/employee/update'.$request->id)
                                   ->withErrors($validator)
                                   ->withInput();
             }
         }

          $validator = Validator::make($request->all(), [
          'name' => 'required',
          'phone_no'=>'required|numeric',
          'dagination_id'=> 'required'
         ]);
           if ($validator->fails()) {
                      return redirect('/employee/update')
                               ->withErrors($validator)
                               ->withInput();
               }
   $employ= Employ::firstOrCreate(array('id'=>$request->id ));
        $employ->name=$request->name;
        $employ->email=$request->email;
        $employ->phone_no=$request->phone_no;
        $employ->dagination_id=$request->dagination_id;
        $employ->save();

        if($request->hasfile('fileupload'))
          {
            $uploadfile= Employdocement::firstOrCreate(array('employ_id'=>$request->id));
            $upload=$request->file('fileupload');
            $path='uploads';

            $uploadname=$upload->getClientOriginalName();
            $uploadfile->fileupload=$path.'/'.$uploadname;
            $uploadfile->employ_id=$employ->id;
            $upload->move($path,$uploadname);
            $uploadfile->save();
          }
          return redirect('/employee');
    }

    public function employeeview($id)
    {
      return view('admin.manageemploy.employview',['employs'=>Employ::find($id)]);
    }
    public function employeeuploadfiles($id)
    {
    return view('admin.manageemploy.uploadfiles',['ids'=>$id]);
    }
    public function employeefileupload(Request $request)
    {
      $uploadfile=new Employdocement;
      if($request->hasfile('fileupload'))
      {
        $upload=$request->file('fileupload');
        $path='uploads';
        $uploadname=$upload->getClientOriginalName();
        $uploadfile->fileupload=$path.'/'.$uploadname;
        $upload->move($path,$uploadname);
      }
    $uploadfile->employ_id=$request->employ_id;
    $uploadfile->save();
    return redirect('/employee');

    }

    public function employeeaction(Request $request)
    {

          foreach($request->employ_id as $employ)
          {
            Employ::find($employ)->delete();
          }
      return back();


    }

}
