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
              @if($employs->count()!=0)
                  <form method="post" action="/employee/action">
                      {{csrf_field()}}
                  <div class="ibox-title" style="margin-bottom:10px">
                      <h5>Total Employ  {{$employs->count()}} </h5>
                      <div class="deletecheckbox" style="margin-left:1000px">

                      <button class="btn btn-primary" name="button" value="delete" style="margin-bottm:10px">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                          Delete
                      </button>

                    </div>
                  </div>
                  <div class="ibox-content">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <thead>
                              <tr>
                                 <th><input class="chk_boxes"  type="checkbox" id="select_all"/></th>
                                 <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone no</th>
                                  <th>Designation</th>
                                  <th>lap</th>
                                  <th>lng</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($employs as $employ)
                                  <tr class="gradeX">
                                    <td><input type="checkbox" class="checkbox" name="employ_id[]" value="{{$employ->id}}" ></td>
                                    <td>{{$employ->name}}</td>
                                    <td>{{$employ->email}}</td>
                                    <td>{{$employ->phone_no}}</td>
                                    <td>{{$employ->dagination->dagination}}</td>
                                    <td>{{$employ->lat}}</td>
                                    <td>{{$employ->lng}}</td>
                                    <td>
                                        <span><a href="/employee/delete/{{$employ->id}}" title="delete"><span class="glyphicon glyphicon-trash"  ></span></a></span>|
                                        <span><a href="/employee/edit/{{$employ->id}}" title="Edit"><span class="glyphicon glyphicon-edit" ></span></a></span>|
                                        <span><a href="/employee/viewprofile/{{$employ->id}}" title="Viewprofile"><span class="fa fa-user" ></span></a></span>
                                    </td>
                                  </tr>
                             @endforeach

                        </tbody>
                        </table>
                      </div>
                  </div>
                </form>
            @else
            <div class="ibox-title">
                <h5>Total Employ  {{$employs->count()}} </h5>

            </div>
            <div class="wrapper wrapper-content">
                <div class="middle-box text-center animated fadeInRightBig">
                    <h3 class="font-bold">Employ list Empty</h3>
                </div>
            </div>
            @endif
               </div>
              </div>
          </div>
  </div>
@endsection

@section('extrascript')
<script>
$("#select_all").change(function(){  //"select all" change
    var status = this.checked; // "select all" checked status

      $('.checkbox').each(function(){ //iterate all listed checkbox items
          this.checked = status; //change ".checkbox" checked status
        });

      $(".checkbox").change(function(){
            if(this.checked==false)
              {
                $('#select_all')[0].checked=false;
              }
            if($('.checkbox:checked').length==$('.checkbox').length)
              {
                $('#select_all')[0].checked=true;
              }
        });

  });




</script> @endsection
