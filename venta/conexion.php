<?php



function conexion(){



 $con = mysql_connect("alltic.co","itop","itop2019");



 if (!$con){



  die('Could not connect: ' . mysql_error());

 }



 mysql_select_db("ejemplos", $con);



 return($con);



}



?>