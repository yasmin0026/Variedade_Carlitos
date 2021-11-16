<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
<section class="home-section">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Deudas y Abonos</h3>
				<br>
				<br>
			</div><br>
			<br />
			<hr>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<table id="example" class="table table-striped table-bordered nowrap" style="width: 100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Codigo deuda</th>
							<th>Fecha</th>
							<th>Deuda</th>
							<th>Abono</th>
							<th>Total a Pagar</th>
							<th>Estado</th>
							<th>Accion</th>
						</tr>
					</thead> 
					<tbody>
						<?php foreach ($movimientos as $m) : ?>
							<tr>
								<td><?= $m->ID_MOVIMIENTO; ?></td>
								<td><?= $m->COD_DEUDA; ?></td>
								<td><?= $m->FECHA_MOVIMIENTO; ?></td>
								<td><?= $m->DEUDA_PROVEEDOR; ?></td>
								<td><?= $m->ABONO_PROVEEDOR; ?></td>
								<td><?= $m->TOTAL_A_PAGAR; ?></td>
								<td><?= $m->ID_ESTADO_PAGO; ?></td>
								<td>
		<a href="<?php echo base_url() . 'DeudasController/editarMovimiento/' .  $m->ID_MOVIMIENTO ?>" class="btn btn-primary">
										<i class="bi bi-pencil-square"></i>
									</a>
									<a href="<?php echo base_url() . 'DeudasController/detallesMovimiento/' . $m->COD_DEUDA; ?>" class="btn btn-success detalles">
										<i class="bi bi-pencil-square"></i>
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