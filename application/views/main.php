<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
	<? if (isset($content)) : ?>
		<?= $content; ?>
	<? else : ?>
		<div class="alert alert-warning" role="alert">
			<h2>Ups!</h2>
			No se pudo cargar la pagina solicitada. Hable con el programador.
		</div>
	<? endif; ?>
</div>

<!-- Aca van los JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
