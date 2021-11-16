<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
<section class="home-section">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Estado de pago</h3>
				<br>
				<?php if ($this->session->userdata('CREAR') == 'Si') : ?>
					<a class="crear custom-btn btn-14" href="<?= base_url() . 'PagoController/nuevoPago'; ?>">Nuevo estado de pago <i class='bx bxs-color-fill'></i>
					</a>
				<?php else : ?>
					<a class="btn btn-warning crear disabled" href="<?= base_url() . 'PagoController/nuevoPago'; ?>">Nuevo estado de pago <i class='bx bxs-color-fill'></i>
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
							<th>Estado de Pago</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pago as $p) : ?>
							<tr>
								<td><?= $p->ID_ESTADO_PAGO; ?></td>
								<td><?= $p->ESTADO_PAGO; ?></td>
								<td>
									<a href="<?php echo base_url() . 'PagoController/editarPago/' . $p->ID_ESTADO_PAGO; ?>" class="btn btn-primary editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<a href="<?php echo base_url() . 'PagoController/eliminarPago/' . $p->ID_ESTADO_PAGO; ?>" class="btn btn-danger eliminar">
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