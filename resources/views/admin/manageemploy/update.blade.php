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
                           <form method="POST" action="/employee/update" class="form-horizontal" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                  @include('errors.error')
                                  <input type="hidden" name="id" value="{{$employs->id}}">
                                   <div class="form-group"><label class="col-sm-2 control-label">Employ name</label>
                                     <div class="col-sm-10">
                                       <input type="text" name="name" class="form-control" value="{{old('name',$employs->name)}}" required="">
                                      </div>
                                   </div>
                                    <div class="hr-line-dashed"></div>
                                     <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                       <div class="col-sm-10">
                                         <input type="email"  name="email" class="form-control" value="{{old('email',$employs->email)}}" required="">
                                       </div>
                                     </div>
                                     <div class="hr-line-dashed"></div>
                                     <div class="form-group"><label class="col-sm-2 control-label">Phone no</label>
                                         <div class="col-sm-10">
                                           <input type="text" class="form-control" name="phone_no" value="{{old('phone_no',$employs->phone_no)}}" required="">
                                         </div>
                                     </div>
                                   <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Location Lap</label>
                                      <div class="col-sm-10">
                                           <input type="text" class="form-control" name="lat" id="lat" value="{{old('lat',$employs->lat)}}" >
                                        </div>
                                     </div>
                                   <div class="hr-line-dashed"></div>
                                   <div class="form-group"><label class="col-sm-2 control-label">Location Lng</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" name="lng" id="lng" value="{{old('lng',$employs->lng)}}" >
                                       </div>
                                   </div>
                                   <div class="hr-line-dashed"></div>
                                   <div class="form-group"><label class="col-sm-2 control-label">LatLng</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" name="latLng" id="latLng" value="{{old('latLng',$employs->latLng)}}" >
                                       </div>
                                   </div>


                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">Route</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" name="route" id="route" value="{{old('route',$employs->route)}}" >
                                     </div>
                                 </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">locality</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" name="locality" id="locality" value="{{old('locality',$employs->locality)}}" >
                                     </div>
                                 </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">District</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" name="administrative_area_level_2" id="administrative_area_level_2" value="{{old('administrative_area_level_2',$employs->administrative_area_level_2)}}" >
                                     </div>
                                 </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">State</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" name="administrative_area_level_1" id="administrative_area_level_1" value="{{old('administrative_area_level_1',$employs->administrative_area_level_1)}}" >
                                     </div>
                                 </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">country</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" name="country" id="country" value="{{old('country',$employs->country)}}" >
                                     </div>
                                 </div>
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">Postal_code</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{old('postal_code',$employs->postal_code)}}" >
                                     </div>
                                 </div>
                                 <div class="hr-line-dashed"></div>
                                  <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                      <div class="col-sm-10">
                                         <input type="text" class="form-control" name="address" id="address" value="{{old('postal_code',$employs->address)}}" >
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
                                  <div class="hr-line-dashed"></div>
                                  <div class="form-group"><label class="col-sm-2 control-label">fileupload</label>
                                  <div class="form-group">
                                    {{$employs->employdocement->fileupload}}
                                     <input type="file" value="{{$employs->employdocement->fileupload}}" name="fileupload" id="fileupload" >
                                  </div>
                                </div>
                                    <div class="hr-line-dashed"></div>
                                     <div class="form-group">
                                         <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">Update Employ</button>
                                         </div>
                                     </div>
                           </form>
                       </div>
                   </div>
               </div>
     </div>
     <input id="input" type="textbox" placeholder="Search Location">
     <input id="submit" type="button" value="Geocode">

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
              draggable:true,
              map: map
             });
           google.maps.event.addListener(marker, 'dragend', function(event){
             var latlng=event.latLng;
               geocoder.geocode({'location': latlng}, function(results, status) {
                 if(status==='OK'){

                   var components_by_address = {};
                  for (var i = 0; i < results[0].address_components.length; i++) {
                      var c =results[0].address_components[i];
                      components_by_address[c.types[0]] = c;
                  }
                  document.getElementById('postal_code').value=components_by_address["postal_code"].short_name;
                  document.getElementById('route').value=components_by_address["route"].long_name;
                  document.getElementById('country').value=components_by_address["country"].long_name;
                  document.getElementById('locality').value=components_by_address["locality"].long_name;

                  document.getElementById("administrative_area_level_1").value=components_by_address["administrative_area_level_1"].long_name;
                  document.getElementById("administrative_area_level_2").value=components_by_address["administrative_area_level_2"].long_name;

                  document.getElementById("lat").value = results[0].geometry.location.lat();
                  document.getElementById("lng").value = results[0].geometry.location.lng();
                  document.getElementById("latLng").value=results[0].geometry.location;
                  document.getElementById("address").value = results[0].formatted_address;
                 }
                 else{
                     alert('Geocode was not successful for the following reason: ' + status);
                 }
               });
             });
           google.maps.event.addListener(map, 'click', function(event) {
                var latlng=event.latLng;
                 geocoder.geocode(
                   {'location': latlng},
                   function(results, status) {
                     if(status==='OK'){
                       map.setCenter(results[0].geometry.location);
                       var marker = new google.maps.Marker({
                         map: map,
                         draggable:true,
                         position: results[0].geometry.location
                       });
                       var components_address = {};
                       for (var i = 0; i < results[0].address_components.length; i++) {
                           var data =results[0].address_components[i];
                           components_address[data.types[0]] = data;
                       }
                        document.getElementById("lat").value = results[0].geometry.location.lat();
                        document.getElementById("lng").value = results[0].geometry.location.lng();
                        document.getElementById("latLng").value=results[0].geometry.location;
                        document.getElementById("address").value=results[0].formatted_address;
                        document.getElementById("administrative_area_level_1").value=components_address["administrative_area_level_1"].long_name;
                        document.getElementById("administrative_area_level_2").value=components_address["administrative_area_level_2"].long_name;
                        document.getElementById('country').value=components_address["country"].long_name;
                        document.getElementById('locality').value=components_address["locality"].long_name;
                        document.getElementById('route').value=components_address["route"].long_name;
                        document.getElementById('postal_code').value=components_address["postal_code"].short_name;
                     }
                     else {
                       alert('Geocode was not successful for the following reason: ' + status);
                      }
                    });
                });
          document.getElementById('submit').addEventListener('click', function() {

        var address = document.getElementById('input').value;
        geocoder.geocode(
          {
            'address': address
          },
          function(results, status)
          {
            if(status==='OK'){
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                map: map,
                draggable:true,
                position: results[0].geometry.location
              });

              var components_address = {};
              for (var i = 0; i < results[0].address_components.length; i++) {
                  var data =results[0].address_components[i];
                  components_address[data.types[0]] = data;
              }
              document.getElementById("lat").value = results[0].geometry.location.lat();
              document.getElementById("lng").value = results[0].geometry.location.lng();
              document.getElementById("latLng").value=results[0].geometry.location;
              document.getElementById("address").value=results[0].formatted_address;
              document.getElementById("administrative_area_level_1").value=components_address["administrative_area_level_1"].long_name;
              document.getElementById("administrative_area_level_2").value=components_address["administrative_area_level_2"].long_name;
              document.getElementById('country').value=components_address["country"].long_name;
              document.getElementById('locality').value=components_address["locality"].long_name;
              document.getElementById('route').value=components_address["route"].long_name;
              document.getElementById('postal_code').value=components_address["postal_code"].short_name;
            }
            else{
              alert('some errors');
            }
          });

          });

      }
    </script>



    @endsection
