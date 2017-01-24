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
                           <form method="POST" action="#" class="form-horizontal">
                                 {{ csrf_field() }}


                                  <div class="form-group"><label class="col-sm-2 control-label">Employ name</label>
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
                                     <div class="form-group"><label class="col-sm-2 control-label">Phone no</label>
                                         <div class="col-sm-10">
                                           <input type="text" class="form-control" name="phone_no" required="">
                                         </div>
                                     </div>
                                    <div class="hr-line-dashed"></div>

                              

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
