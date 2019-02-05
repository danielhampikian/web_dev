// JavaScript Document


//var userId = firebase.auth().currentUser.uid; //global var to track user by unique id
var locationsArray;

function testWrite(){
	this.writeUserData("this", "is", "a", "test");
}
//the plus userid insures, if userID is unique, that we will get a new user for each
function writeUserData(userId, name, email, imageUrl) {
  firebase.database().ref('users/' + userId).set({
    username: name,
    email: email,
    profile_picture : imageUrl
  });
}
function writeUserLocation(userInfo, lat, lon) {
  firebase.database().ref('locations/' + userInfo).set({
    latitude: lat,
    longitude: lon
  });
}
var locationsRef = firebase.database().ref('locations/');
locationsRef.on('value', function(snapshot) {
  snapshotToArray(snapshot);
  updateLocations();
});

//var locAddRef = firebase.database().ref('locations/');
//locAddRef.on('child_added', function(data) {
//  updateTest(data.userInfo.val(), data.lat.val(), data.lon.val());
//});

//commentsRef.on('child_changed', function(data) {
//  setCommentValues(postElement, data.key, data.val().text, data.val().author);
//});
//
//commentsRef.on('child_removed', function(data) {
//  deleteComment(postElement, data.key);
//});
function snapshotToArray(snapshot) {
    var returnArr = [];

    snapshot.forEach(function(childSnapshot) {
        var item = childSnapshot.val();
        item.key = childSnapshot.key;

        returnArr.push(item);
    });
	locationsArray = returnArr; //update our global array of locations
    return returnArr;
};
