$(function(){
	$("input[name='radBus']").change(function(){
		$.ajax({
			type:"post",
			url:"proc/proc_cons_expediente.php",
			data:{
				opcion:$(this).val(),
			},
			success:function(responseText){
				//convertimos la respuesta del php (jSON) en array de javascript
				dataJson=eval(responseText);
			    datos=[];
			    for(var i in dataJson){
			       datos.push([dataJson[i].label, dataJson[i].value]);
			    }
			    //Se crea el titulo del grafico
			    var titulo="";
			    if($("input[name='radBus']:checked").val()=="sx"){
			    	titulo="Estadistica por genero de las personas con expediente";
			    }
			     if($("input[name='radBus']:checked").val()=="ec"){
			    	titulo="Estado civil de personas con expediente";
			    }
			     if($("input[name='radBus']:checked").val()=="ne"){
			    	titulo="Nivel de educacion de las personas con expediente";
			    }
			    muestraGrafica(datos,titulo);
			}
		});
	});
});



function muestraGrafica(datos,titulo){
	//jQuery.jqplot.config.enablePlugins = true;
	e=document.getElementById('migrafica');
	e.innerHTML="";
      plot7 = jQuery.jqplot('migrafica',[datos], 
        {
          title: titulo, 
          seriesDefaults: {shadow: true, renderer: jQuery.jqplot.PieRenderer, rendererOptions: { showDataLabels: true } }, 
          legend: { show:true }
        }
      );
}

function imprimeGrafica(){
	var ficha=document.getElementById('migrafica');
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	ventimp.print();
	ventimp.close();
}