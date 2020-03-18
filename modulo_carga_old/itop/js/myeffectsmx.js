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
	
	nodo("a");

	function nodo(nodo) {

		$('#new_nodo_' + nodo).on('click', function(){
			var section = $("#nodo_" + nodo + "_zone");
			var data_rows = parseInt(section.attr("data-rows")) + 1;
			var container_row = $("<div class='row space-between-rows'></div>");
			var deletebtn = $("<div class='col-md-offset-1 col-md-1'><a class='btn btn-danger btn-row-margin btn-delete-nodo-" + nodo + "-row'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>");
			var container = "<div class='col-md-2'><div class='control-group'><label class='control-label'></label><div class='controls'></div></div></div>";
			
			var rack = $(container);
			var odf = $(container);
			var id_diagrama = $(container);
			var conector = $(container);
			var tipo_conector = $(container);
			
			tipo_conector.find('.control-label').text("Tipo Componente");
			tipo_conector.find('.controls').append($("<select class='form-control' name='tipo_conector_" + nodo + "_" + data_rows + "'><option selected>Cámara</option><option>Sirena(Alerta Auditiva)</option><option>Botón de Pánico</option><option>Estrobo (Alerta Visual)</option><option>Grabador</option></select>"));
			
			conector.find('.control-label').text("Instalado?");
			conector.find('.controls').append($("<select class='form-control' name='conector_" + nodo + "_" + data_rows + "'><option selected>Fachada</option><option>Poste</option><option>No instalado</option></select>"));

			rack.find('.control-label').text("Marca");
			rack.find('.controls').append($("<input class='form-control' name='rack_" + nodo + "_" + data_rows + "' type='text'>"));
			
			odf.find('.control-label').text("Modelo");
			odf.find('.controls').append($("<input class='form-control' name='odf_" + nodo + "_" + data_rows + "' type='text'>"));
			
			id_diagrama.find('.control-label').text("Número de serie");
			id_diagrama.find('.controls').append($("<input class='form-control' name='id_en_diagrama_" + nodo + "_" + data_rows + "' type='text'>"));
			

			container_row.append(tipo_conector);
			container_row.append(conector);
			container_row.append(rack);
			container_row.append(odf);
			container_row.append(id_diagrama);

			container_row.append(deletebtn);
			
			section.prepend(container_row);
			section.attr("data-rows", data_rows);
		    $('#rows-nodo-' + nodo + '-input').val(data_rows);
			
			delete_row(deletebtn, '.row.space-between-rows')
		});
	}
	
	delete_row($('.btn-delete-nodo-a-row'), '.row.space-between-rows')
	
	function delete_row(btn, zone) {
		$(btn).on('click', function(){
			var row = $(this).closest(zone);
			row.remove();
		});
	}
	
});