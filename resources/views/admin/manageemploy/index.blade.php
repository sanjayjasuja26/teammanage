@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Manage Employ</strong></h2>
    </div>
      <div   style="float:right;margin-top:20px">
        <a href="/admin/manage/employ/create" type="button" class="btn btn-primary">Create Employ</a>
      </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h5>Manage Employ data </h5>
                  </div>

                  <div class="ibox-content">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <thead>

                              <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone no</th>
                                  

                              </tr>

                              </thead>
                              <tbody>


                                  <tr class="gradeX">

                                  </tr>



                        </tbody>
                        </table>
                      </div>

                  </div>
               </div>
              </div>
          </div>
  </div>


@endsection
