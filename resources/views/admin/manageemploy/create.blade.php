@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Create Employee</strong></h2>
    </div>
</div>
<div class="row">
               <div class="col-lg-12">
                   <div class="ibox float-e-margins">
                       <div class="ibox-content">
                           <form method="POST" action="/employee/store" class="form-horizontal" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                  @include('errors.error')
                                  <input type="hidden" name="id" value="{{isset($employs)? $employs->id :''}}">
                                   <div class="form-group"><label class="col-sm-2 control-label">Employ name</label>
                                     <div class="col-sm-10">
                                       <input type="text" name="name" class="form-control" value="{{isset($employs)? $employs->name :''}}" required="">
                                      </div>
                                   </div>
                                    <div class="hr-line-dashed"></div>
                                     <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                       <div class="col-sm-10">
                                         <input type="email"  name="email" class="form-control" value="{{isset($employs)? $employs->email :''}}" required="">
                                       </div>
                                     </div>
                                     <div class="hr-line-dashed"></div>
                                     <div class="form-group"><label class="col-sm-2 control-label">Phone no</label>
                                         <div class="col-sm-10">
                                           <input type="text" class="form-control" name="phone_no" value="{{isset($employs)? $employs->phone_no :''}}" required="">
                                         </div>
                                     </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-2 control-label">Dagination</label>
                                          <div class="form-group">
                                            <select name="dagination_id">
                                              @foreach(App\Dagination::all() as $daginations)
                                              <option value="{{$daginations->id}}"@if(isset($employs->dagination_id)&&$employs->dagination_id==$daginations->id) selected @endif>{{$daginations->dagination}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                     </div>
                                     <div class="form-group"><label class="col-sm-2 control-label">fileupload</label>
                                         <div class="form-group">
                                            <input type="file" name="fileupload" id="fileupload" >
                                         </div>
                                    </div>
                                     <div class="hr-line-dashed"></div>
                                    <div class="hr-line-dashed"></div>
                                     <div class="form-group">
                                         <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">Create Employ</button>
                                         </div>
                                     </div>
                           </form>
                       </div>
                   </div>
               </div>
     </div>




@endsection
