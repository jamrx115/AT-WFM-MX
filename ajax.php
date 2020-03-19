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

	// it is checking if the request is an ajax request 
    if ( !empty($_POST)) { 
         
        // starting database 
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$action = $_POST['action'];


		if ($action == 'query_services') {


			$service_id = $_POST['service_id'];
			$service_request = $_POST['service_request'];


			$sql = 'SELECT * FROM ServiceSubcategory  WHERE service_id = '. $service_id .' AND request_type = "'. $service_request .'" AND status != "obsolete"';
	       
			$query = $pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);

			echo json_encode($result);
	        Database::disconnect();

        }
    }
