<!DOCTYPE html>
<html>
  <head>
    <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <input id="address" type="textbox" value="punjab, india">
      <input id="submit" type="button" value="Geocode">
      <input id="lat" type="text" >
      <input id="lng" type="text" >
      <input id="name" type="text" >
      <input id="latLng" type="text" >
      <input id="route" type="text" >
      <input id="locality" type="text">
      <inpit id="administrative_area_level_1" type="text">
      <input id="administrative_area_level_2" type="text">
      <input id="country" type="text" >
      <input id="postal_code" type="text" >
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var mymap = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();
        document.getElementById('submit').addEventListener('click', function() {
                  var address = document.getElementById('address').value;
                  geocoder.geocode(
                    {
                      'address': address
                    },
                    function(results, status)
                    {
                     console.log(results[0].geometry.location);
                    if (status === 'OK') {
                      mymap.setCenter(results[0].geometry.location);
                      var marker = new google.maps.Marker({
                        map: mymap,
                        draggable:true,
                        position: results[0].geometry.location
                      });
                      google.maps.event.addListener(marker, 'dragend', function(event){
                            var latlng=event.latLng;
                              geocoder.geocode({'location': latlng}, function(results, status) {
                              console.log(results[0].address_components);
                              var components_by_address = {};
                              for (var i = 0; i < results[0].address_components.length; i++) {
                                  var c =results[0].address_components[i];
                                  components_by_address[c.types[0]] = c;
                              }
                            document.getElementById('postal_code').value=components_by_address["postal_code"].short_name;
                            document.getElementById('route').value=components_by_address["route"].long_name;
                            document.getElementById('country').value=components_by_address["country"].long_name;
                            document.getElementById('locality').value=components_by_address["locality"].long_name;
                            document.getElementById('locality').value=components_by_address["locality"].long_name;
                            document.getElementById("administrative_area_level_1").value=components_by_address["administrative_area_level_1"].long_name;
                            document.getElementById("administrative_area_level_2").value=components_by_address["administrative_area_level_2"].long_name;
                            document.getElementById('name').value=results[0].address_components[0].long_name;
                            document.getElementById("lat").value = results[0].geometry.location.lat();
                            document.getElementById("lng").value = results[0].geometry.location.lat();
                            document.getElementById("latLng").value=results[0].geometry.location;
                        });
                      });

                    } else {
                      alert('Geocode was not successful for the following reason: ' + status);
                    }
                  });
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9OjIkc5WLaXix3tyqiEyW_G6-VoT3siw&callback=initMap">
    </script>
  </body>
</html>
