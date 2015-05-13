$(function(){
	//$(selector).mask("{1,20}@{1,20}.{3}[.{2}]") correo
	$("#guardar").click(
		function(){
			if( $("#nom").val()=="" || $("#cor").val()=="" || $("#niv").val()=="0" || $("#usu").val()=="" || $("#contra").val()=="" || $("#contra2").val()==""){
			
				alert("existen campos vacios");	
		}
		else{
				$.ajax
				({
					type : "POST",
					url : "proc_nuevo_usuario.php",
					data : { 
							nom:$( "#nom" ).val() ,
							cor:$("#cor").val() ,
							niv:$("#niv").val() , 
							usu:$("#usu").val(), 
							contra:$("#contra").val(),  
							caso : 1 
						},
					success:function(data)
					{
						alert(data);
						alert("Guardado exitosamente");
						$("#nom").val("");
						$( "#cor" ).val( "" );
						$( "#niv" ).val( "" );
						$( "#usu" ).val( "" );
						$( "#contra" ).val( "" );
						$( "#contra2" ).val( "" );
					}
				});		
		}
	});
});