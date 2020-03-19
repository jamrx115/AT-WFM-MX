<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?sensor=false"></script>     
	
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
	
	<link   href="js/Gritter-master/css/jquery.gritter.css" rel="stylesheet">
    <script src="js/Gritter-master/js/jquery.gritter.js"></script>
	<link   href="css/mystyles.css" rel="stylesheet">
	<script src="js/myeffectsmx.js"></script>
    <script src="js/localizemx.js"></script>
	<style type="text/css">
	<!--
		.Alerta {color: #FF0000}
		.Ok {color: #00CC00; }
	-->
	</style>
</head>
 
<body>
    	
	<?php

		if (!session_id()){
			@ session_start();
		}
		$user = @$_SESSION['AT-WFM-MX-AUTH'];

		if (isset($user)) {
		} else {
			header("Location: login.html");
			exit();
		}



		include 'database.php';
	   
		$id_orden = $_GET['idOrden'];
	   
		$pdo = Database::connect();
				
		$sql_portada = "SELECT *
				FROM portada as p 
				WHERE p.id_orden = " . $id_orden;
		
		$sql_diagramas = "SELECT *
				FROM diagrama_reporte
				WHERE id_orden = " . $id_orden . 
				" ORDER BY id_diagrama ASC";
		
		$sql_salida = "SELECT *
				FROM salida
				WHERE id_orden = " . $id_orden . 
				" ORDER BY id_salida ASC";
				
		$sql_user = "SELECT *
					FROM view_userrequest
					WHERE id = " . $id_orden;
					
		$sql_status = "SELECT *
						FROM vw_validaestado
						WHERE id= " . $id_orden;
		
		$query_portada =  $pdo->prepare($sql_portada);
		$query_portada->execute();
		
		$query_diagramas =  $pdo->prepare($sql_diagramas);
		$query_diagramas->execute();
		
		$query_salida =  $pdo->prepare($sql_salida);
		$query_salida->execute();
		
		$query_user = $pdo->prepare($sql_user);
		$query_user->execute();
		
		$query_status = $pdo->prepare($sql_status);
		$query_status->execute();
		
		$result_diagramas_a = array();
		$result_query_diagramas = $query_diagramas->fetch(PDO::FETCH_ASSOC);
		
		do {
			if($result_query_diagramas['nodo'] == 'A') {
				$result_diagramas_a[] = $result_query_diagramas;
			}
			
			$result_query_diagramas = $query_diagramas->fetch(PDO::FETCH_ASSOC);
			
		} while(!empty($result_query_diagramas));	
		
		$result_salida = $query_salida->fetch(PDO::FETCH_ASSOC);
        $result_portada = $query_portada->fetch(PDO::FETCH_ASSOC);
		$result_user = $query_user->fetch(PDO::FETCH_ASSOC);
		$result_status = $query_status->fetch(PDO::FETCH_ASSOC);
		

		if(empty($result_status)) {
			header("Location: closedot.html");
		}
		
	?>
	
	<div class="container">
		<?php include 'navbar.php'; ?>
		
		<div class="row align-center">
			<h2><b>Carga de datos Orden/Sitio número: <?php echo $result_user['num_ot']; ?></b><input name="id_orden" id="id_orden" type="hidden" value="<?php echo $id_orden ?>"></h2>
		</div>
	</div>
	
	<div class="top-line-gray"></div>
	
	<div class="container">

		<div class="row" style="margin-bottom: 2px;">
			<p>
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="400">
                <div align="left">
                 <ul class="list-none-style">
                    <li>Cliente: <b><?php echo $result_user['nom_cliente']; ?></b></li>
                    <li>Fecha de ejecución: <b><?php echo $result_user['fecha_ejecucion']; ?></b></li>
                    <li>Dirección de instalación: <b><?php echo $result_user['direccion']; ?></b></li>
                    <li>Contacto: <b><?php echo $result_user['nom_contacto']; ?></b></li>
                    <li>Teléfono del contacto: <b><?php echo $result_user['tel_contacto']; ?></b></li>
                    <li>Grupo asignado: <b><?php echo $result_user['team_id_friendlyname']; ?></b></li>
                    <li>Responsable orden: <b><?php echo $result_user['agent_id_friendlyname']; ?></b></li>
                  </ul>
              </div></td>
            </tr>
            </table>
			</p>
		</div>
	</div>
	
	<?php if(empty($result_portada)) : ?>
	
	<div class="container">
	
		<form id="form_ot" action="create.php?idOrden=<?php echo $id_orden; ?>" method="post">	
			
			<ul class="nav nav-tabs">
				<li class="active"><a  data-toggle="tab" href="#seccion_portada">llegada al sitio</a></li>
				<li><a  data-toggle="tab" href="#seccion_diagrama">Instalación</a></li>
				<li><a  data-toggle="tab" href="#seccion_tendido">Salida</a></li>
			</ul>
			<div class="space"></div>
			<div class="tab-content" style="overflow: hidden;">
				<div id="seccion_portada" class="tab-pane fade in active">

				<div class="row space-between-rows">
						<div class="col-md-10">
							<div class="control-group">
								<h4><b>Control y lista de chequeo de inicio</b></h4>
								<div class="controls">
									<input type="submit" name="Submit" class="btn btn-success" value="Capturar coordenadas" onClick="localizemx(1)">
								</div>
							</div>
						</div>
				</div>			
					<div class="row space-between-rows">
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">ID de sitio:</label>
									<div class="controls">
										<input class="form-control" name="idsitio" type="text" value="<?php echo $result_user['num_ot']; ?>" readonly="readonly">
									</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Tipo de enlace:</label>
								<div class="controls">
									<input class="form-control" name="type" type="text">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Equipo APS en sitio?:</label>
								<div class="controls">
									<select class="form-control" name="aps">
								 		<option selected>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Sitio energizado?:</label>
								<div class="controls">
									<select class="form-control" name="energy">
								 		<option selected>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Operando?:</label>
								<div class="controls">
									<select class="form-control" name="operative">
								 		<option selected>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Cableado listo y rematado?:</label>
								<div class="controls">
									<select class="form-control" name="cable">
								 		<option selected>SI</option><option>NO</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Dirección en sitio:</label>
								<div class="controls">
									<input class="form-control" name="domicilio_llegada" type="text">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Persona que atendió:</label>
								<div class="controls">
									<input class="form-control" name="contact_name" type="text">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Teléfono contacto en sitio:</label>
								<div class="controls">
									<input class="form-control" name="contact_phone" type="text">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">eMail contacto en sitio:</label>
								<div class="controls">
									<input class="form-control" name="contact_mail" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Velocidad servicio:</label>
								<div class="controls">
									<input class="form-control" name="service_speed" type="text">
								</div>
							</div>
						</div>											
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Linea:</label>
								<div class="controls">
									<input class="form-control" name="service_line" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Modém:</label>
								<div class="controls">
									<input class="form-control" name="service_modem" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Webkey:</label>
								<div class="controls">
									<input class="form-control" name="service_webkey" type="text">
								</div>
							</div>
						</div>																		
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud</label>
								<div class="controls">
									<input class="form-control number-value" id="latitud_mx" name="latitud_llegada" type="text" value="<?php echo"latitud_mx";?>">
								</div>
							</div>
						</div>
					
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud</label>
								<div class="controls">
									<input class="form-control number-value" id="longitud_mx" name="longitud_llegada" type="text" value="<?php echo"longitud_mx"?>">
								</div>
							</div>
						</div>
				
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Liga de google</label>
								<div class="controls">
									<input class="form-control" name="egoogle_llegada" type="text">
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
						<div id="nodo_a_zone" data-rows="1">
							<input type='hidden' id="rows-nodo-a-input" name='data-nodo-a-rows' type='text' value="1">
							<div class="row space-between-rows">
								<div class="col-md-2">
									<div class="control-group">
										<label class="control-label">Tipo componente</label>
										<div class="controls">
											<select class="form-control" name="tipo_conector_a_1">
												<option selected>AP</option><option>Modém</option>
											</select>
										</div>
									</div>
								</div>	
								<div class="col-md-2">
									<div class="control-group">
										<label class="control-label">Marca</label>
										<div class="controls">
											<input class="form-control" name="rack_a_1" type="text" >
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="control-group">
										<label class="control-label">Modelo</label>
										<div class="controls">
											<input class="form-control" name="odf_a_1" type="text" >
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="control-group">
										<label class="control-label">Número de serie</label>
										<div class="controls">
											<input class="form-control" name="id_en_diagrama_a_1" type="text" >
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="control-group">
										<label class="control-label">MAC</label>
										<div class="controls">
											<input class="form-control" name="conector_a_1" type="text">
										</div>
									</div>
								</div>	
							</div>
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
								<label class="control-label">ID de sitio:</label>
									<div class="controls">
										<input class="form-control" name="idsitio" type="text" value="<?php echo $result_user['num_ot']; ?>" readonly="readonly">
									</div>
							</div>
					   </div>
				
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Observaciones:</label>
								<div class="controls">
									<input class="form-control" name="notes" type="text">
								</div>
							</div>
						</div>
				
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud final AP:</label>
								<div class="controls">
									<input class="form-control number-value" id="latitud_mxs" name="latitud_salida" type="text"  value="<?php echo"0.0000"?>">
								</div>
							</div>
						</div>
			
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud final AP:</label>
								<div class="controls">
									<input class="form-control number-value" id="longitud_mxs" name="longitud_salida" type="text" value="<?php echo"0.0000"?>">
								</div>
							</div>
						</div>
			
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen portal de bievenida:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_01" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Foto frente del módem:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_02" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Foto posterior modém con número de serie y modelo:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_03" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Foto del AP donde se observe serie y MAC:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_04" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen panorámica de la ubicación final AP:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_05" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen donde se aprecie que está conectado el dispositvo a la red:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_06" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Imágen de prueba Speed Test:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_07" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 01:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_08" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 02:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_09" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 03:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_10" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 04:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_11" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 05:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_12" type="text">
								</div>
							</div>
						</div>
					
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 06:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_13" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 07:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_14" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 08:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_15" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 09:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_16" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 10:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_17" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Evidencia de navegación 11:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_18" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Carta de aceptación:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_acep" type="text">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Carta responsiva de instalación:</label>
								<div class="controls">
									<input class="form-control" name="rphoto_res" type="text">
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
						<button type="submit" class="btn btn-success">Aceptar</button>
					</div>
				</div>
			</div>
		</form>	
	</div>		<!-- container -->
	
	<?php else : ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<a class="btn btn-success" href="update.php?idOrden=<?php echo $id_orden ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a class="btn btn-danger" href="delete.php?idOrden=<?php echo $id_orden ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				</div>
			</div>
		</div>
		
		<div class="space"></div>
		
		<div class="row">
			<div class="col-md-12">
					  
				<!-- PORTADA -->
				
				<div class="table-responsive">
				
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id Sitio</th>
								<th>Direccion Domicilio</th>
								<th>Latitud inicial</th>
								<th>Longitud inicial</th>
								<th>Enlace Google</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <?php echo $result_user['num_ot']; ?> </td>
								<td> <?php echo $result_portada['domicilio_llegada']; ?> </td>
								<td> <?php echo $result_portada['latitud_llegada']; ?> </td>
								<td> <?php echo $result_portada['longitud_llegada']; ?> </td>
								<td> <?php echo $result_portada['egoogle_llegada']; ?> </td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<!-- DIAGRAMA -->
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Componente</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Número de serie</th>
								<th>MAC</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($result_diagramas_a as $row)
								echo	"<tr>
                                            <td> {$row['tipo_conector']} </td>
											<td> {$row['rack']} </td>
											<td> {$row['odf']} </td>
											<td> {$row['hilo']} </td>
                                            <td> {$row['conector']} </td>
										</tr>";
										
							?>
						</tbody>
					</table>
				</div>
					
				<!-- TENDIDO -->
				
			
				<div class="table-responsive">
				
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id Sitio</th>
								<th>Observaciones</th>
								<th>Latitud AP</th>
								<th>Longitud AP</th>
								<th>Aceptación</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <?php echo $result_user['num_ot']; ?> </td>
								<td> <?php echo $result_salida['notes']; ?> </td>
								<td> <?php echo $result_salida['latitud_salida']; ?> </td>
								<td> <?php echo $result_salida['longitud_salida']; ?> </td>
								<td> <?php echo $result_salida['rphoto_acep']; ?> </td>
							</tr>
						</tbody>
					</table>
				</div>
	
			</div>
        </div>
    </div>
	<?php endif; ?>
  </body>
</html>


