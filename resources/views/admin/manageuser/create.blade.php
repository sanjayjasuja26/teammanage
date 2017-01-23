@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Company Manage</strong></h2>

    </div>

</div>

<div class="row">
               <div class="col-lg-12">
                   <div class="ibox float-e-margins">

                       <div class="ibox-content">
                           <form method="POST" action="/admin/manage/user/store" class="form-horizontal">
                                 {{ csrf_field() }}
                                 @include('errors.error')
                                  <input type="hidden" name="id" class="form-control" value="{{isset($users)? $users->id :''}}" >
                                  <div class="form-group"><label class="col-sm-2 control-label">name</label>
                                     <div class="col-sm-10">
                                       <input type="text" name="name" class="form-control" value="{{isset($users)? $users->name :''}}" required="">
                                      </div>
                                   </div>
                                   <div class="hr-line-dashed"></div>
                                   <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                     <div class="col-sm-10">
                                       <input type="email"  name="email" class="form-control" value="{{isset($users)? $users->email :''}}" required="">
                                     </div>
                                   </div>
                                    <div class="hr-line-dashed"></div>
                                     <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                         <div class="col-sm-10">
                                           <input type="password" class="form-control" name="password" required="">
                                         </div>
                                     </div>
                                    <div class="hr-line-dashed"></div>
                                   <div class="form-group"><label class="col-sm-2 control-label">Confirm Password</label>
                                       <div class="col-sm-10">
                                         <input type="password" class="form-control" name="confirm-password" required="">
                                       </div>
                                   </div>
                                 <div class="form-group"><label class="col-sm-2 control-label">role</label>
                                     <div class="form-group">
                                       <select name="role_id">
                                         @foreach(App\Role::all() as $roles)
                                         <option value="{{$roles->id}}">{{$roles->role}}</option>
                                         @endforeach
                                       </select>
                                     </div>
                                </div>

                               <div class="hr-line-dashed"></div>
                               <div class="form-group">
                                   <div class="col-sm-4 col-sm-offset-2">
                                      <button class="btn btn-primary" type="submit">Create Account</button>
                                   </div>
                               </div>

                           </form>
                       </div>
                   </div>
               </div>
     </div>




@endsection
