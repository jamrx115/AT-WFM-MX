<?php

// insertado de update


session_start();
ob_start();
$_SESSION['Order'] =$_GET["id_orden"];
$_id_orden =$_GET["id_orden"];
$_SESSION['im'] =$_GET["im"];

//echo "Order:".$_SESSION['Order']."<br>";
//echo "Imagen:".$_SESSION['im']."<br>";


?>
<!DOCTYPE html>
<html lang="es">

<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Tomar foto</title>
	<link href="css/photo.css" type="text/css" rel="stylesheet" media="">
	<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
   
	<style>
		@media only screen and (max-width: 700px) {
			video {
				max-width: 100%;
			}
		}
	</style>

</head>

<body>
 <div class="row space-between-rows">
	<div class="col-md-10">
		<div class="control-group">
			<h4><b>Selecciona un dispositivo</b></h4>
				<div class="controls">
					<select class='form-control' name="listaDeDispositivos"  id="listaDeDispositivos"></select>
					<button class="btn btn-success" id="boton">Tomar foto</button>
					<button class="btn btn-success" id="back" onclick="history.back(2)">Regresar</button>
                </div>
		</div>
	</div>
</div>	

<div>


	
	</div>
	<FORM>
	<!--<INPUT TYPE="button" VALUE="Volver" onClick="history.back(2)">-->
	
	</FORM>
	
	<div>
	<p id="estado"></p><span id="copyAnswer"></span>
	<!--<textarea id="textarea" rows="6" cols="40">Texto que queremos copiar al portapapeles!</textarea><br/>-->
	 <br>
	 <!--<button id="copyBlock">Click para copiar</button>-->
	  
	 
    
	</div>
	
	

		<!--<select name='select' style="width:200px">
		  <option value='value1'>Value 1</option> 
		  <option value='value2' selected>Value 2</option>
		  <option value='value3'>Value 3</option>
		</select>
		-->	
	</div>

	
	<br>
	<video muted="muted" id="video"></video>
	<canvas id="canvas" style="display: none;"></canvas>
</body>
<script src="js/script_photo.js"></script>
<script language="JavaScript"> </script>
</html>