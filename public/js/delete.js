$(document).ready(function () {

	$(".delete").click(function () {
		let id = $(this).data('id');

		Swal.fire({
			title: '¿Esta seguro?',
			text: `¡Esta apunto de eliminar el gato #${id}!`,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, ¡Borralo!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.isConfirmed) {
				borrarGato(id);
			}
		});
	});

});

function borrarGato(id) {

	$.ajax({
		url: 'delete',
		type: 'POST',
		dataType: 'json',
		data: {
			id
		}
	}).done(function (data) {
		if (data.error == 0) {
			Swal.fire(
				'Eliminado!',
				`El gato #${id} fue eliminado correctamente.`,
				'success'
			).then(() => {
				window.location.reload(true);
			});
		}
		else {
			Swal.fire(
				'Error!',
				'Se produjo un error al intentar eliminar al gato.',
				'error'
			);
		}
	}).fail(function () {
		Swal.fire(
			'Error!',
			'Se produjo un error al intentar eliminar al gato.',
			'error'
		);
	});


}
