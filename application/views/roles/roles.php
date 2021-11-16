<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
<section class="home-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Roles</h3>
				<br>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link " href="<?php echo base_url(); ?>UsuarioController/index">Usuarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo base_url(); ?>RolController/index">Roles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="<?php echo base_url(); ?>PermisosController/index">Permisos de rol</a>
					</li>
				</ul>
				<br>
				<br>
				<?php if ($this->session->userdata('CREAR') == 'Si') : ?>
					<a class="custom-btn btn-14 crear" href="<?= base_url() . 'RolController/nuevo_rol'; ?>">
						Nuevo Rol <i class="bi bi-plus-lg float-end"></i>
					</a>
				<?php else : ?>
					<a class="btn btn-warning crear disabled" href="<?= base_url() . 'RolController/nuevo_rol'; ?>">
						Nuevo Rol <i class="bi bi-plus-lg float-end"></i>
					</a>
				<?php endif; ?>
				<br>
				<br>
			</div><br>
			<br />
			<hr>
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre del rol</th>
							<th>Crear registro</th>
							<th>Actualizar registro</th>
							<th>Eliminar registro</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($roles as $r) : ?>
							<tr>
								<td><?= $r->ID_ROL; ?></td>
								<td><?= $r->NOMBRE_ROL; ?></td>
								<td><?= $r->CREAR; ?></td>
								<td><?= $r->ACTUALIZAR; ?></td>
								<td><?= $r->ELIMINAR; ?></td>
								<td>
									<a href="<?php echo base_url() . 'RolController/editar_rol/' . $r->ID_ROL; ?>" class="btn btn-primary editar"><i class="bi bi-pencil-square"></i></a>
									<a href="<?php echo base_url() . 'RolController/eliminar_rol/' . $r->ID_ROL; ?>" class="btn btn-danger eliminar"><i class="bi bi-trash-fill"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>