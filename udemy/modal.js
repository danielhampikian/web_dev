var modal = document.getElementById('myModal');
var btn = document.getElementById('modalOpen');
var span = document.getElementsByClassName('close')[0];

btn.onclick = function(){
    modal.style.display = "block";
}

span.onclick = function(){
    modal.style.display = "none";
}

window.onclick = function(event) {
    if(event.target == modal) {
        modal.style.display = "none";
    }
}

function testWriteFromModal() {
    var userInfo = document.getElementById('modalText').value;
    alert("adding location with content: " + userInfo + " please allow your browser to use your location data when prompted");
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found, adding conent: ' + userInfo );
            infoWindow.open(map);
            map.setCenter(pos);
            addMarker(userInfo, pos);
            modal.style.display = "none";
        },
    function() {
        handleLocationError(true, infoWindow, map.getCenter());
    });
    }
    else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
}