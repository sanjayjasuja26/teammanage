@extends('layout.default')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Manage Employee</strong></h2>
    </div>

</div>

<div class="row">
               <div class="col-lg-12">
                   <div class="ibox float-e-margins">
                       <div class="ibox-content">
                          <form method="POST" action="/employee/fileupload" class="form-horizontal" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                  <input type="hidden" name="employ_id" value="{{$ids}}">
                                  <input type="file" name="fileupload" id="fileupload">

                                    <div class="hr-line-dashed"></div>
                                     <div class="form-group">
                                         <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">Upload File</button>
                                         </div>
                                     </div>
                           </form>
                       </div>
                   </div>
               </div>
     </div>


@endsection
