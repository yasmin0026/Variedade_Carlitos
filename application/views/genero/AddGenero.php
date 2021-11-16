<?php
if (isset($update)) {
    $id = '<input type="hidden" name="id_genero" value="' . $this->uri->segment(3) . '">';
    $genero = $update->TIPO_GENERO;
    
    $titulo = "Actualizando Genero";
    $boton = "Actualizar Genero";
    $accion = "update_genero";
} else {
    $id = "";
    $genero = "";

    $titulo = "Agregar Genero";
    $boton = "Agregar Genero";    
    $accion = "insert_genero";
}
?>

<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/button_style.css';?>">
<section class="home-section">

<div class="container">
	<div class="row">
		<div class="col-xs-6 col-md-12" style="margin-left: 0px; padding-right: 20px">
			<h3><?php echo $titulo ?></h3>
			<br>
			<form class="row g-3" action="<?= base_url() . 'GeneroController/' . $accion; ?>" method="post" autocomplete="off">
				<?php echo $id; ?>
			  <div class="col-xs-6 col-md-12">
			    <label class="form-label">Nombre del genero</label>
			    <input type="text" class="form-control" name="genero" style="width: 90%;" value="<?= $genero; ?>" required>
			  </div>

			  <div class="col-xs-6 col-md-12">
			    <button class="custom-btn btn-7"><span><?php echo $boton ?></span></button>
				<a id="boton" class="custom-btn btn-5" href="<?=base_url().'GeneroController/index';?>"><span>Cancelar</span></a>
			  </div>
			</form>
		</div>		
	</div>
</div>
</section>

