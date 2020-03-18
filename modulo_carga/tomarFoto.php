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
   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	<script src="js/ImageProcesor.js"></script>
	<style>
		@media only screen and (max-width: 700px) {
			video {
				max-width: 100%;
			}
		}
	</style>

</head>

<body>

	<div class="container">
		 <div class="row space-between-rows">
			<div class="col-md-10">
				<div class="control-group">
					<h4><b>Selecciona un dispositivo</b></h4>

						<div class="controls">
							<select class='form-control' name="listaDeDispositivos"  id="listaDeDispositivos"></select>

							<br>
							<input type="file" name="" accept="image/*" id="inputImage">

							<button class="btn btn-primary" id="botonImg">Seleccionar foto</button>
							<button class="btn btn-success" id="boton">Tomar foto</button>
							<button class="btn btn-default" id="back" onclick="history.back(2)">Regresar</button>
		                </div>
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

<script type="text/javascript">

	let change = function(event) {
	   	
		let file = event.target.files[0]
		var reader = new FileReader();
    
	    reader.onload = (e)=> {
	  
	        var imageData =  e.target.result;
	        event.target.value = ''

	       	console.log('imageData', imageData)


	       	 ImageProcesor.base64( imageData, 600).then((data)=>{
		           
		       	fetch("./save_photo.php", {
		            method: "POST",
		            body: encodeURIComponent(data),
		            headers: {
		                "Content-type": "application/x-www-form-urlencoded",
		            }
		        })
		        .then(resultado => {
		            // A los datos los decodificamos como texto plano
		            return resultado.text()
		        })
		        .then(nombreDeLaFoto => {
		            // nombreDeLaFoto trae el nombre de la imagen que le dio PHP
		            var $nombrefoto=nombreDeLaFoto;
		            $('#estado').html(`La Foto guardada con éxito. Puedes verla <a target='_blank' href='photos/${nombreDeLaFoto}'> aquí</a>`)
		            $('#ruta').html('<strong>Nombre del archivo:</strong>' + $nombrefoto)
		        })
	         })

	    }

		reader.readAsDataURL(file); 
	}

	$('#inputImage').on('change', change);
	$('#botonImg').on('click', ()=>{ $('#inputImage').click()});

</script>


</html>