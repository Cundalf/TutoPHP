<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h3>Lista de gatos</h3>
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Color</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>

			<? if (isset($cats)) : ?>
				<? foreach ($cats as $cat) : ?>
					<tr>
						<th><?= $cat->gatoId; ?></th>
						<td><?= $cat->gatoNombre; ?></td>
						<td><?= $cat->gatoColor; ?></td>
						<td>
							<a href="<?= base_url("gato/edit/" . $cat->gatoId); ?>"><i class="fas fa-pencil-alt text-info pointer"></i></a>
							<i class="fas fa-trash-alt text-danger pointer delete" data-id="<?= $cat->gatoId; ?>"></i>
						</td>
					</tr>
				<? endforeach; ?>
			<? endif; ?>

		</tbody>
	</table>
