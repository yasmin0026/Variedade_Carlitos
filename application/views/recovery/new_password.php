<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$page_title ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
	<!--- ICO WEB --->
	<link rel="icon" href="<?= base_url("assets/images/favicon.png") ?>" type="image/png" />
</head>
<body style="background-color: #E4E9F7">
	<?php 
	$id = $datos->ID_USUARIO;
	$nombre = $datos->NOMBRE_USUARIO;
	$nick = $datos->NICK_USUARIO;
	$correo = $datos->CORREO_USUARIO;
	$contrasenia = $datos->CONTRASENIA_USUARIO;
	$recovery_pregunta = $datos->RECOVERY_PREGUNTA;
	$recovery_respuesta = $datos->RECOVERY_RESPUESTA;
	$fecha_cambios = $datos->FECHA_CAMBIOS;
	$id_rol = $datos->ID_ROL;
	?>
	
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="<?=base_url().'RecoveryController/ChangePassword';?>" method="post">
					<input type="hidden" name="id_usuario" value="<?=$id;?>">
					<input type="hidden" name="nombre" value="<?=$nombre;?>">
					<input type="hidden" name="nick" value="<?=$nick;?>">
					<input type="hidden" name="correo" value="<?=$correo;?>">
					<input type="hidden" name="pregunta" value="<?=$recovery_pregunta;?>">
					<input type="hidden" name="respuesta" value="<?=$recovery_respuesta;?>">
					<input type="hidden" name="fecha_cambios" value="<?=$fecha_cambios;?>">
					<input type="hidden" name="id_rol" value="<?=$id_rol;?>">


					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Nueva contraseña</h4>
						</div>
						<div class="card-body">
							<div class="alert alert-danger">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
									<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
								</svg>
								<h4>Hola <?=$nombre;?></h4><br>
								<p class="justify"> 
									Debe de ingresar su respuesta de seguridad tal como fue ingresado en el sistema
								</p>
								
							</div>
							<div class="col-md-12">
								<label>Nueva contraseña:</label>
								<input type="text" name="contrasenia" class="form-control" required>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary float-end">
								Siguiente 
								<i class="bi bi-arrow-right-square-fill"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>