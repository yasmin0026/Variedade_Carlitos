<style>
  
.texto{
  color: rgb(180, 180, 180);
}
</style>
<link rel="stylesheet" href="<?= base_url("assets/css/cartas_style.css") ?>">




<!--------------------------La otra carta------------------------------------------------------->
 
<input  class="variation" id="pinkaru2" type="radio" value="5" name="color"/>

<main class="home-section2">
  <?php if(!empty($inventario)){ ?>
    <?php foreach ($inventario as $I): ?>
      <section>
        <form action="#" method="post" autocomplete="off">
         <div class="profile profile-wide">
          <input type="hidden" name="id_producto" value="<?=$I->ID_PRODUCTO; ?>">
          <div class="profile__image"><img src="<?php echo base_url().'assets/productos/'.$I->IMAGEN; ?>" alt="Doggo"/></div>

          <div class="profile__info">
            <h3><?=$I->NOMBRE_PRODUCTO;?></h3>
       <!--  <p class="profile__info__extra"><?=$I->DESCRIPCION;?></p>
        <p class="profile__info__extra">Categoria: <?=$I->TIPO_CATEGORIA;?></p>  -->
      </div>
      <div class="profile__stats">
       <!-- <p class="profile__stats__title">Categoria: <?=$I->TIPO_CATEGORIA;?></p> -->
       <h5 class="profile__stats__info">Descripcion:<b class="texto">&nbsp;<?=$I->DESCRIPCION;?></b></h5>
       <h5 class="profile__stats__info">Categoria:<b class="texto">&nbsp;<?=$I->TIPO_CATEGORIA;?></b> </h5>
       <h5 class="profile__stats__info">Marca:<b class="texto">&nbsp;<?=$I->NOMBRE_MARCA;?></b> </h5>
       <h5 class="profile__stats__info">Color:<b class="texto">&nbsp;<?=$I->NOMBRE_COLOR;?></b></h5>
       <h5 class="profile__stats__info">Para:<b class="texto">&nbsp;<?=$I->TIPO_GENERO;?></b></h5>
       <h5 class="profile__stats__info">Talla:<b class="texto">&nbsp;<?=$I->TALLA;?></b></h5>
     </div>
     
     <div class="profile__cta"><a class="button" style="text-decoration:none;">Agregar a nueva venta</a></div>
   </div>
 </form>

</section>
<?php endforeach ?>
<?php  }else{?>
  <div class="alert alert-danger col-12 col-sm-12 col-md-12 col-lg-12" role="alert"> ¡No hay productos disponibles en Nueva Venta! </div>
<?php } ?>

</main>