$(function(){
	$('#form_ot').submit(function(e){
		var numbers = $('.number-value');

		loop:
		for(var i = 0; i < numbers.length; i++) {
			var number = $(numbers[i]);
			
			if (number.val() && !$.isNumeric(number.val())) {
				e.preventDefault();
				
				$.gritter.add({
					title: "Error",
					text: "El campo " + number.closest('.control-group').find('.control-label').text() + " debe ser num\xe9rico" ,
					fade: true,
					time: 1500,
					speed: "fast"
				});
				
				number.attr("data-toggle", "popover");
				number.attr("data-trigger", "focus");
				number.attr("data-content", "Campo num\xe9rico!");
				number.popover('show');
				
				setTimeout(function(){
					number.popover('destroy');
					number.removeAttr("data-toggle");
					number.removeAttr("data-trigger");
					number.removeAttr("data-content");
				}, 2000);
								
				break loop;
			}
		}			
	});
	
	
	
	$('#new_hilo_conector').on('click', function(){
		
		var section = $('#hilo_conector_zone');
		var data_rows = parseInt(section.attr("data-rows")) + 1;
		var row = $("<div class='row space-between-rows'></div>");
		var deletebtn = $("<div class='col-md-1'><a class='btn btn-danger btn-row-margin btn-delete-hilo-row'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>");
		var container = "<div class='col-md-3'><div class='control-group'><label class='control-label'></label><div class='controls'></div></div></div>";
		
		var num_hilo = $(container);
		var num_conector = $(container);
		var tipo_conector = $(container);
		
		num_hilo.find('.control-label').text("N\xfamero de hilo");
		num_hilo.find('.controls').append($("<input class='form-control number-value' name='num_hilo_" + data_rows + "' type='text'>"));
		
		num_conector.find('.control-label').text("N\xfamero de conector");
		num_conector.find('.controls').append($("<input class='form-control number-value' name='num_conector_" + data_rows + "' type='text'>"));
		
		tipo_conector.find('.control-label').text("Tipo de conector");
		tipo_conector.find('.controls').append($("<input class='form-control' name='tipo_conector_" + data_rows + "' type='text'>"));		
		
		row.append(num_hilo);
		row.append(num_conector);
		row.append(tipo_conector);
		row.append(deletebtn);
		
		section.prepend(row);
		section.attr("data-rows", data_rows);
		$('#rows-hilo-input').val(data_rows);
		
		delete_row(deletebtn, '.row.space-between-rows');
	
	});
	
	
	$('#new_tendido').on('click', function(){
		var section = $('#tendido_zone');
		var data_rows = parseInt(section.attr("data-rows")) + 1;
		var container_external = $("<div class='tendido-row'></div>");
		var container_row = "<div class='row space-between-rows'></div>";
		var deletebtn = $("<div class='col-md-offset-1 col-md-1'><a class='btn btn-danger btn-row-margin btn-delete-tendido-row'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>");
		var container = "<div class='col-md-2'><div class='control-group'><label class='control-label'></label><div class='controls'></div></div></div>";
		var container_area = "<div class='col-md-4'><div class='control-group'><label class='control-label'></label><div class='controls'></div></div></div>";
		
		var row1 = $(container_row);
		var row2 = $(container_row);
		var row3 = $(container_row);
		
		var tipo = $(container);
		var id_tendido = $(container);
		var long_sig_apo = $(container);
		var distancia_acumulada = $(container);
		var latitud = $(container);
		
		var secuencia1 = $(container);
		var secuencia2 = $(container);
		var cruceta = $(container);
		var postes_nuevos = $(container);
		var mufa_nueva = $(container);
		var reformado = $(container);
		
		var tensores_figura_8 = $(container);
		var suspension = $(container);
		var longitud = $(container);
		var instalacion_de_brazo = $(container);
		var nota = $(container_area);
		
		
		tipo.find('.control-label').text("Tipo");
		tipo.find('.controls').append($("<input class='form-control' name='tipo_" + data_rows + "' type='text'>"));
		
		id_tendido.find('.control-label').text("ID");
		id_tendido.find('.controls').append($("<input class='form-control number-value' name='id_en_tendido_" + data_rows + "' type='text'>"));
		
		long_sig_apo.find('.control-label').text("Longitud apoyo");
		long_sig_apo.find('.controls').append($("<input class='form-control number-value' name='long_sig_apo_" + data_rows + "' type='text'>"));
		
		distancia_acumulada.find('.control-label').text("Distancia acumulada");
		distancia_acumulada.find('.controls').append($("<input class='form-control number-value' name='distancia_acumulada_" + data_rows + "' type='text'>"));
		
		latitud.find('.control-label').text("Latitud");
		latitud.find('.controls').append($("<input class='form-control' name='latitud_" + data_rows + "' type='text'>"));
		
		secuencia1.find('.control-label').text("Secuencia 1");
		secuencia1.find('.controls').append($("<input class='form-control number-value' name='secuencia1_" + data_rows + "' type='text'>"));
		
		secuencia2.find('.control-label').text("Secuencia 2");
		secuencia2.find('.controls').append($("<input class='form-control' name='secuencia2_" + data_rows + "' type='text'>"));
		
		cruceta.find('.control-label').text("Cruceta");
		cruceta.find('.controls').append($("<input class='form-control' name='cruceta_" + data_rows + "' type='text'>"));
		
		postes_nuevos.find('.control-label').text("Postes Nuevos");
		postes_nuevos.find('.controls').append($("<input class='form-control' name='postes_nuevos_" + data_rows + "' type='text'>"));
		
		mufa_nueva.find('.control-label').text("Mufa Nueva");
		mufa_nueva.find('.controls').append($("<input class='form-control' name='mufa_nueva_" + data_rows + "' type='text'>"));
		
		reformado.find('.control-label').text("Reformado");
		reformado.find('.controls').append($("<input class='form-control' name='reformado_" + data_rows + "' type='text'>"));
		
		tensores_figura_8.find('.control-label').text("Tensores figura 8");
		tensores_figura_8.find('.controls').append($("<input class='form-control number-value' name='tensores_figura_8_" + data_rows + "' type='text'>"));
		
		suspension.find('.control-label').text("Suspensi\xf3n");
		suspension.find('.controls').append($("<input class='form-control' name='suspension_" + data_rows + "' type='text'>"));
		
		longitud.find('.control-label').text("Longitud");
		longitud.find('.controls').append($("<input class='form-control' name='longitud_" + data_rows + "' type='text'>"));
		
		instalacion_de_brazo.find('.control-label').text("Instalaci\xf3n de brazo");
		instalacion_de_brazo.find('.controls').append($("<input class='form-control' name='instalacion_de_brazo_" + data_rows + "' type='text'>"));
		
		nota.find('.control-label').text("Nota");
		nota.find('.controls').append($("<input class='form-control' name='nota_" + data_rows + "' type='text'>"));
		
		row1.append(tipo);
		row1.append(id_tendido);
		row1.append(long_sig_apo);
		row1.append(distancia_acumulada);
		row1.append(latitud);
		row1.append(deletebtn);
		
		row2.append(secuencia1);
		row2.append(secuencia2);
		row2.append(cruceta);
		row2.append(postes_nuevos);
		row2.append(mufa_nueva);
		row2.append(reformado);
		
		row3.append(tensores_figura_8);
		row3.append(suspension);
		row3.append(longitud);
		row3.append(instalacion_de_brazo);
		row3.append(nota);
		
		container_external.prepend(row3);
		container_external.prepend(row2);
		container_external.prepend(row1);
		
		section.prepend(container_external);
		section.attr("data-rows", data_rows);
		$('#rows-tendido-input').val(data_rows);
		
		delete_row(deletebtn, '.tendido-row')
	});
	
	
	delete_row($('.btn-delete-tendido-row'), '.tendido-row');
	delete_row($('.btn-delete-hilo-row'), '.row.space-between-rows');
	
	function delete_row(btn, zone) {
		$(btn).on('click', function(){
			var row = $(this).closest(zone);
			row.remove();
		});
	}
	
});