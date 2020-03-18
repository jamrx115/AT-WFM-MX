<style type="text/css">
	.logo {
		width: 154px;
    	margin-top: 7px;
	}
	.container {
		margin-top: 70px;
	}
</style>

<?php  $user = @$_SESSION['AT-WFM-MX-AUTH']; ?>

<nav class="navbar navbar-default navbar-fixed-top">
 	<div class="container-fluid">
	    <div class="navbar-header">
	    	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>

	    	<img src="img/itop-logo-external.png" class="logo">
	    </div>
 	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href="#"><?=  $user["login"]  ?></a></li>
	    	 <li><a href="list.php">Listado de ordenes</a></li>
	        <li><a href="logout.php">Salir</a></li>
	    </ul>
  	</div>
</nav>
