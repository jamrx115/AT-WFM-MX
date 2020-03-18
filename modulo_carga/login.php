<?php
     
	

 
if ( !empty($_POST)) {
    require 'database.php';

		//Datos Portada
		//
		$username = $_POST['user'];
		$password = $_POST['pass'];
        	
		
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM `priv_user` where login = '".$username."' and status = 'enabled'";

		$result = $pdo->query ($sql   ) or die ( print_r ( $pdo->errorInfo (), true ) );
		
		$models = $result->fetchall ();

		$response = array();


		
		if (isset($models[0])) {

			$user = $models[0];
			

			$sql2 = "SELECT * FROM `priv_user_local` where id = '".$user['id']."'";

			$result2 = $pdo->query ($sql2   ) or die ( print_r ( $pdo->errorInfo (), true ) );
			
			$pass = $result2->fetchall ();


			if (isset($pass[0])) {

				$pass = $pass[0];
				

				$hash = hash('sha256', $pass['password_salt'].$password);
				
				if ($pass['password_hash'] == $hash) {
					$response['status'] = 'OK';

						if (!session_id()){
							@ session_start();
						}
						$_SESSION['AT-WFM-MX-AUTH'] = $user;

				} else {
					$response['status'] = 'FAIL';
				}

			} else {
				$response['status'] = 'FAIL';
			}

		} else {
			$response['status'] = 'FAIL';
		}


		echo json_encode($response);

		
		Database::disconnect();
    }
?>