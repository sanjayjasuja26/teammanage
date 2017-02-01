@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Company Manage</strong></h2>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
              <div class="col-lg-6 col-lg-offset-3 ">
                <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h5>View User Profile</h5>
                  </div>
                  <div class="ibox-content">
                      <div class="table-responsive">
                          <div class="container-fluid">
                              <div class="row">
                                 <div class="col-sm-3" >
                                  <h4><strong>  Name:</strong></h4>
                                 </div>
                                  <div class="col-sm-9" >
                                    <span>{{$user->name}}</span>
                                  </div>
                              </div>
                          </div>
                           <br>
                           <hr>
                           <div class="container-fluid">
                               <div class="row">
                                  <div class="col-sm-3" >
                                   <h4><strong>  Email</strong></h4>
                                  </div>
                                   <div class="col-sm-9" >
                                     <span>{{$user->email}}</span>
                                   </div>
                               </div>
                           </div>
                           <br>
                         <hr>
                         <div class="container-fluid">
                             <div class="row">
                                <div class="col-sm-3" >
                                 <h4><strong>  Role</strong></h4>
                                </div>
                                 <div class="col-sm-9" >
                                   <span>{{$user->role->role}}</span>
                                 </div>
                             </div>
                         </div>
                      </div>
                  </div>
               </div>
              </div>
          </div>
  </div>
@endsection
