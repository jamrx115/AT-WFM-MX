<?php
     
    require 'database.php';
	

 
 if ( !empty($_POST)) {

		//Datos Portada
        $id_orden = $_GET['idOrden'];
		$domicilio_llegada = $_POST['domicilio_llegada'];
        $latitud_llegada = $_POST['latitud_llegada'];
        $longitud_llegada = $_POST['longitud_llegada'];
        $egoogle_llegada = $_POST['egoogle_llegada'];
		
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
		$domicilio_salida = $_POST['domicilio_salida'];
        $latitud_salida = $_POST['latitud_salida'];
        $longitud_salida = $_POST['longitud_salida'];
        $egoogle_salida = $_POST['egoogle_salida'];

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql1 = "INSERT INTO portada (id_orden,domicilio_llegada,latitud_llegada,longitud_llegada,egoogle_llegada) values(?, ?, ?, ?,?)";
		$sql2 = "INSERT INTO diagrama_reporte (id_orden,nodo,rack,odf,hilo,conector,tipo_conector) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$sql3 = "INSERT INTO salida (id_orden,domicilio_salida,latitud_salida,longitud_salida,egoogle_salida) values(?, ?, ?, ?,?)";
		
		try {
			
			$pdo->beginTransaction();
			
			$q1 = $pdo->prepare($sql1);
			$q1->execute(array($id_orden,$domicilio_llegada,$latitud_llegada,$longitud_llegada,$egoogle_llegada));
			
			for($i = 1; $i < $nodos_a; $i++) {
				$q2 = $pdo->prepare($sql2);
				$q2->execute(array($id_orden,"A", $rack_a[$i],$odf_a[$i],$id_en_diagrama_a[$i],$conector_a[$i],$tipo_conector_a[$i]));
			}
			
			$q1 = $pdo->prepare($sql3);
			$q1->execute(array($id_orden,$domicilio_salida,$latitud_salida,$longitud_salida,$egoogle_salida));
			
			
		
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