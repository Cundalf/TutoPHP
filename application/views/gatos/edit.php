<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>Modificando Gato #<?=$id ?></h3>
<hr>

<form method="POST" action="">
	<label for="nombre" class="form-label">Nombre</label>
	<div class="input-group has-validation mb-3">
		<input type="text" class="form-control <?= (form_error('nombre') != "" ? "is-invalid" : "") ?>" id="nombre" name="nombre" value="<?= $nombre ?>">
		<?= form_error('nombre', '<div id="nombreFeedback" class="invalid-feedback">', '</div>'); ?>
	</div>

	<label for="color" class="form-label">Color</label>
	<div class="input-group has-validation mb-3">
		<input type="text" class="form-control <?= (form_error('color') != "" ? "is-invalid" : "") ?>" id="color" name="color" value="<?= $color ?>">
		<?= form_error('color', '<div id="colorFeedback" class="invalid-feedback">', '</div>'); ?>
	</div>
	<button type="submit" class="btn btn-danger">Modificar</button>
</form>
