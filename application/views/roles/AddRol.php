<?php
if (isset($update)) {
    $id = '<input type="hidden" name="id_rol" value="' . $this->uri->segment(3) . '">';
    $nombre = $update->NOMBRE_ROL;
    $crear = $update->CREAR;
	$actualizar = $update->ACTUALIZAR;
	$eliminar = $update->ELIMINAR;

	$titulo = "Actualizando Rol";
    $boton = "Actualizar Rol";    
    $accion = "update_rol";
} else {
    $id = "";
    $nombre = "";

	$titulo = "Agregar Rol";
    $boton = "Agregar Rol";
    $accion = "insert_rol";
    $crear = "";
	$actualizar = "";
	$eliminar = "";
}
?>
<body >
	 

<section class="home-section" style="margin: 60px;">
<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/button_style.css';?>">


<div class="container" >
	<div class="row" > 
		<div class="col-xs-12" style="margin-left: 0px; padding-right: 20px">
			<h3><?php echo $titulo ?></h3>
			<br>
			<form class="row g-3" action="<?= base_url() . 'RolController/' . $accion; ?>" method="post" autocomplete="off">
				<?php echo $id; ?>
			  <div class="ol-xs-6 col-mcd-12">
			    <label class="form-label">Rol de usuario</label>
			    <input type="text" class="form-control" name="nombre_rol" style="width: 90%;" value="<?= $nombre; ?>" required>
			  </div>
 
			  <div class="col-md-12">
								<label>¿Puede crear registros?</label>
								<select name="crear" class="form-control">
									<?php if ($accion == "update_rol"): ?>
										<?php if ($crear == "Si"): ?>
											<option>Seleccionar</option>
											<option value="Si" selected>Si</option>
											<option value="No">No</option>
										<?php else: ?>
											<option>Seleccionar</option>
											<option value="Si">Si</option>
											<option value="No" selected>No</option>
										<?php endif ?>
									<?php else: ?>
										<option>Seleccionar</option>
										<option value="Si">Si</option>
										<option value="No">No</option>
									<?php endif ?>

								</select>
							</div>

							<div class="col-md-12">
								<label>¿Puede editar registros?</label>
								<select name="actualizar" class="form-control">
									<?php if ($accion == "update_rol"): ?>
										<?php if ($actualizar == "Si"): ?>
											<option>Seleccionar</option>
											<option value="Si" selected>Si</option>
											<option value="No">No</option>
										<?php else: ?>
											<option>Seleccionar</option>
											<option value="Si">Si</option>
											<option value="No" selected>No</option>
										<?php endif ?>
									<?php else: ?>
										<option>Seleccionar</option>
										<option value="Si">Si</option>
										<option value="No">No</option>
									<?php endif ?>

								</select>
							</div>

							<div class="col-md-12">
								<label>¿Puede eliminar registros?</label>
								<select name="eliminar" class="form-control">
									<?php if ($accion == "update_rol"): ?>
										<?php if ($eliminar == "Si"): ?>
											<option>Seleccionar</option>
											<option value="Si" selected>Si</option>
											<option value="No">No</option>
										<?php else: ?>
											<option>Seleccionar</option>
											<option value="Si">Si</option>
											<option value="No" selected>No</option>
										<?php endif ?>
									<?php else: ?>
										<option>Seleccionar</option>
										<option value="Si">Si</option>
										<option value="No">No</option>
									<?php endif ?>

								</select>
							</div>



			  <div class="col-xs-6 col-md-12">
			    <button class="custom-btn btn-7"><span><?php echo $boton ?></span></button>
				<a id="boton" class="custom-btn btn-5" href="<?=base_url().'RolController/index';?>"><span>Cancelar</span></a>
			  </div>
			</form>
		</div>		
	</div>
</div>
</section>

</body>




<!--
<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/form_style.css';?>">
<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/button_style.css';?>">
<div class="container">
	<div class="form-form">
		<div class="form-wrap">
			<div class="col-md-6 col-lg-6 col-sm-12 float-center">
				<form action="<?= base_url() . 'RolController/' . $accion; ?>" method="post">

					<h3 class="card-title">Rol</h3>

					<div class="card-body">
						<?php echo $id; ?>
						<div class="group">
							<label for="nombre_rol" class="label">Nombre del rol:</label>
							<input type="text" name="nombre_rol" class="input" value="<?= $nombre; ?>">
						</div>

					</div>

                    <button type="submit" class="custom-btn btn-7"><span>Agregar Datos</span></button>
					<a id="boton" class="custom-btn btn-5"  href="<?=base_url().'RolController/index';?>"><span>Cancelar</span></a>

				</form>
			</div>
		</div>


	</div>
</div>-->