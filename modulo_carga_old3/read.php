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



    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM portada where id_portada = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
    <?php include 'navbar.php'; ?>
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Leer portada</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">ID Sitio</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['num_ot'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Domicilio de llegada</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['domicilio_llegada'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Latitud de llegada</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['latitud_llegada'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Enlace de google</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['egoogle_llegada'];?>
                            </label>
                        </div>
                      </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>


                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>