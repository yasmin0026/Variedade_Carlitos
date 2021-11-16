<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
<section class="home-section">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Estado de Stock</h3>
				<br>
				<?php if ($this->session->userdata('CREAR') == 'Si') : ?>
					<a class="custom-btn btn-14 crear" href="<?= base_url() . 'StockController/nuevoStock'; ?>">Nuevo estado de stock <i class='bx bxs-color-fill'></i>
					</a>
				<?php else : ?>
					<a class="btn btn-warning crear disabled" href="<?= base_url() . 'StockController/nuevoStock'; ?>">Nuevo estado de stock <i class='bx bxs-color-fill'></i>
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
							<th>Estado de Stock</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stock as $s) : ?>
							<tr>
								<td><?= $s->ID_ESTADO_STOCK; ?></td>
								<td><?= $s->ESTADO_STOCK; ?></td>
								<td>
									<a href="<?php echo base_url() . 'StockController/editarStock/' . $s->ID_ESTADO_STOCK; ?>" class="btn btn-primary editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<a href="<?php echo base_url() . 'StockController/eliminarStock/' . $s->ID_ESTADO_STOCK; ?>" class="btn btn-danger eliminar">
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