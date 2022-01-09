$(document).ready(function() {
	
	$(".delete").click(function() {
		let id = $(this).data('id');
		
		$.ajax({
			url: '/gato/delete',
			type: 'POST',
			dataType: 'json',
			data: {
				id
			}
		}).done(function(data) {
			console.error("SALIO TODO BIEN");
		}).fail(function() {
			console.error("SALIO TODO MAL");
		});
	});
	
});
