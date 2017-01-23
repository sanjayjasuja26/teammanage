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
                <a href="#">  <strong>Manage User</strong></a>
            </li>

        </ol>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
              <div class="col-lg-12">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h5>Manage users data </h5>
                      <div class="ibox-tools">
                        <a href="/admin/manage/user/create" type="button" class="btn btn-primary">Create User</a>
                      </div>

                  </div>

                  <div class="ibox-content">

                      <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover dataTables-example" >
                  <thead>

                  <tr>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>date of join</th>
                      <th>role</th>
                      <th>Action</th>

                  </tr>

                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr class="gradeX">
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}
                      </td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->role->role}}</td>
                      <td class="center"> <span><a href="/admin/manage/user/delete{{$user->id}}">delete</a></span>|
                        <span><a href="/admin/manage/user/accessaccount/{{$user->id}}">Access Account</a></span>|
                        @if($user->active=='1')
                           <span><a href="/admin/manage/user/block{{$user->id}}">block</a></span>

                        @else
                             <span><a href="/admin/manage/user/unblock{{$user->id}}">un-block</a></span>

                        @endif


                      </td>
                  </tr>
                    @endforeach


                  </tbody>
                  <tfoot>
                  <tr>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>date of join</th>
                      <th>Role</th>
                      <th>Action</th>

                  </tr>
                  </tfoot>
                  </table>
                      </div>

                  </div>
              </div>
          </div>

@endsection
