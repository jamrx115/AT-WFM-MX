<?php

	require_once("funciones.php");
    
	$id_orden = $_GET['id'];
	
	$lat = $_GET['lat'];
		
	$lon = $_GET['lon'];
	
	$tipo = $_GET['tipo'];
	
	$diferencia = $_GET['dif_bd'];

	$valores = guardaFecha($id_orden,$lat,$lon,$tipo,$diferencia);

?>