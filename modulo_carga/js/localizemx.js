var tipo = 0; 

function localizemx(num)
{
	tipo=num
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
	
	if (tipo == 1)
	{	
		document.getElementById("latitud_mx").value=latitud;
		document.getElementById("longitud_mx").value=longitud;
		alert('Tus coordenadas de inicio son:'+ latitud + '' +longitud);
	}
	if (tipo == 2)
	{	
		document.getElementById("latitud_mxs").value=latitud;
		document.getElementById("longitud_mxs").value=longitud;
		alert('Tus coordenadas de salida son:'+ latitud + '' +longitud);
	}
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