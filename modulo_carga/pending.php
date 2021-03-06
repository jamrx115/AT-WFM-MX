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
	<link   href="css/toast.css" rel="stylesheet">
	<script src="js/myeffectsmx.js"></script>
    <script src="js/localizemx.js"></script>
    <script src="js/hammer.min.js"></script>
    <script src="js/toast.js"></script>

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

		// var_dump( $_POST );


		include 'database.php';
	   
		$id_orden = $_GET['idOrden'];
	   
		$pdo = Database::connect();
				
		$sql_status = "SELECT *	FROM vw_validaestado WHERE id= " . $id_orden;
		$query_status = $pdo->prepare($sql_status);
		$query_status->execute();
		$result_status = $query_status->fetch(PDO::FETCH_ASSOC);

		if(empty($result_status)) {
			header("Location: closedot.html");
		}


		$sql_user = "SELECT * FROM view_userrequest WHERE id = " . $id_orden;
		$sql_user = $pdo->prepare($sql_user);
		$sql_user->execute();
		$result_user = $sql_user->fetch(PDO::FETCH_ASSOC);	
		// var_dump($result_user);


		/* Almacenar la solución */
		if (isset($_POST['attr_tipo_pendiente'])) {

			$fec_ = date_default_timezone_set('America/Bogota');

			$attr_tipo_pendiente = $_POST['attr_tipo_pendiente'];
			
			
			$sql_update = "UPDATE `ticket_request` SET `status` = 'pending', last_pending_date = '". date("Y-m-d H:i:s")."', `tipo_pendiente` = ".$attr_tipo_pendiente.", `pending_reason` = '" . $_POST['reason'] ."' WHERE `ticket_request`.`id` =" . $id_orden;
			// echo "$sql_update";
			$sql_update = $pdo->prepare($sql_update);
			$sql_update->execute();
			
			echo "<script type='text/javascript'>toast('La orden se marcó como Pendiente', 4000);setTimeout(function() { location.href = 'list.php' }, 3000);</script>";

		}
	?>

	
	
	<div class="container">
		<?php include 'navbar.php'; ?>
		
		<div class="row align-center">
			<h2><b>Marcar como Pendiente Orden/Sitio número: <?php echo $result_user['num_ot']; ?></b><input name="id_orden" id="id_orden" type="hidden" value="<?php echo $id_orden ?>"></h2>
		</div>
	</div>

	<div class="top-line-gray"></div>


	
	<div class="container">
		<button type="button" class="btn btn-default" onclick="javascript:history.back(2)">Atrás</button>
		<br>
		<br>

		<form method="post" action="pending.php?idOrden=<?=  $id_orden ?>" >
			<!-- step-1 -->
			<div class="form-group">
				<label class="subtitle">Tipo Pendiente *</label>
				<select class="form-control" required="required" title="" name="attr_tipo_pendiente" id="att_0">
					<option value="">-- Seleccione uno --</option>
					<option value="1">Falta Recurso Físico</option>
					<option value="2">Falta Recurso Humano</option>
				</select>
			</div>	
		

			<!-- step-3 -->
			<div class="form-group">
				<label class="subtitle">Motivo Pendiente *</label>

				<textarea required="required" class="form-control" rows="5" name="reason"></textarea>
				<br>
				<br>

				<button type="submit" class="btn btn-success btn-block">Guardar</button>
				<br>
				<button type="button" class="btn btn-default btn-block" onclick="javascript:history.back(2)">Cancelar</button>
				<br>

			</div>	

	</form>

	</div>


  </body>
</html>


