$(function(){
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	$('.selectpicker').selectpicker();
	$("input[name='radTip']").click(function(){
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
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_negocio.php",{radTip:$("#radTip:checked").val(),radBusPer:$("input[name='radBusPer']:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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
		if ($("#nom_neg").val()!="") {
			if ($("#cod_con").val()!="") {
				if ($("#med_neg").val()=="") {
					alert("Metros a calle debe tener un valor");
				}else{
					var inputFileImage = document.getElementById("img_neg");
					var file = inputFileImage.files[0];
					var data = new FormData($("#formulario")[0]);
					data.append('img_neg',file);
					data.append('caso',3);
       							
					$.ajax({
						type : "post",
						url  : "proc/proc_negocio.php",
						async: true,
            			//necesario para subir archivos via ajax
            			cache: false,
			            contentType: false,
            			processData: false,
            			data:data,
						success:function(responseText){
							var dataJson=eval(responseText);
							if(dataJson[0].exito==1){
								alert("Guardado exitosamente");	
								parent.centro.location.href="rep_apertura_negocio.php?cod_con="+$("#cod_con").val()+"&cod_neg="+dataJson[0].cod_neg+"";
							}
						}
					});
				}
			}else{
				alert("Debe escoger un contribuyente");
			}
		}else{
			alert("Debe proporcionar un nombre para la empresa");
		}
	});

	
});

function cargaPer(codigo,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_negocio.php",
		async: true,
		data : {
			tipo : tipoPer,
			cod_per	: codigo,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_con").val(dataJson[i].cod_per);
				$("#tipoPer").val(tipoPer);
				if (tipoPer=="N") {
					$("#nom_per").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				}else{
					$("#nom_per").val(dataJson[i].nom);
				}
				
			}
		}
	});
}

function limpiarCampos(){
	$("#formulario")[0].reset();
	$('.selectpicker').selectpicker('val','');
}

function cancela(){
	parent.location="index_catastro.php";
}