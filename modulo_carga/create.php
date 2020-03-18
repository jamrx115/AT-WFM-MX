<?php
     
    require 'database.php';
	

 
 if ( !empty($_POST)) {

		//Datos Portada
        $id_orden = $_GET['idOrden'];
		$domicilio_llegada = $_POST['domicilio_llegada'];
		$type = $_POST['type'];
        $aps = $_POST['aps'];
        $energy = $_POST['energy'];
        $operative = $_POST['operative'];
		$cable = $_POST['cable'];
        $latitud_llegada = $_POST['latitud_llegada'];
        $longitud_llegada = $_POST['longitud_llegada'];
        $egoogle_llegada = $_POST['egoogle_llegada'];
        $contact_name = $_POST['contact_name'];
		$contact_phone = $_POST['contact_phone'];
        $contact_mail = $_POST['contact_mail'];
        $service_speed = $_POST['service_speed'];
        $service_line = $_POST['service_line'];
        $service_modem = $_POST['service_modem'];
        $service_webkey = $_POST['service_webkey'];
        
		//Datos Diagrama
		$nodos_a = 1;
		$tipo_conector_a = array();;
		$id_en_diagrama_a = array();;
		$conector_a = array();;
		$rack_a = array();
		$odf_a = array();
		
		$rows_nodos_a = $_POST['data-nodo-a-rows'];

		
		for($i = 1; $i <= $rows_nodos_a; $i++) {
			if (isset($_POST['rack_a_' . $i]) && isset($_POST['odf_a_' . $i]) && isset($_POST['id_en_diagrama_a_' . $i]) && isset($_POST['conector_a_' . $i]) && isset($_POST['tipo_conector_a_' . $i])) {
				$rack_a[$nodos_a] = $_POST['rack_a_' . $i];
				$odf_a[$nodos_a] = $_POST['odf_a_' . $i];
				$id_en_diagrama_a[$nodos_a] = $_POST['id_en_diagrama_a_' . $i];
				$conector_a[$nodos_a] = $_POST['conector_a_' . $i];
				$tipo_conector_a[$nodos_a] = $_POST['tipo_conector_a_' . $i];
				$nodos_a++;
			}
		}
		
		
		//Datos Salida
		$id_orden = $_GET['idOrden'];
		$notes = $_POST['notes'];
        $latitud_salida = $_POST['latitud_salida'];
        $longitud_salida = $_POST['longitud_salida'];
        $rphoto_acep = $_POST['rphoto_acep'];
        $rphoto_res = $_POST['rphoto_res'];
        $rphoto_01 = $_POST['rphoto_01'];
        $rphoto_02 = $_POST['rphoto_02'];
        $rphoto_03 = $_POST['rphoto_03'];
        $rphoto_04 = $_POST['rphoto_04'];
        $rphoto_05 = $_POST['rphoto_05'];
        $rphoto_06 = $_POST['rphoto_06'];
        $rphoto_07 = $_POST['rphoto_07'];
        $rphoto_08 = $_POST['rphoto_08'];
        $rphoto_09 = $_POST['rphoto_09'];
        $rphoto_10 = $_POST['rphoto_10'];
        $rphoto_11 = $_POST['rphoto_11'];
        $rphoto_12 = $_POST['rphoto_12'];
        $rphoto_13 = $_POST['rphoto_13'];
        $rphoto_14 = $_POST['rphoto_14'];
        $rphoto_15 = $_POST['rphoto_15'];
        $rphoto_16 = $_POST['rphoto_16'];
        $rphoto_17 = $_POST['rphoto_17'];
        $rphoto_18 = $_POST['rphoto_18'];

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql1 = "INSERT INTO portada (id_orden,domicilio_llegada,latitud_llegada,longitud_llegada,egoogle_llegada,contact_name,contact_phone,contact_mail,service_speed,service_line,service_modem,service_webkey,type,aps,energy,operative,cable) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$sql2 = "INSERT INTO diagrama_reporte (id_orden,nodo,rack,odf,hilo,conector,tipo_conector) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$sql3 = "INSERT INTO salida (id_orden,notes,latitud_salida,longitud_salida,rphoto_acep,rphoto_res,rphoto_01,rphoto_02,rphoto_03,rphoto_04,rphoto_05,rphoto_06,rphoto_07,rphoto_08,rphoto_09,rphoto_10,rphoto_11,rphoto_12,rphoto_13,rphoto_14,rphoto_15,rphoto_16,rphoto_17,rphoto_18) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		try {
			
			$pdo->beginTransaction();
			
			$q1 = $pdo->prepare($sql1);
			$q1->execute(array($id_orden,$domicilio_llegada,$latitud_llegada,$longitud_llegada,$egoogle_llegada,$contact_name,$contact_phone,$contact_mail,$service_speed,$service_line,$service_modem,$service_webkey,$type,$aps,$energy,$operative,$cable));
			
			for($i = 1; $i < $nodos_a; $i++) {
				$q2 = $pdo->prepare($sql2);
				$q2->execute(array($id_orden,"A", $rack_a[$i],$odf_a[$i],$id_en_diagrama_a[$i],$conector_a[$i],$tipo_conector_a[$i]));
			}
			
			$q1 = $pdo->prepare($sql3);
			$q1->execute(array($id_orden,$notes,$latitud_salida,$longitud_salida,$rphoto_acep,$rphoto_res,$rphoto_01,$rphoto_02,$rphoto_03,$rphoto_04,$rphoto_05,$rphoto_06,$rphoto_07,$rphoto_08,$rphoto_09,$rphoto_10,$rphoto_11,$rphoto_12,$rphoto_13,$rphoto_14,$rphoto_15,$rphoto_16,$rphoto_17,$rphoto_18));
			
			
		
		} catch(PDOExecption $e) { 
			$pdo->rollback();
			
			echo "Error!: " . $e->getMessage();
			$cadena = "Error: " . $e->getMessage();
			$arch = fopen("milog.txt", "a+"); 
			fwrite($arch, "[".date("Y-m-d H:i:s.u")."] ".$cadena."\n");
			fclose($arch);
		} 
		
		Database::disconnect();
		header("Location: index.php?idOrden=".$id_orden);
    }
?>