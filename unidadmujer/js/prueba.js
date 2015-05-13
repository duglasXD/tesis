

function consulta(){
  $.ajax({
    type:"post",
    url:"proc/prueba.php",
    data:{
      id:6,
      nombre:"angel",
      caso:1
    },
    success:function(data){
      dataJson=eval(data);
      datos=[];
      for(var i in dataJson){
        datos.push([dataJson[i].a, dataJson[i].b]);
      }
      muestraGrafica(datos,titulo);
      
    }
  });
}

function muestraGrafica(dataJson,titulo){
  //jQuery.jqplot.config.enablePlugins = true;
      plot7 = jQuery.jqplot('chart7',[datos], 
        {
          title: titulo, 
          seriesDefaults: {shadow: true, renderer: jQuery.jqplot.PieRenderer, rendererOptions: { showDataLabels: true } }, 
          legend: { show:true }
        }
      );
}