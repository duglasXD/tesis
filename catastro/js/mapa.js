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
}

function ponerMarcador(position,map,icono){
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
function addN(){
  var icono="../img/icon-neg.png";
  google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
  });
}
function addI(){
  var icono="../img/icon-home.png";
  google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
  });
}
function addL(){
  var icono="../img/lamp-ok.png";
  google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
  });
}

function remP(){
  creator.destroy();//destruye todos los poligonos
}