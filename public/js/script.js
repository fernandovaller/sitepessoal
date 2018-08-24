$(document).on('click', '.menu', function(event) {
	event.preventDefault();
	var pagina = $(this).attr('href').replace('#', '');
	$('.nav-item').removeClass('active');
	$(this).parent().addClass('active');
	console.log(pagina);
	$.get('/' + pagina, {controller:'paginas'}, function(data) {
		$('#paginas').html(data);	
	});
});