<?php
/*
    Tomar una fotografía y guardarla en un archivo
    @date @date 2018-10-22
    @author parzibyte
    @web parzibyte.me/blog
*/


session_start();
ob_start();



$imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
//La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));

//Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
//todo el contenido lo guardamos en un archivo
$imagenDecodificada = base64_decode($imagenCodificadaLimpia);

//Calcular un nombre único: une el  prefijo y codigo foto
//codigo para generar numero unico: uniqid() 
$nombreImagenGuardada = $_SESSION['Order']. $_SESSION['im'].".png";
$_id_orden = $_SESSION['Order'];
$_photoField= $_SESSION['im'];

//Escribir el archivo
file_put_contents($nombreImagenGuardada, $imagenDecodificada);

$_SESSION['nfoto'] =$nombreImagenGuardada;//linea guille -----------------------------------------------------------------------
//Terminar y regresar el nombre de la foto


if (file_exists($nombreImagenGuardada)){
	//echo "El archivo existe";
	//echo "tamaño".filesize($nombreImagenGuardada);
	$R="photos/";
	$R1=$R.$nombreImagenGuardada;
	copy($nombreImagenGuardada, $R.$nombreImagenGuardada);
	unlink($nombreImagenGuardada);
	
	//--Guardar dato DB
    require 'database.php';
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql01 = "UPDATE salida set $_photoField = ?  WHERE id_orden = ?";	
	$qphotos=$pdo->prepare($sql01);
	$qphotos->execute(array($nombreImagenGuardada,$_id_orden));
	Database::disconnect();			 

} 
else
{ echo "El archivo no existe";
}
	
//copy($_FILES [$nombreImagenGuardada]['./'], $_FILES[$nombreImagenGuardada]['/photo']);
exit($nombreImagenGuardada);

?>