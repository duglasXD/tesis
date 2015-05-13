$(function(){
	$('.selectpicker').selectpicker();

	$("#btnBusNeg").click(function(){
		if ($("#txtBusNeg").val()!="") {
			$("#cuerpo_neg").load("proc/proc_estcta_negocio.php",{tipoPer:$("#radTip:checked").val(),radBusNeg:$("#radBusNeg:checked").val(),txtBusNeg:$("#txtBusNeg").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
				if (textStatus=="success") {
					if (responseText=="") {
						alert("No encontrado");
					}
				};
			});

		}else{
			alert("Ingrese un parámetro de búsqueda");
		};
	});

	$("#btnGuardar").click(function(){
		$.ajax({
			type:"post",
			url: "proc/proc_estcta_negocio.php",
			data:{
				msj:"Notificacion de cobro",
				caso:2
			},
			success:function(responseText){
				alert(responseText);
			}
		});
	});
});

function cargaNeg(codper,codneg,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_estcta_negocio.php",
		data : {
			cod_con	: codper,
			cod_neg : codneg,
			tipoPer : tipoPer,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_neg").val(dataJson[i].cod_neg);
				$("#nombre").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				$("#cod_con").val(dataJson[i].cod_per);
				$("#nom_neg").val(dataJson[i].nom_neg);
				$("#dir_neg").val(dataJson[i].dir_neg);
				$("#med_neg").val(dataJson[i].med_neg);
				var f=new Date();
				x=f.getMonth();
				$("#mes_pag").prop('selectedIndex',x);
			}
			cargaImp(dataJson[0].cod_neg);
		}
	});
}

function cargaImp(codneg){
	$.ajax({
		type : "post",
		url : "proc/proc_estcta_negocio.php",
		data:{
			cod_neg:codneg,
			caso :3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			var m=new Array();
			for(var i in dataJson){
				m[i]=dataJson[i].cod_imp;
			}
			$('.selectpicker').selectpicker('val',m);
			calcularCobro(codneg);
		}
	});

}

function calcularCobro(codneg){
	$.ajax({
		type:"post",
		url: "proc/proc_estcta_negocio.php",
		data:{
			cod_neg:codneg,
			caso:4
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			var total=0;
			for(var i in dataJson){
				if(dataJson[i].tip_cob="Fijo"){
					if(dataJson[i].condonado=="f"){//no esta condonado se procesde a realizar el calculo como siempre
						total+=dataJson[i].cob_fij*dataJson[i].med_neg;
					}
				}
			}
			$("#total").val(total.toFixed(2));
		}
	});
}

function limpiarCampos(){
	$('.selectpicker').selectpicker("val",'');
}