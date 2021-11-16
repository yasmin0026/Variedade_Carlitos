<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
<section class="home-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Generos</h3>
				<br>
				<?php if ($this->session->userdata('CREAR') == 'Si') : ?>
					<a class="crear custom-btn btn-14" href="<?= base_url() . 'GeneroController/nuevo_genero'; ?>">
						Nuevo Genero <i class="fa fa-female"></i><i class="fa fa-male"></i>
					</a>
				<?php else : ?>
					<a class="btn btn-warning crear disabled" href="<?= base_url() . 'GeneroController/nuevo_genero'; ?>">
						Nuevo Genero <i class="fa fa-female"></i><i class="fa fa-male"></i>
					</a>
				<?php endif; ?>
			</div><br>
			<br />
			<hr>
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered nowrap" style="width: 100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Color</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($genero as $g) : ?>
							<tr>
								<td><?= $g->ID_GENERO; ?></td>
								<td><?= $g->TIPO_GENERO; ?></td>
								<td>
									<a href="<?php echo base_url() . 'GeneroController/editar_genero/' . $g->ID_GENERO; ?>" class="btn btn-primary editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<a href="<?php echo base_url() . 'GeneroController/eliminar_genero/' . $g->ID_GENERO; ?>" class="btn btn-danger eliminar">
										<i class="bi bi-trash-fill"></i>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>


</section>