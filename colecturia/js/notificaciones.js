$(document).ready(function(){
	cargar_push();
});

var timestamp = null;
function cargar_push(){ 
	$.ajax({
		async:	true, 
		type: "POST",
		url: "httpush.php",
		data: "&timestamp="+timestamp,
		dataType:"html",
		success: function(data){	
			var json    	   = eval("(" + data + ")");
			timestamp 		   = json.fec_hor;
			mensaje     	   = json.mensaje;
			id        		   = json.id_not;
			status      	   = json.status;
			if(timestamp == null)
			{
				
			}else{
				$.ajax({
					async:	true, 
					type: "POST",
					url: "proc/proc_notificaciones.php",
					data: "",
					dataType:"html",
					success: function(data){	
						html='';
						var dataJson=eval(data);
						for(var i in dataJson){
							html += "<li><a onclick='generaRecibo("+dataJson[i].id_not+")' target='centro'><i class='icon-envelope'></i> "+dataJson[i].mensaje+"</a></li>"
						}
						$('#divX').html(html);
						x=dataJson.length;
						$("#num_not").text(x);
						muestraAlerta(dataJson);
					}
				});	
			}
		setTimeout('cargar_push()',1000);
				
	}
	});		
}

function muestraAlerta(dataJson){
	for(var i in dataJson){
		PNotify.desktop.permission();
		(new PNotify({
			title:"Aviso",
			text: dataJson[i].mensaje+" Haga clic aquí para ver factura",
			type:"info",
			desktop:{
				desktop:true
			}
		})).get().click(function(e){
			if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer*, ui-pnotify-sticker*').is(e.target))return;
			alert("hiciste clic");
			generaRecibo(dataJson[i].id_not);
		});
	}
}

function generaRecibo(id_not){
	
}