@extends('layout.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Manage Employ</strong></h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
          <div class="row" >
              <div class="col-lg-6 col-lg-offset-3">
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
                                    <span>{{$employs->name}}</span>
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
                                  <span>{{$employs->email}}</span>
                                   <div class="col-sm-9" >
                                   </div>
                               </div>
                           </div>
                           <br>
                         <hr>
                         <div class="container-fluid">
                             <div class="row">
                                <div class="col-sm-3" >
                                 <h4><strong>  Phone No</strong></h4>
                                </div>
                                 <div class="col-sm-9" >
                                   <span>{{$employs->phone_no}}</span>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <hr>
                         <div class="container-fluid">
                             <div class="row">
                                <div class="col-sm-3" >
                                 <h4><strong> Designation</strong></h4>
                                </div>
                                 <div class="col-sm-9">
                                   <span>{{$employs->dagination->dagination}}</span>
                                 </div>
                             </div>
                         </div>
                         <hr>
                         <div class="container-fluid">
                             <div class="row">
                                <div class="col-sm-3" >
                                 <h4><strong> Designation</strong></h4>
                                </div>
                                 <div class="col-sm-9">
                                   <span>{{$employs->address}}</span>
                                 </div>
                             </div>
                         </div>

                      </div>
                  </div>
               </div>
              </div>
          </div>
  </div>

   <div id="map" ></div>


@endsection


@section('extrascript')

<script>


var lat = '{{$employs->lat}}';
var lng = '{{$employs->lng}}';


  function initMap() {

    var uluru = {lat:{{$employs->lat}}, lng: {{$employs->lng}}};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
      var geocoder = new google.maps.Geocoder();
    var marker = new google.maps.Marker({
          position: uluru,
        
          map: map
         });


  }
</script>



@endsection
