// JavaScript Document
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;


      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

function testMarker(){
var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
var mapOptions = {
  zoom: 4,
  center: myLatlng
}

var marker = new google.maps.Marker({
    position: myLatlng,
    title:"Hello World!"
});

// To add the marker to the map, call setMap();
marker.setMap(map);
}
function addMarker(text, lat, lon){
	var myLatlng = new google.maps.LatLng(lat,lon);
	var mapOptions = {
  zoom: 4,
  center: myLatlng
}

var marker = new google.maps.Marker({
    position: myLatlng,
    title:text
});

// To add the marker to the map, call setMap();
marker.setMap(map);
}
function updateTest(userInfo, lat, lon){
	console.log("Marker added: " + userInfo + " lat: " + lat + " Lon: " + lon);
}
function updateLocations(){

	var arrayLength = locationsArray.length;
	for (var i = 0; i < arrayLength; i++) {
    var locKey = locationsArray[i].key;
	var lat = locationsArray[i].latitude;
	var lon = locationsArray[i].longitude;
	console.log(locationsArray[i]);
	console.log("key is: " + locKey);
	console.log("Lat: " + lat);
	console.log("Lon is " + lon);
	addMarker(locKey, lat, lon);
    //Do something
}
}
function testWriteFromModal(){
       var userInfo = document.getElementById('modalText').value;
       alert(userInfo);
		if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
			addMarker(userInfo, pos.lat, pos.lng);
			writeUserLocation(userInfo, pos.lat,pos.lng);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
				
        } 

	else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

}
