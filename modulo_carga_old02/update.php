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

		$domicilio_salida = $_POST['domicilio_salida'];
        $latitud_salida = $_POST['latitud_salida'];
        $longitud_salida = $_POST['longitud_salida'];
        $egoogle_salida = $_POST['egoogle_salida'];


		
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql1 = "UPDATE portada  set domicilio_llegada = ?, latitud_llegada =?, longitud_llegada = ?, egoogle_llegada = ? WHERE id_orden = ?";
		
		$sql2_d = "DELETE FROM diagrama_reporte WHERE id_diagrama NOT IN (" . implode(",", $id_a) . ") AND id_orden = ?";
		$sql2_i = "INSERT INTO diagrama_reporte (id_orden,nodo,rack,odf,hilo,conector,tipo_conector) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$sql2_u = "UPDATE diagrama_reporte set rack = ?, odf = ?, hilo = ?, conector = ?, tipo_conector = ? WHERE id_diagrama = ? and id_orden = ?";

		$sql3 = "UPDATE salida  set domicilio_salida = ?, latitud_salida =?, longitud_salida = ?, egoogle_salida = ? WHERE id_orden = ?";	
		
		
		try {
			
			$pdo->beginTransaction();
			
			$q1 = $pdo->prepare($sql1);
			$q1->execute(array($domicilio_llegada,$latitud_llegada,$longitud_llegada,$egoogle_llegada,$id_orden));
			
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
			$q3->execute(array($domicilio_salida,$latitud_salida,$longitud_salida,$egoogle_salida,$id_orden));
			
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

	<link   href="css/mystyles.css" rel="stylesheet">
	<script src="js/myeffectsmx.js"></script>
	<script src="js/localizemx.js"></script>
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
				<li class="active"><a  data-toggle="tab" href="#seccion_portada">llegada</a></li>
				<li><a data-toggle="tab" href="#seccion_diagrama">Instalación</a></li>
				<li><a data-toggle="tab" href="#seccion_tendido">Salida</a></li>
			</ul>
			
			<div class="space"></div>
			
			<div class="tab-content" style="overflow: hidden;">
				<div id="seccion_portada" class="tab-pane fade in active">
					<div class="row space-between-rows">
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Domicilio original</label>
								<div class="controls">
									<input class="form-control" name="domicilio_llegada" type="text" value="<?php echo $result_portada['domicilio_llegada']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud_llegada</label>
								<div class="controls">
									<input class="form-control" name="latitud_llegada" type="text" value="<?php echo $result_portada['latitud_llegada']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud_llegada</label>
								<div class="controls">
									<input class="form-control" name="longitud_llegada" type="text" value="<?php echo $result_portada['longitud_llegada']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Liga de google</label>
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
								<h4><b>Equipamiento C5</b></h4>
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
															<label class='control-label'>Tipo Componente</label>
															<div class='controls'>
																<select class='form-control' name='tipo_conector_a_{$n_id_a}'><option Selected>{$result_diagramas_a[$i]['tipo_conector']}</option>";
									$temp.= "<option>Cámara</option><option>Botón de Pánico</option><option>Estrobo (Alerta Visual)</option><option>'Sirena(Alerta Auditiva)</option><option>Grabador</option></select>
															</div>
														</div>
													</div>

													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Instalado?</label>
															<div class='controls'>
																<Select class='form-control' name='conector_a_{$n_id_a}'><option Selected>{$result_diagramas_a[$i]['conector']}</option>";
									$temp.= " ><option>Fachada</option><option>Poste</option><option>No instalado</option></select>
															</div>
														</div>
													</div>

													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Marca</label>
															<div class='controls'>
																<input class='form-control' name='rack_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['rack']}>
															</div>
														</div>
													</div>
													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Modelo</label>
															<div class='controls'>
																<input class='form-control' name='odf_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['odf']}>
															</div>
														</div>
													</div>
													<div class='col-md-2'>
														<div class='control-group'>
															<label class='control-label'>Número de serie</label>
															<div class='controls'>
																<input class='form-control' name='id_en_diagrama_a_{$n_id_a}' type='text' value={$result_diagramas_a[$i]['hilo']} >
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
								<label class="control-label">Registro de llegada</label>
								<div class="controls">
									<input type="submit" name="Submit" class="btn btn-success" value="Capturar coordenadas" onClick="localizemx(2)">
								</div>
							</div>
						</div>
				</div>	

				<div class="row space-between-rows">
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Domicilio final</label>
								<div class="controls">
									<input class="form-control" name="domicilio_salida" type="text" value="<?php echo $result_salida['domicilio_salida']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud_salida</label>
								<div class="controls">
									<input class="form-controle number-value" id="latitud_mxs" name="latitud_salida" type="text" value="<?php if ($result_salida['latitud_salida']=="0.0000"){echo"latitud_mxs";}else{echo $result_salida['latitud_salida'];}?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud_salida</label>
								<div class="controls">
									<input class="form-control number-value" id="longitud_mxs" name="longitud_salida" type="text" value="<?php if ($result_salida['longitud_salida']=="0.0000"){echo"longitud_mxs";}else{echo $result_salida['longitud_salida'];}?>">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Liga de google</label>
								<div class="controls">
									<input class="form-control" name="egoogle_salida" type="text" value="<?php echo $result_salida['egoogle_salida']; ?>">
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