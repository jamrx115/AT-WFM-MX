function Cambio(unidad)
{
	
  $precio=$("#valor").val();
  $("#total").val(unidad*$precio);
 
   
}
function buscarValores(){
	

	$tipo_trabajo = $("#tipo_trabajo").val();

	
		$.ajax({
			dataType: "json",
			data: {"tipo_trabajo": $tipo_trabajo},
			url:   'buscar.php',
			type:  'post',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				$("#valor").val(respuesta.valor);
				
				
			},
			error:	function(xhr,err){ 
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
	
}
function guardaDatos(){	
	$tipo_trabajo = $("#tipo_trabajo").val();
	$cantidad=$("#cantidad").val();
    $total=$("#total").val();
	$id_orden=71;
	
//    $cantidad=$("#cantidad").val();
		$.ajax({
			dataType: "json",
			data: {"id_orden": $id_orden,"tipo_trabajo": $tipo_trabajo,"cantidad": $cantidad,"total": $total},
			url:   'guardar.php',
			type:  'post',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				alert(respuesta);
				$("#responds").load('');
				
			},
			error:	function(xhr,err){ 
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
	
}

