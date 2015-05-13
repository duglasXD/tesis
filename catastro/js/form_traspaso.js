$(function(){
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	$("input[name='per']").click(function(){
		element=document.getElementById("thd");
		if($(this).val()=="J"){
			element.style.display="none";
			$("#radBusPerD").prop("disabled",true);
			$("#tabla_col").find("tr:gt(0)").remove();
		}else{
			element.style.display="block";
			$("#radBusPerD").removeAttr("disabled");
			$("#tabla_col").find("tr:gt(0)").remove();
		}
	});
	//////////////////
	$("input[name='radBusPer']").change(function(){
		if($(this).val()=="NIT"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").mask("9999-999999-999-9");
			$("#txtBusPer").val("");
		}
		if($(this).val()=="DUI"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").mask("99999999-9");
			$("#txtBusPer").val("");
		}
		if($(this).val()=="Nombre"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").val("");
		}
	});
	/////
	$("#btnBusNeg").click(function(){
		if ($("#txtBusNeg").val()!="") {
			$("#cuerpo_neg").load("proc/proc_act_negocio.php",{tipoPer:$("#radTip:checked").val(),radBusNeg:$("#radBusNeg:checked").val(),txtBusNeg:$("#txtBusNeg").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

	$("#btnActualizar").click(function(){
		if ($("#cod_neg").val()=="") {
			alert("Debe seleccionar un negocio");
		}else{
			$.ajax({
				type: "post",
				url : "proc/proc_traspaso.php",
				data : {
					cod_neg : $("#cod_neg").val(),
					cod_pan : $("#cod_con").val(),
					tipoPer : $("#tipoPer").val(),
					cod_pnu : $("#cod_pnu").val(),
					fec_tra : $("#fec_tra").val(),
					caso : 3
				},
				success : function(responseText){
					alert(responseText);
					limpiarCampos();
				}
			});
		}
	});

	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_traspaso.php",{per:$("#per:checked").val(),radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:4},function(responseText,textStatus,XMLHttpRequest){
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
});

function cargaNeg(codper,codneg,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_traspaso.php",
		async: true,
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
				$("#cod_con").val(dataJson[i].cod_per);
				if(tipoPer=="N")
					$("#nom_per").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				else
					$("#nom_per").val(dataJson[i].nom);
				$("#nom_neg").val(dataJson[i].nom_neg);
				$("#rub_neg").val(dataJson[i].rub_neg);
				if (dataJson[i].zon_neg=="Rural") {
					$("#zon_negR").prop("checked",true);
				 }else{
					$("#zon_negU").prop("checked",true);
				}
				$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir_neg").val(dataJson[i].dir_neg);
				$("#med_neg").val(dataJson[i].med_neg);
				$("#cod_con").val(dataJson[i].cod_per);
				$("#img_neg").remove();
				$("#miniatura").html("<input type='file' id='img_neg' class='file' data-show-upload='false'>");
				if(dataJson[i].img_neg==""){
					$("#img_neg").fileinput({
						initialPreview:["<img src='./../img/no_imagen.png' class='file-preview-image'>"],
						showCaption:false,
						showRemove:false,
						allowedFileExtensions: ["jpg"]
					});
					$("#img_neg").fileinput("disable");
				}else{
					$("#img_neg").fileinput({
						initialPreview:["<img src='proc/imagenes/"+dataJson[i].img_neg+"' class='file-preview-image'>"],
						showCaption:false,
						showRemove:false,
						allowedFileExtensions: ["jpg"]
					});	
					$("#img_neg").fileinput("disable");
				}
			}
		}
	});
}

function cargaPer(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_traspaso.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 5
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_pnu").val(dataJson[i].cod_per);
				$("#nom_nue").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
			}
		}
	});
}

function limpiarCampos(){
	$("#cod_neg").val("");
	$("#nom_neg").val("");
	$("#rub_neg").val("");
	$("#dir_neg").val("");
	$("#med_neg").val("0");
	$("#img_neg").val("");
	$("#cod_con").val("");
	$("#cod_pnu").val("");
	$("#nom_per").val("");
	$("#nom_nue").val("");
	$("#img_neg").remove();
	$("#miniatura").html("<input type='file' id='img_neg' class='file' data-show-upload='false'>");
	$("#img_neg").fileinput({
		initialPreview:["<img src='./../img/no_imagen.png' class='file-preview-image'>"],
		showCaption:false,
		allowedFileExtensions: ["jpg"],
	});
	$("#img_neg").fileinput("disable");
}

function cancela(){
	parent.location="index_catastro.php";
}
