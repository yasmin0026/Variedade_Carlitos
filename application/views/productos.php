<section class="home-section">
      
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" type="<?=base_url().'assets/css/dataTables.bootstrap4.min.css';?>">

<section class="home-section2">
	<div class="container">
		<div class="row">
      <h2 align="center">Caracteristicas de Productos</h2>
      <br><br><br><br><br><br>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<a href="<?= base_url("ColoresController/vista") ?>"><div class="well-lg BotonAzulGrande" align="center">Colores <i class="fa fa-tint"></i></div></a>
			</div>
  			<div class="col-xs-12 col-sm-12 col-md-4">
  				<a href="<?=base_url("MarcaController/index") ?>"><div class="well-lg BotonAzulGrande" align="center">Marca <i class="fa fa-check-circle"></i></div></a>
  			</div>
  			<div class="col-xs-12 col-sm-12 col-md-4">
  				<a href="<?=base_url("GeneroController/index") ?>"><div class="well-lg BotonAzulGrande" align="center">Genero <i class="fa fa-female"></i><i class="fa fa-male"></i></div></a>
  			</div>
  			<div class="col-xs-12 col-sm-12 col-md-4">
  				<a href="<?=base_url("TallaController/index") ?>"><div class="well-lg BotonAzulGrande" align="center">Talla <i class="fa fa-female"></i><i class="fa fa-male"></i></div></a>
  			</div>
  			<div class="col-xs-12 col-sm-12 col-md-4">
  				<a href="<?=base_url("StockController/index") ?>"><div class="well-lg BotonAzulGrande" align="center">Estado de Stock <i class="fa fa-female"></i><i class="fa fa-male"></i></div></a>
  			</div>
  			<div class="col-xs-12 col-sm-12 col-md-4">
				<a href="<?= base_url("PagoController/index") ?>"><div class="well-lg BotonAzulGrande" align="center">Estado de Pago <i class="fa fa-tint"></i></div></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<a href="<?= base_url("CategoriaController/index") ?>"><div class="well-lg BotonAzulGrande" align="center">Categoria <i class="fa fa-tint"></i></div></a>
			</div>
  		</div>
  	</div>
  </section>