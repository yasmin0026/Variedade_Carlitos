<?php
if (isset($update)) {
	$id = '<input type="hidden" name="id_menu" value="' . $this->uri->segment(3) . '">';
	$id_rol = $update->ID_ROL;
	$id_modulo = $update->ID_MODULO;

	$titulo = "Actualizando Permiso de rol ";
	$boton = "Actualizar permiso";
	$accion = "updatePermiso";
} else {
	$id = "";
	$id_rol = "";
	$id_modulo = "";
	$titulo = "Nuevo Permiso de rol";
	$boton = "Guardar permiso";
	$accion = "insertPermiso";
}
?>

<section class="home-section">
	<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/button_style.css';?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12" style="margin-left: 75px; padding-right: 20px">
				<h3><?php echo $titulo ?></h3>
				<br>
				<form class="row g-3" action="<?= base_url() . 'PermisosController/' . $accion; ?>" method="post" autocomplete="off">
					<?php echo $id; ?>
					
					<div class="col-md-4">
						<label for="inputState" class="form-label">Rol</label>
						<select name="id_rol" class="form-select" required>
							<option class="option" required>Seleccionar</option>
							<?php foreach ($rol as $r): ?>
								<?php if ($accion == 'insertPermiso'): ?>
									<option required value="<?=$r->ID_ROL;?>"><?=$r->NOMBRE_ROL;?></option>
								<?php else: ?>
									<option required value="<?=$r->ID_ROL?>" <?=$r->ID_ROL == $id_rol ? 'selected' : ""; ?>>
										<?=$r->NOMBRE_ROL; ?>
									</option>
								<?php endif ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-4">
						<label for="inputState" class="form-label">Modulo</label>
						<select name="id_modulo" class="form-select" required>
							<option class="option" required>Seleccionar</option>
							<?php foreach ($modulo as $m): ?>
								<?php if ($accion == 'insertPermiso'): ?>
									<option required value="<?=$m->ID_MODULO;?>"><?=$m->NOMBRE_MODULO;?></option>
								<?php else: ?>
									<option required value="<?=$m->ID_MODULO?>" <?=$m->ID_MODULO == $id_modulo ? 'selected' : ""; ?>>
										<?=$m->NOMBRE_MODULO; ?>
									</option>
								<?php endif ?>
							<?php endforeach; ?>
						</select>
					</div>


					<div class="col-12">
						<button class="custom-btn btn-7"><span><?php echo $boton ?></span></button>
						<a id="boton" class="custom-btn btn-5" href="<?=base_url().'PermisosController/index';?>"><span>Cancelar</span></a>
					</div>
				</form>
			</div>		
		</div>
	</div>

</section>