$(function(){
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_titulo_perpetuidad.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

	$("#nic_aut").change(function(){
		e1=document.getElementById("divfa1");
		e2=document.getElementById("divfa2");
		e3=document.getElementById("divfa3");
		e4=document.getElementById("divfa4");
		e5=document.getElementById("divfa5");
		if ($(this).val()=="0") {
			e1.style.display="none";
			e2.style.display="none";
			e3.style.display="none";
			e4.style.display="none";
			e5.style.display="none";
			$("#fall1").val("");
			$("#fall2").val("");
			$("#fall3").val("");
			$("#fall4").val("");
			$("#fall5").val("");
		}
		if ($(this).val()=="1") {
			e1.style.display="block";
			e2.style.display="none";
			e3.style.display="none";
			e4.style.display="none";
			e5.style.display="none";
			$("#fall2").val("");
			$("#fall3").val("");
			$("#fall4").val("");
			$("#fall5").val("");
		}
		if ($(this).val()=="2") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="none";
			e4.style.display="none";
			e5.style.display="none";
			$("#fall3").val("");
			$("#fall4").val("");
			$("#fall5").val("");
		}
		if ($(this).val()=="3") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="block";
			e4.style.display="none";
			e5.style.display="none";
			$("#fall4").val("");
			$("#fall5").val("");
		}
		if ($(this).val()=="4") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="block";
			e4.style.display="block";
			e5.style.display="none";
			$("#fall5").val("");
		}
		if ($(this).val()=="4") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="block";
			e4.style.display="block";
			e5.style.display="block";
		}
		if($(this).val()>"1"){
			$("#valor").val("34.29");
		}else{
			$("#valor").val("54.29");
		}

	});

	$("#btnGuardar").click(function(){
		if ($("#cod_per")!="") {
			$.ajax({
				type: "POST",
				url : "proc/proc_titulo_perpetuidad.php",
				data:{
					cod_per:$("#cod_per").val(),
					cem:$("#cem option:selected").val(),
					ancho : $("#ancho").val(),
					largo : $("#largo").val(),
					lim_nor:$("#lim_nor").val(),
					lim_sur:$("#lim_sur").val(),
					lim_est:$("#lim_est").val(),
					lim_oes:$("#lim_oes").val(),
					nic_aut:$("#nic_aut").val(),
					clase : $("#clase").val(),
					valor : $("#valor").val(),
					num_rec:$("#num_rec").val(),
					fec_rec:$("#fec_rec").val(),
					fall1 : $("#fall1").val(),
					fall2 : $("#fall2").val(),
					fall3 : $("#fall3").val(),
					fall4 : $("#fall4").val(),
					fall5 : $("#fall5").val(),
					nom   : $("#nom").val(),
					caso : 3
				},
				success:function(responseText){
					alert(responseText);
					limpiarCampos();
				}
			});
		}else{
			alert("Debe elegir un propietario para el título");
		}
	});
});


function cargaPer(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_titulo_perpetuidad.php",
		data : {
			cod_per	: codigo,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				$("#dui").val(dataJson[i].dui);
			}
		}
	});
}

function limpiarCampos(){
	$("#formulario")[0].reset();
	$("#num_pue").change();
}

function cancela(){
	parent.location="index_catastro.php";
}