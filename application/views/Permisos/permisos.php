 <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
 <section class="home-section">

 	<div class="container">
 		<div class="row">
 			<div class="col-md-12">
 				<h3>Permisos de rol</h3>
 				<br>

 				<ul class="nav nav-tabs card-header-tabs">
 					<li class="nav-item">
 						<a class="nav-link " href="<?php echo base_url(); ?>UsuarioController/index">Usuarios</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="<?php echo base_url(); ?>RolController/index">Roles</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link active" href="<?php echo base_url(); ?>PermisosController/index">Permisos de rol</a>
 					</li>
 				</ul>
 				<br>
 				<br>
 				<?php if ($this->session->userdata('CREAR') == 'Si') : ?>
 					<a class="custom-btn btn-14 crear" href="<?= base_url() . 'PermisosController/nuevoPermiso'; ?>">
 						Nuevo Permiso <i class='bx bxs-color-fill'></i>
 					</a>
 				<?php else : ?>
 					<a class="btn btn-warning crear disabled" href="<?= base_url() . 'PermisosController/nuevoPermiso'; ?>">
 						Nuevo Permiso <i class='bx bxs-color-fill'></i>
 					</a>
 				<?php endif; ?>
 				<br>
 				<br>
 			</div><br>
 			<br />
 			<hr>
 			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
 				<table id="example" class="table table-striped table-bordered nowrap" style="width: 100%">
 					<thead>
 						<tr>
 							<th>ID</th>
 							<th>Usuario</th>
 							<th>Rol</th>
 							<th>Modulo Asignado</th>
 							<th>Crear</th>
 							<th>Actualizar</th>
 							<th>Eliminar</th>
 							<th>Accion</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php foreach ($menu as $m) : ?>
 							<tr>
 								<td><?= $m->ID_MENU; ?></td>
 								<td><?= $m->NOMBRE_USUARIO; ?></td>
 								<td><?= $m->NOMBRE_ROL; ?></td>
 								<td><?= $m->NOMBRE_MODULO; ?></td>
 								<td><?= $m->CREAR; ?></td>
 								<td><?= $m->ACTUALIZAR; ?></td>
 								<td><?= $m->ELIMINAR; ?></td>
 								<td>
 									<a href="<?php echo base_url() . 'PermisosController/editarPermiso/' . $m->ID_MENU; ?>" class="btn btn-primary editar">
 										<i class="bi bi-pencil-square"></i>
 									</a>
 									<a href="<?php echo base_url() . 'PermisosController/deletePermiso/' . $m->ID_MENU; ?>" class="btn btn-danger eliminar">
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