var map="";
var creator ="";
$(function(){//funcion que se ejecuta aL cargar el DOM
  cargarMapa();

});

function cargarMapa() {
  //establece las opciones y crea el mapa
	var mapOptions = {
		center: new google.maps.LatLng(13.7004458,-88.9004982),//Coordenadas de San Cristobal
		zoom: 16,
    mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
    
  //EVENTO CLICK
  google.maps.event.addListener(map,'click',function(e){
    //poner marcador
    ponerMarcador(e.latLng,map);
    
  });
  
}

function ponerMarcador(position,map){
  var icono="../img/icon-neg.png";
  var marker = new google.maps.Marker({
    position: position,
    map: map,
    icon:icono
  });
  //map.panTo(position);//centra el mapa de acuerdo al marcador puesto
}

function addP(){
  creator = new PolygonCreator(map);
}
function remP(){
  creator.destroy();
}