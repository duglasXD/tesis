function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(13.7004458,-88.9004982),
		zoom: 16,
    mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
  ///EVENTO
  google.maps.event.addListener(map,'click',function(e){
    placeMarker(e.latLng,map);
  });
}

function placeMarker(position,map){
  var marker = new google.maps.Marker({
    position: position,
    map: map
  });
  map.panTo(position);
}
//INICIA EL MAPA
google.maps.event.addDomListener(window,"load",initialize);











////////////MOSTRAR MAPA BASICO/////////////////
/*function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(13.7004458,-88.9004982),
    zoom: 16
  };
  var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
}
google.maps.event.addDomListener(window,"load",initialize);*/
///////////////////////////////////////////////////////