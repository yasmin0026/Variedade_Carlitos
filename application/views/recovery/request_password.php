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
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h3 class="text-success">Bienvenido</h3>
				<form action="<?=base_url().'RecoveryController/RequestPassword';?>" method="post">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Función de recuperación de contraseña</h4>
						</div>
						<div class="card-body">
							<div class="alert alert-danger">
								<i class="bi bi-emoji-frown"></i>
								<p class="justify">
									Se le ha olvidado su contraseña. No te preocupes sigue los pasos de la función de recuperación de contraseña, para que puedas modificarla sin problema
								</p>
								
							</div>

							<div class="col-md-12">
								<h4 class="text-primary">¿Qué dato de tu perfil recuerdas?</h4>
								
								<select name="forma" class="form-control" required>
									<option value="">Selecciona por favor</option>
									<option value="1">Correo Eléctronico</option>
									<option value="2">Nombre de usuario / DUI</option>
								</select>
								<br>
								<div class="alert alert-warning">
									<i class="bi bi-exclamation-triangle-fill"></i>
									Selecciona una forma para hacer posible la busqueda
								</div>
							</div>
							<?php if ($this->session->flashdata('msg') != null): ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('msg');  ?>
								</div>
							<?php endif ?>
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