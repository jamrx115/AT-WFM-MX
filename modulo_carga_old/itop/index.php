<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	
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
					FROM view_UserRequest
					WHERE id = " . $id_orden;
					
		$sql_status = "SELECT *
						FROM vw_ValidaEstado
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
		<div class="row align-center">
			<h2><b>Carga de datos Orden/Sitio número: <?php echo $result_user['num_ot']; ?></b><input name="id_orden" id="id_orden" type="hidden" value="<?php echo $id_orden ?>"></h2>
		</div>
	</div>
	
	<div class="top-line-gray"></div>
	
	<div class="container">
		<div class="row" style="margin-bottom: 15px;">
			<p>
		  <ul class="list-none-style"><li><table width="1210" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="424">
                <div align="left">
                 <ul class="list-none-style">
                    <li>Cliente: <b><?php echo $result_user['nom_cliente']; ?></b></li>
                    <li>Fecha de ejecución: <b><?php echo $result_user['fecha_ejecucion']; ?></b></li>
                    <li>Grupo: <b><?php echo $result_user['team_id_friendlyname']; ?></b></li>
                    <li>Responsable orden: <b><?php echo $result_user['agent_id_friendlyname']; ?></b></li>
                  </ul>
              </div></td>
            </tr>
            </table>
			</li></ul>
			</p>
		</div>
	</div>
	
	<?php if(empty($result_portada)) : ?>
	
	<div class="container">
	
		<form id="form_ot" action="create.php?idOrden=<?php echo $id_orden; ?>" method="post">	
			
			<ul class="nav nav-tabs">
				<li class="active"><a  data-toggle="tab" href="#seccion_portada">Llegada</a></li>
				<li><a  data-toggle="tab" href="#seccion_diagrama">Instalación</a></li>
				<li><a  data-toggle="tab" href="#seccion_tendido">Salida</a></li>
			</ul>
			<div class="space"></div>
			<div class="tab-content" style="overflow: hidden;">
				<div id="seccion_portada" class="tab-pane fade in active">

				<div class="row space-between-rows">
						<div class="col-md-10">
							<div class="control-group">
								<label class="control-label">Registro de llegada</label>
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
								<label class="control-label">Domicilio Original:</label>
								<div class="controls">
									<input class="form-control" name="domicilio_llegada" type="text">
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
								<h4><b>Equipamiento C5</b></h4>
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
												<option selected>Cámara</option><option>Sirena(Alerta Auditiva)</option><option>Botón de Pánico</option><option>Estrobo (Alerta Visual)</option><option>Grabador</option>
											</select>
										</div>
									</div>
								</div>	
								<div class="col-md-2">
									<div class="control-group">
										<label class="control-label">Instalado?</label>
										<div class="controls">
											<select class="form-control" name="conector_a_1">
												<option selected>Fachada</option><option>Poste</option><option>No instalado</option>
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
							</div>
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
								<label class="control-label">ID de sitio:</label>
									<div class="controls">
										<input class="form-control" name="idsitio" type="text" value="<?php echo $result_user['num_ot']; ?>" readonly="readonly">
									</div>
							</div>
					   </div>
				
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Domicilio final:</label>
								<div class="controls">
									<input class="form-control" name="domicilio_salida" type="text">
								</div>
							</div>
						</div>
				
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Latitud salida</label>
								<div class="controls">
									<input class="form-control number-value" id="latitud_mxs" name="latitud_salida" type="text"  value="<?php echo"0.0000"?>">
								</div>
							</div>
						</div>
			
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Longitud salida</label>
								<div class="controls">
									<input class="form-control number-value" id="longitud_mxs" name="longitud_salida" type="text" value="<?php echo"0.0000"?>">
								</div>
							</div>
						</div>
			
						<div class="col-md-4">
							<div class="control-group">
								<label class="control-label">Liga de google</label>
								<div class="controls">
									<input class="form-control" name="egoogle_salida" type="text">
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
								<th>Tipo Componente</th>
							    <th>Tipo Instalación</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Número de serie</th>

							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($result_diagramas_a as $row)
								echo	"<tr>
                                            <td> {$row['tipo_conector']} </td>
											<td> {$row['conector']} </td>
											<td> {$row['rack']} </td>
											<td> {$row['odf']} </td>
											<td> {$row['hilo']} </td>
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
								<th>Direccion final</th>
								<th>Latitud salida</th>
								<th>Longitud Salida</th>
								<th>Enlace Google salida</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <?php echo $result_user['num_ot']; ?> </td>
								<td> <?php echo $result_salida['domicilio_salida']; ?> </td>
								<td> <?php echo $result_salida['latitud_salida']; ?> </td>
								<td> <?php echo $result_salida['longitud_salida']; ?> </td>
								<td> <?php echo $result_salida['egoogle_salida']; ?> </td>
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


