<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $page_title; ?></title>

	<!--- META --->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--- ICO WEB --->
	<link rel="icon" href="<?= base_url("assets/images/favicon.png") ?>" type="image/png" />

	<!--- CSS & CDN--->
	<link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?= base_url("assets/logo/style.css") ?>">
	<link rel="stylesheet" href="<?= base_url("assets/css/style_navbar.css") ?>">

	<!--- DATATABLE--->

	<link rel="stylesheet" type="<?= base_url() . 'assets/css/dataTables.bootstrap4.min.css'; ?>">

	<!--- DATATABLE JS--->
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.5.1.js'; ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.dataTables.min.js'; ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/dataTables.bootstrap4.min.js'; ?>"></script>


	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

	<link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
	<style type="text/css">
		a {
			text-decoration: none;
		}

		.dropdown-toggle,
		.nav-link,
		.dropdown-toggle {
			color: #1a1a1a;
			text-decoration: none;
			text-decoration: aquamarine;
		}

		.dropdown-toggle:hover,
		.dropdown-menu:hover {
			color: #C4C4C4;
			text-decoration: none;
		}
	</style>

	<script type="text/javascript">
		window.onload = function() {
			crear = "<?= $this->session->userdata('CREAR'); ?>"
			editar = "<?= $this->session->userdata('ACTUALIZAR'); ?>"
			eliminar = "<?= $this->session->userdata('ELIMINAR'); ?>"

			if (crear != "Si") {
				$('.crear').addClass('disabled');
				$('.crear').prop("disabled",true);
			}
			if (editar != "Si") {
				$('.editar').addClass('disabled');
			}
			if (eliminar != "Si") {
				$('.eliminar').addClass('disabled');
			}
		};
	</script>
</head>

<body style="background-color: #E4E9F7">

	<div class="float-right navbar" width="100%">
		<div class="dropdown dropdown-menu-right">
			<a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
					<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
					<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
				</svg>
				<?= $this->session->userdata('NOMBRE_USUARIO'); ?>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item text-primary" href="<?= base_url() . 'MyProfile/about_me/' . $this->session->userdata('ID_USUARIO'); ?>">
					<i class="bi bi-person-fill"></i> Mi perfil
				</a>
				<hr class="dropdown-divider">
				<a class="dropdown-item text-warning" href="<?= base_url() . 'MyProfile/setting_user/' . $this->session->userdata('ID_USUARIO'); ?>">
					<i class="bi bi-gear-fill"></i> Config.. cuenta
				</a>
				<a class="dropdown-item text-danger" href="<?php echo base_url(); ?>LoginController/logout">
					<i class="bi bi-box-arrow-left"></i> Cerrar sesión
				</a>
			</div>
		</div>
	</div>

	<div class="sidebar ">
		<div class="scrollbar" id="style-1">
			<div class="logo-details">
				<i class="icon-logo3 icon -2x" id="icon"></i>
				<div class="logo_name">Variedades Carlitos</div>
				<i class='bx bx-menu' id="btn"></i>
			</div>

			<ul class="nav-links">
				<?php if ($this->session->userdata('ID_ROL') === 1) : ?>
					<li>
						<a href="<?= base_url("LoginController/inicio") ?>">
							<i class="fas fa-home"></i></i>
							<span class="links_name">Inicio</span>
						</a>
						<span class="tooltip">Pagina Principal</span>
					</li>
					<li>
						<a href="<?= base_url("InventarioController/inicio") ?>">
							<i class="fas fa-boxes "></i>
							<span class="links_name">Nuevo Inventario</span>
						</a>
						<span class="tooltip">Nuevo Inventario</span>
					</li>
					<li>
						<a href="<?= base_url("ProductosController/index") ?>">
							<i class="fab fa-shopify"></i>
							<span class="links_name">Productos</span>
						</a>
						<span class="tooltip">Productos</span>
					</li>
					<li>
						<a href="<?= base_url("ProveedorController/index") ?>">
							<i class="fas fa-truck-loading"></i>
							<span class="links_name">Proveedores</span>
						</a>
						<span class="tooltip">Proveedores</span>
					</li>

					<li>
						<a href="<?= base_url("VentaController/index") ?>">
							<i class='bx bx-cart'></i>
							<span class="links_name">Nueva Venta</span>
						</a>
						<span class="tooltip" href="#">Nueva Venta</span>
					</li>
					<li>
						<div class="iocn-link">
							<a href="<?= base_url("ColoresController/index") ?>">
								<i class='bx bx-purchase-tag-alt'></i>
								<span class="links_name">Caracteristicas</span>
							</a>
							<span class="tooltip" href="#">Caracteristicas</span>
						</div>
						<div class="sub-menu blank">
							<ul>
								<li><a class="link_name" href="<?= base_url("ColoresController/vista") ?>">Colores</a></li>
								<li><a class="link_name" href="<?= base_url("GeneroController/index") ?>">Genero</a></li>
								<li><a class="link_name" href="<?= base_url("TallaController/index") ?>">Talla</a></li>
								<li><a class="link_name" href="<?= base_url("MarcaController/index") ?>">Marca</a></li>
								<li><a class="link_name" href="<?= base_url("StockController/index") ?>">Stock</a></li>
								<li><a class="link_name" href="<?= base_url("PagoController/index") ?>">Pago</a></li>
								<li><a class="link_name" href="<?= base_url("CategoriaController/index") ?>">Categoria</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="#">
							<i class='bx bx-bar-chart-alt-2'></i>
							<span class="links_name">Ver Inventario</span>
						</a>
						<span class="tooltip" href="#">Ver Inventario</span>
					</li>
					<li>
						<a href="<?= base_url("UsuarioController/index") ?>">
							<i class='bx bx-user'></i>
							<span class="links_name">Usuarios y Roles</span>
						</a>
						<span class="tooltip" href="<?= base_url("UsuarioController/index") ?>">Usuarios y Roles</span>
					</li>
					<li>
						<a href="<?= base_url("DeudasController/index") ?>">
							<i class='bx bx-bar-chart-alt'></i>
							<span class="links_name">Contabilidad</span>
						</a>
						<span class="tooltip" href="#">Contabilidad</span>
					</li>

				<?php elseif ($this->session->userdata('ID_ROL') != 1) : ?>
					<?php $menu = $this->PermisosModel->getModulos($this->session->userdata("ID_USUARIO")); ?>
					<?php foreach ($menu as $m) : ?>
						<li>
							<a href="<?php echo base_url() . $m->URL_MODULO ?>">
								<i class="<?= $m->ICONO_MODULO ?>"></i>
								<span class="links_name"><?= $m->NOMBRE_MODULO ?></span>
							</a>
							<span class="tooltip"><?= $m->NOMBRE_MODULO ?></span>
						</li>
					<?php endforeach; ?>

				<?php endif ?>
				<div id="page-wrapper">
				</div>
			</ul>
		</div>
	</div>

	<section class="">
		<div class="text"><br><br></div>
	</section>

	<!--
		
		<li>
			<i class="fas fa-search "></i>
			<input type="text" placeholder="Search...">
			<span class="tooltip">Buscar</span>
		</li>

		<li>
			<a href="<?= base_url("PermisosController/index") ?>">
			<i class='bx bx-brightness bx-spin'></i>
			<span class="links_name">Administrar permisos</span>
			</a>
			<span class="tooltip" href="#">Administrar permisos</span>
		</li>

		<li>
			<a href="<?= base_url() . 'RolController/'; ?>">
			<i class='bx bx-user-check'></i>
			<span class="links_name">Roles</span>
			</a>
			<span class="tooltip" href="#">Roles</span>
		</li>


		<li style="position: relative; top: 120px;">
			<a href="<?php echo base_url(); ?>LoginController/logout">
			<i class="fas fa-power-off"></i>
			<span class="links_name">&nbsp; Cerrar sesion</span>
			</a>
			<span class="tooltip">Cerrar Sesion</span>
		</li>
-->