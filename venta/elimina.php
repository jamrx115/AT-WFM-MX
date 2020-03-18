<?php
	require_once("funciones.php");
	$id_orden = $_POST['id_orden'];
	$id_venta = $_POST['id_venta'];
	
	$valores = EliminaCostos($id_venta);
	    include 'database.php'; 
		$con = Database::connect();
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("set names utf8");	
		$datos = $con->query('select * from `VW_COSTO_OT` where id_orden='.$id_orden);?>
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


