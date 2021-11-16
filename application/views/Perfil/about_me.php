<?php
if (isset($update)) {
    $id = '<input type="hidden" name="id_usuario" value="' . $this->uri->segment(3) . '">';
    $nombre = $update->NOMBRE_USUARIO;
    $nick = $update->NICK_USUARIO;
    $correo = $update->CORREO_USUARIO;
    $contrasenia = $update->CONTRASENIA_USUARIO;
    $fecha_cambios = $update->FECHA_CAMBIOS;
    $id_rol = $update->ID_ROL;

    $titulo = "Mostrando perfil de: " . $nick;
    $boton = "Actualizar Usuario";
    $accion = "update_usuario";
}
?>
<script>
    function getDate() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }

        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '/' + mm + '/' + dd;
        console.log(today);
        document.getElementById("date").value = today;
    }


    window.onload = function() {
        getDate();
    };
</script>
<script>
    $('#element').toast('show')
</script>
<?php
date_default_timezone_set('UTC');
$hoy = date('Y-m-d');
?>

<section class="home-section">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/button_style.css'; ?>">
    <div class="container">
        <div class="row">
            <div class="col-xs-12" style="margin-left: 75px; padding-right: 20px">
                <h3><?php echo $titulo ?></h3>
                <br>
                <form class="row g-3" action="<?= base_url() . 'UsuarioController/' . $accion; ?>" method="post" autocomplete="off">
                    <?php echo $id; ?>
                    <div class="col-md-12">
                        <p>
                        <h5>Su nombre en el sistema: </h6>
                            <?= $nombre; ?>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <h5>Nombre de usuario</h5>
                            <?= $nick; ?>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <h5>Su correo eléctronico</h5>
                            <?= $correo; ?>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <h5>Last changes:</h5>
                            <?=$fecha_cambios;?>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>