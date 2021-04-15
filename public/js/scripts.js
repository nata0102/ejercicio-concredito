var delay = 1000;
var s = $(window).width();
$().ajaxStart(function() {
	$('#loading').show();
	$('#result').hide();
}).ajaxStop(function() {
	$('#loading').hide();
	$('#result').fadeIn('slow');
});


/*AJAX*/
$('#form').submit(function() {
	// Enviamos el formulario usando AJAX
	$.ajax({
		dataType: 'json',
		cache: false,
		type: 'POST',
		url: $(this).attr('action'),
		data: $(this).serialize(),
		// Mostramos un mensaje con la respuesta de PHP
		success:  function(data) {
			$('#form')[0].reset();
			toastr.success(data);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			if(jqXHR.status == 422){
				toastr.error(jqXHR.responseText);
			}
			else{
				toastr.error('¡Oops! Hubo un error al enviar tu mensaje.');
			}
        },
	})
	return false;
});


$(window).on('load',function(){
	$('#status').addClass("display-none");
	$('#preloader').delay(350).addClass("display-none");
	$('body').delay(350).removeClass("overflow-hidden").addClass("overflow");
});

$('#file-button').on('click',function(){
	addRow();
});

function addRow(){
	var tr= '<div class="row">'+
		'<div class="col-5">'+
		'<input type="file" name="file[]" value="" required>'+
		'</div>'+
		'<div class="col-5">'+
		'<div class="form-group">'+
		'<label>Nombre del archivo*</label>'+
		'<input class="form-control" type="text" name="file_alias[]" value="" required>'+
		'</div>'+
		'</div>'+
		'<div class="col-2">'+
		'<a href="#" class="btn btn-danger btn-sm remove"><i class="fa fw fa-trash"></i></a>'+
		'</div>'+
		'</div>';
	$('#content-files').append(tr);
};

$('body').on('click','.remove',function(){
	var l=$('#content-files .row').length;
	if(l==1){
		alert('Debes tener al menos un elemento');
	}
	else{
		$(this).parent().parent().remove();
	}
});

$(document).ready(function() {
	$('#DT').DataTable({
		"pageLength": 50,
		"language": {
			"lengthMenu": "Mostrar _MENU_ registros por pagina",
			"zeroRecords": "No se encontraron resultados en su busqueda",
			"searchPlaceholder": "Buscar registros",
			"info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
			"infoEmpty": "No existen registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"search": "Buscar:",
			"paginate": {
				"first":"Primero",
				"last":"Último",
				"next":"Siguiente",
				"previous":"Anterior"
			},
		}
	});
});

$('.file').on('click',function(){

	var url = $(this).attr('data-url');
	var name = $(this).attr('data-name');
	openWindow(url, name);
});

function openWindow (url, name){
	 window.open(url,name,"width=900,height=800,top=50,left=50")
}
