<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible"
	content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
	<title>AT-WFM - Lista</title>
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<link rel="shortcut icon" href="img/itop-logo-external.png" type="image/png">
	

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
		@media (max-width: 600px) {
			.title {
				font-size: 18px;
    			margin: 0 16px;
			}

			
		}
	</style>
</head>
 
<body>
    	
	<?php
		include 'database.php';
	   
	   
		$pdo = Database::connect();

		if (!session_id()){
			@ session_start();
		}
		$user = @$_SESSION['AT-WFM-MX-AUTH'];

		if (isset($user)) {
		} else {
			header("Location: login.html");
			exit();
		}

		function utf8ize($d) {
		    if (is_array($d)) {
		        foreach ($d as $k => $v) {
		            $d[$k] = utf8ize($v);
		        }
		    } else if (is_string ($d)) {
		        return utf8_encode($d);
		    }
		    return $d;
		}
				
		$sql_user = "SELECT * FROM ticket WHERE operational_status <> 'closed' and agent_id = '" . $user["contactid"] ."' order by ref desc";
		//$sql_user = "SELECT * FROM view_userrequest WHERE status <> 'closed' and agent_id = '38' order by num_ot asc";
		//$sql_user = "SELECT * FROM view_userrequest WHERE status <> 'closed' and ref = 'R-000451' order by num_ot asc";
		//$sql_user = "SELECT * FROM view_userrequest WHERE status <> 'closed'  order by num_ot asc";

		
		$query_user = $pdo->prepare($sql_user);
		$query_user->execute();
		$tickets = $query_user->fetchall(PDO::FETCH_ASSOC);

		$contact = "SELECT * FROM contact WHERE id = '" . $user["contactid"] ."'";
		$contact = $pdo->prepare($contact);
		$contact->execute();
		$contact = $contact->fetch(PDO::FETCH_ASSOC);

		$person = "SELECT * FROM person WHERE id = '" . $user["contactid"] ."'";
		$person = $pdo->prepare($person);
		$person->execute();
		$person = $person->fetch(PDO::FETCH_ASSOC);

		




		// var_dump($sql_user);
		// var_dump($user);
		
	?>
	
	<div class="container">

		<?php include 'navbar.php'; ?>

		<div class="row align-center">
			<h2 class="title"><b>Carga de datos OTs<br><?=  $person["first_name"]  ?> <?=  $contact["name"]  ?></b></h2>
		</div>

		<div class="top-line-gray"></div>
	

		<h3>Asignaciones (<?= count($tickets) ?>)</h3>

		 
	  			
			
				<div class="table-responsive">
				
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Acciones</th>
								<th># Orden</th>
								<!-- <th># Orden</th> -->
								<th>Fecha de ejecución</th>
								<th>Cliente</th>
								<!-- <th>Grupo</th> -->
								<!-- <th>Asignado a</th> -->
								<!-- <th>Asignado a</th> -->
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($tickets as $key => $ticket):?>

								<?php 
									$sql_user = "SELECT * FROM ticket_request WHERE id = '" . $ticket["id"] ."'";
									$query_user = $pdo->prepare($sql_user);
									$query_user->execute();
									$fecha = $query_user->fetch(PDO::FETCH_ASSOC);
								 ?>
							<tr>
								<td> <a class="btn btn-primary" href="index.php?idOrden=<?= $ticket['id']; ?>">abrir</a> </td>
								<td> <?= utf8ize($ticket['ref']); ?> </td>
								<!-- utf8ize($ticket['num_ot']); -->
								<td> <?= $fecha['fecha_ejecucion']; ?> </td>
								<td> <?= utf8ize($fecha['nom_cliente']); ?> </td>
								<!--<td> <?= $ticket['operational_status']; ?> </td>-->
								<td> <?= $fecha['status']; ?> </td>
							</tr>
							<?php endforeach;?>

						</tbody>
					</table>
				</div>
	
    </div>
  </body>
</html>


