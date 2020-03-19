<?php
    require 'database.php';
	
	if (!session_id()){
		@ session_start();
	}
	$user = @$_SESSION['AT-WFM-MX-AUTH'];

	if (isset($user)) {
	} else {
		header("Location: login.html");
		exit();
	}

	
    if ( !empty($_POST)) {
        // keep track post values
		 $id_orden = $_POST['idOrden'];
         
        
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
		$sql_status = "SELECT status as estado
						FROM  ticket_request
						WHERE id= " . $id_orden;
	
		$query_status = $pdo->prepare($sql_status);
		$query_status->execute();
			
		$result_status = $query_status->fetch(PDO::FETCH_ASSOC);

		if($result_status =='closed') {
			header("Location: closedot.html");
		}
	   
		// delete data
		$sql = "DELETE p, d, t
				FROM portada as p 
					JOIN diagrama_reporte AS d ON (p.id_orden = d.id_orden)
					JOIN salida AS t ON (p.id_orden = t.id_orden)
				WHERE p.id_orden = " . $id_orden;
				
        $q = $pdo->prepare($sql);
        $q->execute(array($id_orden));
        Database::disconnect();
        header("Location: index.php?idOrden=".$id_orden);
         
    }
	else {
		$id_orden = $_GET['idOrden'];
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
		$sql_status = "SELECT status as estado
						FROM  ticket_request
						WHERE id= " . $id_orden;
	
		$query_status = $pdo->prepare($sql_status);
		$query_status->execute();
			
		$result_status = $query_status->fetch(PDO::FETCH_ASSOC);

		if($result_status =='closed') {
			header("Location: closedot.html");
		}
		Database::disconnect();
	}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
    <link  rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link  rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	
	<link   href="css/mystyles.css" rel="stylesheet">

</head>
 
<body>
    <div class="container">
		<?php include 'navbar.php'; ?>
	
		<div class="space"></div>
		
		<div class="col-md-8 col-md-offset-2 box-delete">
			<div class="row align-center">
				<h3><b>ELIMINAR ANEXO DE ORDEN DE TRABAJO EN SITIO</b></h3>
			</div>
			 
			<form class="form-horizontal" action="delete.php" method="post">
				<input type="hidden" name="idOrden" value="<?php echo $id_orden;?>"/>

				<div class="big-bg-classes align-center">
					<p class="bg-danger">¿Está seguro que desea eliminar el anexo de la orden de trabajo?</p>
				</div>
				
				<div class="under-line-gray"></div>
				<div class="space"></div>
			
				<div class="pull-right below-under-line">
					<button type="submit" class="btn btn-danger">Eliminar</button>
					<a class="btn btn-default" href="index.php?idOrden=<?php echo $id_orden ?>">Cancelar</a>
				</div>
			</form>
		</div>       
    </div> <!-- /container -->
  </body>
</html>