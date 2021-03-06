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

class EmployeeController extends Controller
{
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
          'dagination_id'=> 'required',
          'lat'=>'required',
          'lng'=>'required'

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
          $employ->lat=$request->lat;
          $employ->lng=$request->lng;


          $employ->latLng=$request->latLng;
          $employ->route=$request->route;
          $employ->locality=$request->locality;
          $employ->administrative_area_level_2=$request->administrative_area_level_2;
          $employ->administrative_area_level_1=$request->administrative_area_level_1;
          $employ->country=$request->country;
          $employ->postal_code=$request->postal_code;
          $employ->address=$request->address;
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
                     return back()
                                 ->withErrors($validator)
                                 ->withInput();
           }
          }

          $validator = Validator::make($request->all(), [
          'name' => 'required',
          'phone_no'=>'required|numeric',
          'dagination_id'=> 'required',
          'lat'=>'required',
          'lng'=>'required'
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
          $employ->lat=$request->lat;
          $employ->lng=$request->lng;
          $employ->dagination_id=$request->dagination_id;

          $employ->latLng=$request->latLng;
          $employ->route=$request->route;
          $employ->locality=$request->locality;
          $employ->administrative_area_level_2=$request->administrative_area_level_2;
          $employ->administrative_area_level_1=$request->administrative_area_level_1;
          $employ->country=$request->country;
          $employ->postal_code=$request->postal_code;
          $employ->address=$request->address;


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

      public function employeeaction(Request $request)
      {
        if($request->employ_id){
          foreach($request->employ_id as $employ)
              {
                Employ::find($employ)->delete();
              }
          }
      return back();


      }
      public function mapview()
      {
        return view('admin.manageemploy.maps');
      }

      public function mapview1()
      {
        return view('admin.manageemploy.maps1');

      }




}
