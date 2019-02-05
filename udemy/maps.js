
var map, infoWindow;

function initMap() {
  var pos = {
    lat: -34.398,
    lng: 150.664
  }
  map = new google.maps.Map(document.getElementById('map'), {
    center: pos,
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  infoWindow = new google.maps.InfoWindow;

  addMarker('testing on load', pos);

}
function addMarker(text, pos) {
  //TODO: custom marker images
  var marker = new google.maps.Marker({
    position: pos,
    map: map
    //TODO: add icon:
  });
  var contentString = '<div class="info-window">' +
        '<h3>' + text + '</h3>' +
        '<div class="info-content">' +
        '<a href="https://www.danielhampikian.com"><img src="https://www.danielhampikian.com/images/cat.jpg" alt="HTML tutorial" style="width:30px;height:30px;border-radius: 50%; padding: 20px, 20px, 20px, 20px;"</a>' +
        '<p>' + text + '</p>' +
        '</div>' +
        '</div>';
        var infoWindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 400
        });
        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });
}
