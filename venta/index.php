<!doctype html>
<html>
<head>
    <meta charset="UTF-8">  
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
    
	<link   href="js/Gritter-master/css/jquery.gritter.css" rel="stylesheet">
	<script src="js/Gritter-master/js/jquery.gritter.js"></script>
	

	<script src="js/myeffects.js"></script>
	<script src="js_local.js"></script>
	<script>

$(document).ready(function(){

  $("button").click(function(){

  	$("#myDiv").show();//muestra el div
	
    n=$("#box").val();
  $tipo_trabajo = $("#tipo_trabajo").val();
	$cantidad=$("#cantidad").val();
    $total=$("#total").val();
	$id_orden=$("#ot").val();

    $.ajax({url:"guardar.php",
			cache:false,
			type:"POST",
			data:{"id_orden": $id_orden,"tipo_trabajo": $tipo_trabajo,"cantidad": $cantidad,"total": $total},
			success:
			function(result){
		    	 
     			 $("#myDiv").html(result);}
		  });

   });


  

  

});
function Elimina($venta,$orden)
{
 $.ajax({url:"elimina.php",
			cache:false,
			type:"POST",
			data:{"id_orden": $orden,"id_venta": $venta},
			success:
			function(result){
		    	 
     			 $("#myDiv").html(result);}
		  });
 
}

</script>
</head>
<body>
	
		<?php  include 'database.php'; 
		$con = Database::connect();
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("set names utf8");	
		$id_orden=$_GET['idOrden']; ?>
   <input type="hidden" id="ot" name="ot" value="<?php echo $id_orden ?>"/>
		<div class="row align-center">
			<h2 align="center"><b>VALOR VENTA ORDEN DE TRABAJO NUMERO <?php echo $id_orden; ?></b></h2>
		</div>
	</div>
  </div>
		<ul class="m-list">
			<li><span>Tipo Actividad </span><br>
			  <?php
		
		$datos = $con->query('select id_valores as id,item as Tipo from valores_trabajo order by id ASC');
		echo "<select  style='width:100%' id='tipo_trabajo' name='tipo_trabajo' onChange='buscarValores()'>";
		echo "<option value=0 selected=selected>...........Seleccione...............</option>";
		foreach($datos as $row)
			{
				echo "<option value=".$row[0].">".$row[1]."</option>";
			}
		echo "</select>";
		
?></li>
			  <li><span>Precio Actividad</span><br>
			  <input  type="text"  name="valor" id="valor" value=""  style="width:100%"></li>
			<li><span>Cantidad</span><br><label for="points"></label><input type="range" name="cantidad" id="cantidad" value="0" min="0" max="100" onChange="Cambio(this.value)" ></input>
  <script>
    $(":range").rangeinput();
  </script></li>
			<li><span>Total</span><br><input type="text" value="0" id="total" name="total"  style="width:100%"></li>
		</ul>
<button>Agregar</button>

	</div><div id="resultado"></div>
	<div id="myDiv">

<div class="table-responsive">
					<table id='valores' class="table table-bordered table-striped">
						<thead>
							<tr>								
								<th>Item</th>
								<th>Valor</th>
								<th>Cantidad</th>
								<th>Precio Venta</th>
								
							</tr>
						</thead>
						<?php
						$sum=0;
						$datos2 = $con->query('select * from `VW_COSTO_OT` where id_orden='.$id_orden);
						foreach($datos2 as $row2)
								{
								$sum =$sum + $row2[5];
						?>
						<tbody>
							<tr>
								<td> <?php echo $row2[2]; ?> </td>
								<td> <?php echo $row2[3]; ?> </td>
								<td> <?php echo $row2[4]; ?> </td>
								<td> <?php echo $row2[5]; ?> </td>
								<td><a  class="btn btn-danger" onClick = "Elimina(<?php echo $row2[0].','.$row2[1]?>);"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>								
							</tr>
						</tbody>
						<?php }?>
						<tr><h2>Total: Q<?php echo  $sum;?></h2></tr>
					</table>
				</div>
</div>
</body>	
</html>
