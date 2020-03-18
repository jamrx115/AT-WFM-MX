<?php



/* Archivo para funciones */



function conectaBaseDatos(){

	try{

		$servidor = "alltic.co";

		$puerto = "3306";

		$basedatos = "alltic_causel";

		$usuario = "itop";

		$contrasena = "itop2019";

	

		$conexion = new PDO("mysql:host=$servidor;port=$puerto;dbname=$basedatos",

							$usuario,

							$contrasena,

							array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		

		$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		return $conexion;

	}

	catch (PDOException $e){

		die ("No se puede conectar a la base de datos". $e->getMessage());

	}

}



function dameEstado(){

	$resultado = false;

	$consulta = "select id_valores,item from valores_trabajo";

	

	$conexion = conectaBaseDatos();

	$sentencia = $conexion->prepare($consulta);

	

	try {

		if(!$sentencia->execute()){

			print_r($sentencia->errorInfo());

		}

		$resultado = $sentencia->fetchAll();

		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

		$sentencia->closeCursor();

	}

	catch(PDOException $e){

		echo "Error al ejecutar la sentencia: \n";

			print_r($e->getMessage());

	}

	

	return $resultado;

}



function dameValores($estado = ''){

	$resultado = false;

	$consulta = "select valor_unidad from valores_trabajo";

	

	if($estado != ''){

		$consulta .= " WHERE id_valores = :estado";

	}

	

	$conexion = conectaBaseDatos();

	$sentencia = $conexion->prepare($consulta);

	$sentencia->bindParam('estado',$estado);

	

	try {

		if(!$sentencia->execute()){

			print_r($sentencia->errorInfo());

		}

		$resultado = $sentencia->fetchAll();

		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

		$sentencia->closeCursor();

	}

	catch(PDOException $e){

		echo "Error al ejecutar la sentencia: \n";

			print_r($e->getMessage());

	}

	

	return $resultado;

}

function GuardaDatos($id_orden,$id_tipo,$cantidad,$total)

{

    $conexion = conectaBaseDatos();

	$sentencia = $conexion->prepare("INSERT INTO orden_trabajo_costo (id_orden,id_tipo,cantidad,costo) VALUES (?, ?, ?, ?)");

	$sentencia->bindParam(1, $id_orden);

	$sentencia->bindParam(2, $id_tipo);

	$sentencia->bindParam(3, $cantidad);

	$sentencia->bindParam(4, $total);

	$resultado=$sentencia->execute();

	return $resultado;

}

function EliminaCostos($id_venta){

	

   $resultado = false;

	$consulta = "delete from orden_trabajo_costo where id_ot_valor=:id_venta ";

	



	

	$conexion = conectaBaseDatos();

	$sentencia = $conexion->prepare($consulta);

	$sentencia->bindParam('id_venta',$id_venta);

	

	try {

		if(!$sentencia->execute()){

			print_r($sentencia->errorInfo());

		}

		$resultado = $sentencia->fetchAll();

		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

		$sentencia->closeCursor();

	}

	catch(PDOException $e){

		echo "Error al ejecutar la sentencia: \n";

			print_r($e->getMessage());

	}

	

	return $resultado;

}

function guardaFecha($id_orden,$lat,$lon,$tipo,$diferencia)

{

    $conexion = conectaBaseDatos();

	$sentencia = $conexion->prepare("INSERT INTO fecha_llegada (id_orden,lat,lon,tipo,diferencia) VALUES (?,?,?,?,?)");

	$sentencia->bindParam(1, $id_orden);
	
	$sentencia->bindParam(2, $lat);
	
	$sentencia->bindParam(3, $lon);
	
	$sentencia->bindParam(4, $tipo);
	
	$sentencia->bindParam(5, $diferencia);

	$resultado=$sentencia->execute();

	return $resultado;

}
?>