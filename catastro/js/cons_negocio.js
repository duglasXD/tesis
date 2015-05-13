$(function(){
	$("input[name='radBus']").click(function(){
		if ($(this).val()=="Zona") {
			html='';
			html += "<div class='control-group'>"
			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Rural' onChange='buscarDatos()'>Rural</label>"
			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Urbana' onChange='buscarDatos()'>Urbana</label>"
			html += "</div>"
			$("#filtros").html(html);
		}
		if ($(this).val()=="Giro") {
			html='';
			html += "<div class='control-group'>"
			html += "<label class='control-label'>Giro del negocio</label>"
			html += "<div class='controls'>"
			html += "<input type='text' id='txtGiro' class='input-xlarge' style='margin-right:20px;margin-top: 10px;'>"
			html += "<button class='btn' id='btnBusNeg' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"
			html += "</div>"
			html += "</div>"
			$("#filtros").html(html);
		}
		if ($(this).val()=="Contribuyente") {
			html='';
			html += "<div class='control-group'>"
			html += "<strong>Buscar por:&nbsp;&nbsp; </strong>"
			html += "<label class='radio inline'><input type='radio' name='buspor2' value='DUI'>DUI</label>"
			html += "<label class='radio inline'><input type='radio' name='buspor2' value='Nombre' checked>Nombre</label>"
			html += "</div>"				
			html += "<input type='text' class='input-xlarge' style='width:250px;margin-right:20px;margin-top: 10px;' name='bus_proy' id='bus_proy'>"
			html += "<button class='btn' id='btnBusProy' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"		
			$("#filtros").html(html);
		}
	});

});

function buscarDatos(){
	if ($("input[name='radBus']:checked").val()=="Contribuyente") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_negocio.php",
			data :{
				buspor  : $("input[name='buspor2']:checked").val(),
				bus_per: $("#bus_proy").val(),
				caso    : 1
			},
			success : function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('showColumn','nom');
				$("#tablaR").bootstrapTable('showColumn','ape1');
				$("#tablaR").bootstrapTable('showColumn','ape2');
				$("#tablaR").bootstrapTable('load',dataJson);
			}
			
		});
	}
	if($("input[name='radBus']:checked").val()=="Giro"){
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_negocio.php",
			data :{
				buspor : $("#txtGiro").val(),
				caso : 2
			},
			success : function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('hideColumn','nom');
				$("#tablaR").bootstrapTable('hideColumn','ape1');
				$("#tablaR").bootstrapTable('hideColumn','ape2');
				$("#tablaR").bootstrapTable('load',dataJson);
				
			}
		});
	}
	if ($("input[name='radBus']:checked").val()=="Zona") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_negocio.php",
			data :{
				buspor  : $("input[name='buspor']:checked").val(),
				caso : 3
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('hideColumn','nom');
				$("#tablaR").bootstrapTable('hideColumn','ape1');
				$("#tablaR").bootstrapTable('hideColumn','ape2');
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	
	
}
