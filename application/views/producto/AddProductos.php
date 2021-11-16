<?php
if (isset($productos)) {
    $id_producto = '<input type="hidden" name="id_producto" value="' . $this->uri->segment(3) . '">';
    $produc = $productos->NOMBRE_PRODUCTO;
    $desc = $productos->DESCRIPCION;
    $categoria = $productos->ID_CATEGORIA;
    $genero = $productos->ID_GENERO;
    $talla = $productos->ID_TALLA;
    $colores = $productos->ID_COLORES;
    $marca = $productos->ID_MARCA;
    $imagen = $productos->IMAGEN;
    $imgAntes = '<input type="hidden" name="imgVieja" value="' . $imagen . '">';
    
    $titulo = "Actualizando Producto";
    $boton = "Actualizar Producto";
    $accion = "update_producto";
} else {
    $id_producto = "";
    $produc = "";
    $desc = "";
    $categoria = "";
    $genero = "";
    $talla = "";
    $colores = "";
    $marca = "";
    $imagen = "";
    $imgAntes = "";

    
    $titulo = "Agregando Producto";
    $boton = "Agregar Producto";
    $accion = "insert_producto";
}
?>

<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/button_style.css';?>">
<section class="home-section">

<div class="container">
	<div class="row">
		<div class="col-xs-6 col-md-12" style="margin-left: 0px; padding-right: 20px">
			<h3><?php echo $titulo ?></h3>
			<?php
				if (isset($productos)) {?>
					<img src="<?=base_url()?>./assets/images/Upload/<?php echo $productos->IMAGEN ;?>" style="width: 270px;height: auto;">
					<br><br>
					<?php
				}
			?>
			
			<br>
			<form class="row g-3" enctype="multipart/form-data" action="<?= base_url() . 'ProductosController/' . $accion; ?>" method="post" autocomplete="off" >
				<?php echo $id_producto; ?>
			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Producto</label>
			    <input type="text" style="width: 90%;" class="form-control" name="nombre" value="<?= $produc; ?>" required>
			  </div>

			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Categoria</label>
			    <!--<input type="text" style="width: 90%;" class="form-control" name="categoria" value="<?= $marca; ?>">-->
			    <select name="categoria" class="form-select" required>
					<option class="option">Debes Seleccionar una Categoria</option>
					<?php foreach ($cate as $c): ?>
					<?php if ($accion == 'insert_producto'): ?>
					<option value="<?=$c->ID_CATEGORIA;?>"><?=$c->TIPO_CATEGORIA;?></option>
					<?php else: ?>
					<option value="<?=$c->ID_CATEGORIA?>" <?=$c->ID_CATEGORIA == $categoria ? 'selected' : ""; ?>>
						<?=$c->TIPO_CATEGORIA; ?>
					</option>
					<?php endif ?>
					<?php endforeach; ?>
				</select>
			  </div>

			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Genero</label>
			    <!--<input type="text" style="width: 90%;" class="form-control" name="genero" value="<?= $marca; ?>">-->
			    <select name="genero" class="form-select" required>
					<option class="option">Debes Seleccionar un Genero</option>
					<?php foreach ($ge as $c): ?>
					<?php if ($accion == 'insert_producto'): ?>
					<option value="<?=$c->ID_GENERO;?>"><?=$c->TIPO_GENERO;?></option>
					<?php else: ?>
					<option value="<?=$c->ID_GENERO?>" <?=$c->ID_GENERO == $genero ? 'selected' : ""; ?>>
						<?=$c->TIPO_GENERO; ?>
					</option>
					<?php endif ?>
					<?php endforeach; ?>
				</select>
			  </div>
			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Talla</label>
			    <!--<input type="text" style="width: 90%;" class="form-control" name="talla" value="<?= $marca; ?>">-->
			    <select name="talla" class="form-select" required>
					<option class="option">Debes Seleccionar una Talla</option>
					<?php foreach ($ta as $c): ?>
					<?php if ($accion == 'insert_producto'): ?>
					<option value="<?=$c->ID_TALLA;?>"><?=$c->TALLA;?></option>
					<?php else: ?>
					<option value="<?=$c->ID_TALLA?>" <?=$c->ID_TALLA == $talla ? 'selected' : ""; ?>>
						<?=$c->TALLA; ?>
					</option>
					<?php endif ?>
					<?php endforeach; ?>
				</select>
			  </div>
			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Colores</label>
			    <!--<input type="text" style="width: 90%;" class="form-control" name="colores" value="<?= $marca; ?>">-->
			    <select name="colores" class="form-select" required>
					<option class="option" required>Debes Seleccionar un Color</option>
					<?php foreach ($co as $c): ?>
					<?php if ($accion == 'insert_producto'): ?>
					<option required value="<?=$c->ID_COLORES;?>"><?=$c->NOMBRE_COLOR;?></option>
					<?php else: ?>
					<option required value="<?=$c->ID_COLORES?>" <?=$c->ID_COLORES == $colores ? 'selected' : ""; ?>>
						<?=$c->NOMBRE_COLOR; ?>
					</option>
					<?php endif ?>
					<?php endforeach; ?>
				</select>
			  </div>
			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Marca</label>
			    <!--<input type="text" style="width: 90%;" class="form-control" name="marca" value="<?= $marca; ?>">-->
			    <select name="marcas" class="form-select" required>
					<option class="option">Seleccionar</option>
					<?php foreach ($mar as $c): ?>
					<?php if ($accion == 'insert_producto'): ?>
					<option value="<?=$c->ID_MARCA;?>"><?=$c->NOMBRE_MARCA;?></option>
					<?php else: ?>
					<option value="<?=$c->ID_MARCA?>" <?=$c->ID_MARCA == $marca ? 'selected' : ""; ?>>
						<?=$c->NOMBRE_MARCA; ?>
					</option>
					<?php endif ?>
					<?php endforeach; ?>
				</select>
			  </div>
			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Descripcion</label>
			    <textarea class="form-control" name="descripcion" required><?= $desc ?></textarea>
			    <!--<input type="text" style="width: 90%;" class="form-control" name="descripcion" value="<?= $desc; ?>">-->
			  </div>
			  <div class="col-xs-12 col-md-6">
			    <label class="form-label">Imagen</label>
			    <input type="file" style="width: 90%;" class="form-control" name="imagenes" >
			    <?php echo $imgAntes ?>
			  </div>

			  <div class="col-xs-6 col-md-12">
			    <button type="submit" class="custom-btn btn-7"><span><?php echo $boton ?></span></button>
				<a id="boton" class="custom-btn btn-5" href="<?=base_url().'ProductosController/index';?>"><span>Cancelar</span></a>
			  </div>
			</form>
		</div>		
	</div>
</div>
</section>
