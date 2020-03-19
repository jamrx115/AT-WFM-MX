<?php
/*
Descripción: Cálculo de la distancia entre 2 puntos en función de su latitud/longitud
Autor:
Sito web: AT-WFM 

*/
 
	 
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Cálculo de la distancia en grados
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Conversión de la distancia en grados a la unidad escogida (kilómetros, millas o millas naúticas)
	switch($unit) {
		case 'km':
			$distance = ($degrees * 111.13384)/0.0010000; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 grado = 69.05482 millas, basándose en el diametro promedio de la Tierra (7.913,1 millas)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 grado = 59.97662 millas naúticas, basándose en el diametro promedio de la Tierra (6,876.3 millas naúticas)
	}
	return round($distance, $decimals);
}

$data = array();
if(!empty($_POST['longitud_llegada'])){
	
	
	$km = distanceCalculation($_POST['longitud_llegada'], $_POST['longitud_llegada'], $_POST['longitud_salida'], $_POST['longitud_salida']); 
	$data['status'] = 'ok';	 
    $data['diferencia']= $km;
	if($km>=20)
		{
	   		$data['color']="#FF0000";
		}
	else
		{
			$data['color']="#00CC33";
		}
	echo json_encode($data);
}
?>
