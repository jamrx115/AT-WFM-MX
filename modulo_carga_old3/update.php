<?php

	if (!session_id()){
		@ session_start();
	}
	$user = @$_SESSION['AT-WFM-MX-AUTH'];

	if (isset($user)) {
	} else {
		header("Location: login.html");
	}



    require 'database.php';
 
	$id_orden = $_GET['idOrden'];
	
    if ( !empty($_POST)) {
       
		//Datos Portada

		//Datos Portada
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
		$id_a = array();
		

		
		$rows_nodos_a = $_POST['data-nodo-a-rows'];
		
		for($i = 1; $i <= $rows_nodos_a; $i++) {
			if (isset($_POST['rack_a_' . $i]) && isset($_POST['odf_a_' . $i]) && isset($_POST['id_en_diagrama_a_' . $i]) && isset($_POST['conector_a_' . $i]) && isset($_POST['tipo_conector_a_' . $i])) {
				$id_a[$nodos_a] = (isset($_POST['id_nodo_a_' . $i])) ? $_POST['id_nodo_a_' . $i] : 0;
				$rack_a[$nodos_a] = $_POST['rack_a_' . $i];
				$odf_a[$nodos_a] = $_POST['odf_a_' . $i];
				$id_en_diagrama_a[$nodos_a] = $_POST['id_en_diagrama_a_' . $i];
				$conector_a[$nodos_a] = $_POST['conector_a_' . $i];
				$tipo_conector_a[$nodos_a] = $_POST['tipo_conector_a_' . $i];
				$nodos_a++;
			}
		}
		

		//Datos Salida

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
		
		$sql1 = "UPDATE portada  set domicilio_llegada = ?, latitud_llegada =?, longitud_llegada = ?, egoogle_llegada = ?, contact_name = ?, contact_phone = ?, contact_mail = ?, service_speed = ?, service_line = ?, service_modem = ?, service_webkey = ?, type = ?, aps = ?, energy = ?, operative = ?, cable = ?  WHERE id_orden = ?";
		
		$sql2_d = "DELETE FROM diagrama_reporte WHERE id_diagrama NOT IN (" . implode(",", $id_a) . ") AND id_orden = ?";
		$sql2_i = "INSERT INTO diagrama_reporte (id_orden,nodo,rack,odf,hilo,conector,tipo_conector) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$sql2_u = "UPDATE diagrama_reporte set rack = ?, odf = ?, hilo = ?, conector = ?, tipo_conector = ? WHERE id_diagrama = ? and id_orden = ?";

		$sql3 = "UPDATE salida  set notes = ?, latitud_salida =?, longitud_salida = ?, rphoto_acep = ?, rphoto_res = ?, rphoto_01 = ?, rphoto_02 = ?, rphoto_03 = ?, rphoto_04 = ?, rphoto_05 = ?, rphoto_06 = ?, rphoto_07 = ?, rphoto_08 = ?, rphoto_09 = ?, rphoto_10 = ?, rphoto_11 = ?, rphoto_12 = ?, rphoto_13 = ?, rphoto_14 = ?, rphoto_15 = ?, rphoto_16 = ?, rphoto_17 = ?,rphoto_18 = ? WHERE id_orden = ?";	
		
		
		try {
			
			$pdo->beginTransaction();
			
			$q1 = $pdo->prepare($sql1);
			$q1->execute(array($domicilio_llegada,$latitud_llegada,$longitud_llegada,$egoogle_llegada,$contact_name,$contact_phone,$contact_mail,$service_speed,$service_line,$service_modem,$service_webkey,$type,$aps,$energy,$operative,$cable,$id_orden));
			
			$q2_d = $pdo->prepare($sql2_d);
		    $q2_d->execute(array($id_orden));
			
			for($i = 1; $i < $nodos_a; $i++) {
				if($id_a[$i] != 0) {
					$q2 = $pdo->prepare($sql2_u);
					$q2->execute(array($rack_a[$i],$odf_a[$i],$id_en_diagrama_a[$i],$conector_a[$i],$tipo_conector_a[$i],$id_a[$i],$id_orden));

				}
				else {
					$q2 = $pdo->prepare($sql2_i);
					$q2->execute(array($id_orden,"A", $rack_a[$i],$odf_a[$i],$id_en_diagrama_a[$i],$conector_a[$i],$tipo_conector_a[$i]));
				}
			
			$q3 = $pdo->prepare($sql3);
			$q3->execute(array($notes,$latitud_salida,$longitud_salida,$rphoto_acep,$rphoto_res,$rphoto_01,$rphoto_02,$rphoto_03,$rphoto_04,$rphoto_05,$rphoto_06,$rphoto_07,$rphoto_08,$rphoto_09,$rphoto_10,$rphoto_11,$rphoto_12,$rphoto_13,$rphoto_14,$rphoto_15,$rphoto_16,$rphoto_17,$rphoto_18,$id_orden));
			
			}
			
			
			
			
		} catch(PDOExecption $e) { 
			$pdo->rollback();
			
			//echo "Error!: " . $e->getMessage();
			$cadena = "Error: " . $e->getMessage();
			$arch = fopen("milog.txt", "a+"); 
			fwrite($arch, "[".date("Y-m-d H:i:s.u")."] ".$cadena."\n");
			fclose($arch);
		} 
		
		Database::disconnect();
		header("Location: index.php?idOrden=".$id_orden);

    } else {
		$pdo = Database::connect();
		$sql_portada = "SELECT *
				FROM portada as p 
				WHERE p.id_orden = " . $id_orden;
				
		$sql_diagramas = "SELECT *
				FROM diagrama_reporte
				WHERE id_orden = " . $id_orden . 
				" ORDER BY id_diagrama ASC";
		
		$sql_salida = "SELECT *
				FROM salida as s 
				WHERE s.id_orden = " . $id_orden;
				
		$sql_user = "SELECT *
					FROM view_userrequest
					WHERE id = " . $id_orden;
		
		$sql_status = "SELECT *
						FROM vw_validaestado
						WHERE id= " . $id_orden;
					
		
		$query_user = $pdo->prepare($sql_user);
		$query_user->execute();
		
		$query_status = $pdo->prepare($sql_status);
		$query_status->execute();

		$query_portada =  $pdo->prepare($sql_portada);
		$query_portada->execute();
		
		$result_portada = $query_portada->fetch(PDO::FETCH_ASSOC);
		
		$query_diagramas =  $pdo->prepare($sql_diagramas);
		$query_diagramas->execute();
		
		$result_diagramas_a = array();
		$result_query_diagramas = $query_diagramas->fetch(PDO::FETCH_ASSOC);

		$diagramas_a = 1;
       
        $query_salida =  $pdo->prepare($sql_salida);
		$query_salida->execute();
		
		$result_salida = $query_salida->fetch(PDO::FETCH_ASSOC);
		
		do {
			if($result_query_diagramas['nodo'] == 'A') {
				$result_diagramas_a[] = $result_query_diagramas;
				$diagramas_a++;
			}
			
			$result_query_diagramas = $query_diagramas->fetch(PDO::FETCH_ASSOC);
			
		} while(!empty($result_query_diagramas));
		
		
		$result_user = $query_user->fetch(PDO::FETCH_ASSOC);

		$result_status = $query_status->fetch(PDO::FETCH_ASSOC);

		
		if(empty($result_status)) {
			 header("Location: closedot.html");
			echo "esta vacio";
		}else{ echo ".";}
		
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, user-scalable=no">
    
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>     
	
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
    
	<link   href="js/Gritter-master/css/jquery.gritter.css" rel="stylesheet">
    <script src="js/Gritter-master/js/jquery.gritter.js"></script>

	<link   href="css/photo.css" rel="stylesheet">
	<link   href="css/mystyles.css" rel="stylesheet">
	<script src="js/myeffectsmx.js"></script>
	<script src="js/localizemx.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
</head>
 
<body>

	<div class="container">
		<?php include 'navbar.php'; ?>
		<div class="row align-center">
			<h2><b>Actualización de datos Orden/Sitio número: <?php echo $result_user['num_ot']; ?></b></h2>
		</div>
	</div>
	
	<div class="top-line-gray"></div>
	
    <div class="container">

		<form id="form_ot" action="update.php?idOrden=<?php echo $id_orden; ?>" method="post">	
			
			<ul class="nav nav-tabs">
				<li class="active"><a  data-toggle="tab" href="#seccion_portada">llegada al sitio</a></li>
				<li><a data-toggle="tab" href="#seccion_diagrama">Instalación</a></li>
				<li><a data-toggle="tab" href="#seccion_tendido">Salida</a></li>
			</ul>
			
			<div class="space"></div>
			
			<div class="tab-content" style="overflow: hidden;">
				<div id="seccion_portada" class="tab-pane fade in active">
				
				<div class="row space-between-rows">
						<div class="col-md-10">
							<div class="control-group">
								<h4><b>Control y lista de chequeo de inicio</b></h4>
							</div>
						</div>
				</div>			
				
				
					<div class="row space-between-rows">
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Dirección en sitio:</label>
								<div class="controls">
									<input class="form-control" name="domicilio_llegada" type="text" value="<?php echo $result_portada['domicilio_llegada']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Tipo de enlace:</label>
								<div class="controls">
									<input class="form-control" name="type" type="text" value="<?php echo $result_portada['type']; ?>">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Equipo APS en sitio?:</label>
								<div class="controls">
									<select class="form-control" name="aps"><option Selected><?php echo $result_portada['aps']; ?></option>
									<option>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Sitio energizado?:</label>
								<div class="controls">
									<select class="form-control" name="energy"><option Selected><?php echo $result_portada['energy']; ?></option>
									<option>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Operando?:</label>
								<div class="controls">
									<select class="form-control" name="operative"><option Selected><?php echo $result_portada['operative']; ?></option>
									<option>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Cableado listo y rematado?:</label>
								<div class="controls">
									<select class="form-control" name="cable"><option Selected><?php echo $result_portada['cable']; ?></option>
									<option>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Persona que atendió:</label>
								<div class="controls">
									<input class="form-control" name="contact_name" type="text" value="<?php echo $result_portada['contact_name']; ?>">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Teléfono contacto en sitio:</label>
								<div class="controls">
									<input class="form-control" name="contact_phone" type="text" value="<?php echo $result_portada['contact_phone']; ?>">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">eMail contacto en sitio:</label>
								<div class="controls">
									<input class="form-control" name="contact_mail" type="text" value="<?php echo $result_portada['contact_name']; ?>">
								</div>
							</div>
						</div>		
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Velocidad servicio:</label>
								<div class="controls">
									<input class="form-control" name="service_speed" type="text" value="<?php echo $result_portada['service_speed']; ?>">
								</div>
							</div>
						</div>											
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Linea:</label>
								<div class="controls">
									<input class="form-control" name="service_line" type="text" value="<?php echo $result_portada['service_line']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Modém:</label>
								<div class="controls">
									<input class="form-control" name="service_modem" type="text" value="<?php echo $result_portada['service_modem']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Webkey:</label>
								<div class="controls">
									<input class="form-control" name="service_webkey" type="text" value="<?php echo $result_portada['service_webkey']; ?>">
								</div>
							</div>
						</div>									
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud llegada:</label>
								<div class="controls">
									<input class="form-control" name="latitud_llegada" type="text" value="<?php echo $result_portada['latitud_llegada']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud llegada:</label>
								<div class="controls">
									<input class="form-control" name="longitud_llegada" type="text" value="<?php echo $result_portada['longitud_llegada']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Liga de google:</label>
								<div class="controls">
									<input class="form-control" name="egoogle_llegada" type="text" value="<?php echo $result_portada['egoogle_llegada']; ?>">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="seccion_diagrama" class="tab-pane fade">
					
					<div class="diagrama-row">
						<div class="row space-between-rows">
							<div class="col-md-2">
								<h4><b>Datos de Instalación</b></h4>
							</div>
							<div class="col-md-10">
								<div class="pull-right below-under-line">
									<a id="new_nodo_a" class="btn btn-success" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
								</div>
							</div>
						</div>
						<div id="nodo_a_zone" data-rows="<?php echo $diagramas_a ?>">
							<input type='hidden' id="rows-nodo-a-input" name='data-nodo-a-rows' type='text' value="<?php echo $diagramas_a ?>">
							
							<?php
								
								$cadena = "";
								for ($i = 0; $i < $diagramas_a - 1 ; $i++) {
									
									$n_id_a = $i + 1;
									
									$button = "";
									if($i > 0) {
										$button = "<div class='col-md-offset-1 col-md-1'><a class='btn btn-danger btn-row-margin btn-delete-nodo-a-row'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
									}
									
									$temp =	"<div class='row space-between-rows'>
													<input type='hidden' name='id_nodo_a_{$n_id_a}' value='{$result_diagramas_a[$i]['id_diagrama']}'>
													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Tipo componente:</label>
															<div class='controls'>
																<select class='form-control' name='tipo_conector_a_{$n_id_a}'><option Selected>{$result_diagramas_a[$i]['tipo_conector']}</option>";
									$temp.= "<option>AP</option><option>Módem</option></select>
															</div>
														</div>
													</div>

													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Marca:</label>
															<div class='controls'>
																<input class='form-control' name='rack_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['rack']}>
															</div>
														</div>
													</div>
													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Modelo:</label>
															<div class='controls'>
																<input class='form-control' name='odf_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['odf']}>
															</div>
														</div>
													</div>
													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Número de serie:</label>
															<div class='controls'>
																<input class='form-control' name='id_en_diagrama_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['hilo']}>
															</div>
														</div>
													</div>
													
													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>MAC:</label>
															<div class='controls'>
																<input class='form-control' name='conector_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['conector']}>
															</div>
														</div>
													</div>
													" . $button . "
												</div>";
												
									$cadena = $temp . $cadena;
												
								}
								echo $cadena;
							?>
						</div>
				    </div>
			    </div>

				<div id="seccion_tendido" class="tab-pane fade">

				<div class="row space-between-rows">
						<div class="col-md-10">
							<div class="control-group">
								<h4><b>Control de cierre de orden y salida del sitio</b></h4>
								<div class="controls">
									<input type="submit" name="Submit" class="btn btn-success" value="Capturar coordenadas" onClick="localizemx(2)">
								</div>
							</div>
						</div>
				</div>	

				<div class="row space-between-rows">
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Observaciones:</label>
								<div class="controls">
									<input class="form-control" name="notes" type="text" value="<?php echo $result_salida['notes']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud final AP:</label>
								<div class="controls">
									<input class="form-control number-value" id="latitud_mxs" name="latitud_salida" type="text" value="<?php if ($result_salida['latitud_salida']=="0.0000"){echo"latitud_mxs";}else{echo $result_salida['latitud_salida'];}?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud final AP:</label>
								<div class="controls">
									<input class="form-control number-value" id="longitud_mxs" name="longitud_salida" type="text" value="<?php if ($result_salida['longitud_salida']=="0.0000"){echo"longitud_mxs";}else{echo $result_salida['longitud_salida'];}?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen portal de bienvenida:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_01" type="text" value="<?php echo $result_salida['rphoto_01']; ?>" readonly="readonly">
									 <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_01']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_01']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_01">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>	
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Foto frente del modém:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_02" type="text" value="<?php echo $result_salida['rphoto_02']; ?>" readonly="readonly">
								     <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_02']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_02']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_02">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>									
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Foto posterior modém con número de serie y modelo:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_03" type="text" value="<?php echo $result_salida['rphoto_03']; ?>" readonly="readonly">
				 					 <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_03']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_03']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_03">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Foto del AP dónde se observe serie y MAC:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_04" type="text" value="<?php echo $result_salida['rphoto_04']; ?> "readonly="readonly">
									 <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_04']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_04']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_04">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen panorámica de la ubicación final AP:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_05" type="text" value="<?php echo $result_salida['rphoto_05']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_05']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_05']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_05">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen donde se aprecie que esta conectado el dispositido a la red:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_06" type="text" value="<?php echo $result_salida['rphoto_06']; ?>" readonly="readonly">
								     <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_06']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_06']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_06">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen de prueba Speed Test:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_07" type="text" value="<?php echo $result_salida['rphoto_07']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_07']?>" onerror="this.src='photos/sin_imagen.png';" >
									    <img src="photos/<?php echo $result_salida['rphoto_07']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_07">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 01:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_08" type="text" value="<?php echo $result_salida['rphoto_08']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_08']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_08']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_08">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 02:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_09" type="text" value="<?php echo $result_salida['rphoto_09']; ?>" readonly="readonly">
								     <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_09']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_09']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_09">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 03:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_10" type="text" value="<?php echo $result_salida['rphoto_10']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_10']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_10']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_10">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 04:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_11" type="text" value="<?php echo $result_salida['rphoto_11']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_11']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_11']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_11">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 05:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_12" type="text" value="<?php echo $result_salida['rphoto_12']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_12']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_12']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_12">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								</div>
							</div>
						</div>
					
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 06:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_13" type="text" value="<?php echo $result_salida['rphoto_13']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_13']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_13']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_13">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 07:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_14" type="text" value="<?php echo $result_salida['rphoto_14']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_14']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_14']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_14">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>
									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 08:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_15" type="text" value="<?php echo $result_salida['rphoto_15']; ?>" readonly="readonly">
								     <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_15']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_15']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_15">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>
									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 09:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_16" type="text" value="<?php echo $result_salida['rphoto_16']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_16']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_16']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_16">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 10:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_17" type="text" value="<?php echo $result_salida['rphoto_17']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_17']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_17']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_17">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de Navegación 11:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_18" type="text" value="<?php echo $result_salida['rphoto_18']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_18']?>" onerror="th is.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_18']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_18">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Carta de aceptación:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_acep" type="text" value="<?php echo $result_salida['rphoto_acep']; ?>" readonly="readonly">
								     <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_acep']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_acep']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_acep">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								
								
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Carta responsiva de instalación:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_res" type="text" value="<?php echo $result_salida['rphoto_res']; ?>" readonly="readonly">
								    <div class="gallery"> <a target="_blank" href="photos/<?php echo $result_salida['rphoto_res']?>" onerror="this.src='photos/sin_imagen.png';">
									    <img src="photos/<?php echo $result_salida['rphoto_res']?>" alt="foto1" width="200" height="auto" onerror="this.src='photos/sin_imagen.png';">
									  	</a>
									  	<!-- link para tomar 
									  	<div class="desc"> foto-->
									  	<div class="desc">
									  	<a  href="tomarFoto.php?id_orden=<?php echo $id_orden; ?>&im=rphoto_res" target="blank">
										<i class="fas fa-camera fa-lg"></i></a>
									  	</div>

									  	<!--<i class="fas fa-camera fa-lg"></i>-->
									 </div>
								</div>
							</div>
						</div>
						
					</div>

				</div>
				
			</div>		

			<div class="under-line-gray"></div>
			<div class="space"></div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="pull-right below-under-line">
						<button type="submit" class="btn btn-success">Actualizar</button>
						<a class="btn btn-danger" href="index.php?idOrden=<?php echo $id_orden ?>">Cancelar</a>
					</div>
				</div>
			</div>
		</form>	
    </div> <!-- /container -->
  </body>
</html>