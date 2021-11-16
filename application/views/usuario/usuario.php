<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
<section class="home-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Usuarios</h3>
				<br>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo base_url(); ?>UsuarioController/index">Usuarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>RolController/index">Roles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="<?php echo base_url(); ?>PermisosController/index">Permisos de rol</a>
					</li>
				</ul>
				<br>
				<br>
				<?php if ($this->session->userdata('CREAR') == 'Si') : ?>
					<a class="custom-btn btn-14 crear" href="<?= base_url() . 'UsuarioController/nuevo_usuario'; ?>">
						Nuevo usuario <i class="bi bi-person-plus-fill float-end"></i>
					</a>
				<?php else : ?>
					<a class="custom-btn btn-14 crear" href="<?= base_url() . 'UsuarioController/nuevo_usuario'; ?>">
						Nuevo usuario <i class="bi bi-person-plus-fill float-end"></i>
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
							<!--<th>ID</th>-->
							<th>Nick</th>
							<th>Nombre del usuario</th>
							<th>Correo</th>
							<th>Fecha de cambios</th>
							<th>Rol</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($usuario as $r) : ?>
							<tr>
								<!--<td><?= $r->ID_USUARIO; ?></td>-->
								<td><?= $r->NICK_USUARIO; ?></td>
								<td><?= $r->NOMBRE_USUARIO; ?></td>
								<td><?= $r->CORREO_USUARIO; ?></td>
								<td><?= $r->FECHA_CAMBIOS; ?></td>
								<td><?= $r->NOMBRE_ROL; ?></td>
								<td>
									<a href="<?php echo base_url() . 'UsuarioController/editar_usuario/' . $r->ID_USUARIO; ?>" class="btn btn-primary editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<a href="<?php echo base_url() . 'UsuarioController/eliminar_usuario/' . $r->ID_USUARIO; ?>" class="btn btn-danger eliminar">
										<i class="bi bi-trash-fill"></i>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">



		</div>
	</div>
</section>