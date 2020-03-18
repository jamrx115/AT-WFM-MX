<?php
require_once("funciones.php");

if(isset($_POST['tipo_trabajo'])){
	
	$valores = dameValores($_POST['tipo_trabajo']);
	
	
	foreach($valores as $indice => $registro){
		$html= $registro['valor_unidad'];
		
	}
	
	$respuesta = array("valor"=>$html);
	echo json_encode($respuesta);
}



?>