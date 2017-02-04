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
      <input id="address" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Geocode">
      <input id="lat" type="text" >
      <input id="lng" type="text" >
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
                                console.log(results[0].address_components[0]);
                      document.getElementById("lat").value = results[0].geometry.location.lat();
                     document.getElementById("lng").value = results[0].geometry.location.lng();
                    if (status === 'OK') {


                      mymap.setCenter(results[0].geometry.location);
                      var marker = new google.maps.Marker({

                        map: mymap,
                        draggable:true,
                        position: results[0].geometry.location


                      });

                      google.maps.event.addListener(marker, 'dragend', function(event){



                       document.getElementById("lat").value = this.getPosition().lat();
                      document.getElementById("lng").value = this.getPosition().lng();

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
