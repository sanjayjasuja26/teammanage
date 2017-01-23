@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Company Manage</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin"> Home</a>
            </li>
            <li>
                <a href="#">  <strong>Edit Account</strong></a>
            </li>


        </ol>
    </div>

</div>

<div class="row">
               <div class="col-lg-12">
                   <div class="ibox float-e-margins">

                       <div class="ibox-content">
                           <form method="POST" action="/register/create" class="form-horizontal">
                               @include('errors.error')
                                 {{ csrf_field() }}
                               <div class="form-group"><label class="col-sm-2 control-label">name</label>

                                   <div class="col-sm-10">
                                     <input type="text" name="name" class="form-control" required="">
                                    </div>
                                  </div>
                               <div class="hr-line-dashed"></div>
                               <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                   <div class="col-sm-10">
                                     <input type="email"  name="email" class="form-control" required="">
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
       </div>



@endsection
