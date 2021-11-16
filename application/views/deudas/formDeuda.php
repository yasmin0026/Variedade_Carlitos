<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/button_style.css';?>">
<section class="home-section">

	<div class="container" style="position: relative; ">
		<div class="row">
			<div class="col-xs-6" style="margin-left: 0px; padding-right: 20px">
				<h3>Actualizar deuda</h3>
				<br>
				<form class="row g-3" action="<?php echo base_url(); ?>DeudasController/updateAbono" method="post" autocomplete="off">
					
					<div class="col-xs-6 col-md-12">
						<label class="form-label">Código de deuda</label>
				<input type="hidden" class="form-control" style="width: 90%;" disabled name="ID_MOVIMIENTO" value="<?=$movimientos->ID_MOVIMIENTO ?>">
						<input type="text" class="form-control" style="width: 90%;" disabled name="COD_DEUDA" value="<?=$movimientos->COD_DEUDA ?>" required>
					</div>

					<div class="col-xs-6 col-md-12">
						<label class="form-label">Fecha de Movimiento</label>
						<input type="date" class="form-control" style="width: 90%;" name="FECHA_MOVIMIENTO" value="<?=$movimientos->FECHA_MOVIMIENTO ?>" required>
					</div>
					
					<div class="col-xs-6 col-md-12">
						<label class="form-label">Deuda actual</label>
						<input type="text" class="form-control" style="width: 90%;" disabled name="DEUDA_PROVEEDOR" value="<?=$movimientos->DEUDA_PROVEEDOR ?>" required>
					</div>

					<div class="col-xs-6 col-md-12">
						<label class="form-label">Abono a realizar</label>
						<input type="number" step="any" class="form-control" style="width: 90%;" name="ABONO_PROVEEDOR" value="<?=$movimientos->ABONO_PROVEEDOR ?>" required>
					</div>

					<div class="col-xs-6 col-md-12">
						<button class="custom-btn btn-7"><span>Guardar</span></button>
						<a id="boton" class="custom-btn btn-5" href="<?=base_url().'DeudasController/index';?>"><span>Cancelar</span></a>
					</div>
				</form>
			</div>		
		</div>
	</div>


</section>