var tendido = 0; 

function localize(num)
{
	tendido = num;
	
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(mapa,error);		
	}
	else
	{
		alert('Tu navegador no soporta geolocalizacion.');
	}
}

function mapa(pos)
{
	var latitud = pos.coords.latitude;
	var longitud = pos.coords.longitude;
	var precision = pos.coords.accuracy;
	document.getElementById("latitud_a_" + tendido).value=latitud;
	document.getElementById("latitud_b_" + tendido).value=longitud;
	id_orden=document.getElementById("id_orden").value;
	tipo=2;
	$.get('/AT-WFM/venta/guarda_fecha.php',{id:id_orden,lat:latitud,lon:longitud,tipo:tipo},alert("ok"));
}

function error(errorCode)
{
	if(errorCode.code == 1)
		alert("No has permitido buscar tu localizacion")
	else if (errorCode.code==2)
		alert("Posicion no disponible")
	else
		alert("Ha ocurrido un error")
}