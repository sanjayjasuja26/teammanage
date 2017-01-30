@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Manage Employee</strong></h2>
    </div>
      <div   style="float:right;margin-top:20px">
        <a href="/employee/create" type="button" class="btn btn-primary">Create Employee</a>
      </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h5>Total Employ  {{$employs->count()}} </h5>
                  </div>
                  <div class="ibox-content">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone no</th>
                                  <th>Dagination</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($employs as $employ)
                                  <tr class="gradeX">
                                    <td>{{$employ->name}}</td>
                                    <td>{{$employ->email}}</td>
                                    <td>{{$employ->phone_no}}</td>
                                    <td>{{$employ->dagination->dagination}}</td>
                                    <td>
                                        <span><a href="/employee/delete/{{$employ->id}}" title="delete"><span class="glyphicon glyphicon-trash"  ></span></a></span>|
                                        <span><a href="/employee/edit/{{$employ->id}}" title="Edit"><span class="glyphicon glyphicon-edit" ></span></a></span>|
                                        <span><a href="/employee/viewprofile/{{$employ->id}}" title="Viewprofile"><span class="fa fa-user" ></span></a></span>|
                                        <span><a href="/employee/uploadfiles/{{$employ->id}}" title="file Upload"><span class="fa fa-picture-o" ></span></a></span>
                                    </td>
                                  </tr>
                             @endforeach
                        </tbody>
                        </table>
                      </div>
                  </div>
               </div>
              </div>
          </div>
  </div>


@endsection
