<?php
if (isset($update)) {
    $id = '<input type="hidden" name="id_usuario" value="' . $this->uri->segment(3) . '">';
    $nombre = $update->NOMBRE_USUARIO;
    $nick = $update->NICK_USUARIO;
    $correo = $update->CORREO_USUARIO;
    $contrasenia = $update->CONTRASENIA_USUARIO;
    $recovery_pregunta = base64_decode($update->RECOVERY_PREGUNTA);
    $recovery_respuesta = base64_decode($update->RECOVERY_RESPUESTA);
    $fecha_cambios = $update->FECHA_CAMBIOS;
    $id_rol = $update->ID_ROL;

    $titulo = "Mostrando datos de: " . $nick;
    $boton = "Salvar";
    $accion = "update_my_profile";
}
?>
<script type="text/javascript">
    $(document).on('change', '#generador', function(event) {
        $('#pregunta').val($("#generador option:selected").text());
    });
</script>

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
                <form class="row g-3" action="<?= base_url() . 'MyProfile/' . $accion; ?>" method="post" autocomplete="off">
                    <?php echo $id; ?>
                    <div class="col-md-6">
                        <label for="nombreUsuario" class="form-label">Tú nombre en el sistema</label>
                        <input type="text" class="form-control" name="nombre" value="<?= $nombre; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Tú usuario</label>
                        <input type="text" class="form-control" name="nick" value="<?= $nick; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Tú correo electronico</label>
                        <input type="text" class="form-control" name="correo" value="<?= $correo; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Su Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" value="<?= $contrasenia; ?>">
                    </div>
                    <div class="col-md-12 alert alert-success">
                        <label>Subjerecias de posibles preguntas o pistas</label>
                        <select class="form-control" name="generador" id="generador">
                            <option value="" selected="selected">Seleccione</option>
                            <option value="1">Nombre de tu mamá</option>
                            <option value="2">Nombre de tu papá</option>
                            <option value="3">Nombre de tu primera mascota</option>
                            <option value="4">Lugar de nacimiento</option>
                            <option value="5">Nombre de tu primer amor</option>
                            <option value="6">Nombre de tu mejor amigo/a</option>
                            <option value="7">Nombre de tu conyugue</option>
                            <option value="8">Nombre tu primer hijo/a</option>
                            <option value="9">Color favorito</option>
                            <option value="10">Tu comida favorita</option>
                            <option value="11">Número de teléfono</option>
                            <option value="12">Número favorito</option>
                        </select>
                    </div>
                    <div class="col-md-6 alert alert-warning">
                        <label for="inputAddress2" class="form-label">Pregunta de recuperación</label>
                        <input type="text" class="form-control" id="pregunta" name="pregunta" value="<?= $recovery_pregunta; ?>">
                    </div>
                    <div class="col-md-6 alert alert-danger">
                        <label for="inputAddress2" class="form-label">Respuesta</label>
                        <input type="text" class="form-control" name="respuesta" value="<?= $recovery_respuesta; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Fecha</label>
                        <input type="text" class="form-control" name="fecha_cambios" value="<?php print_r($hoy); ?>" readonly="readonly">
                    </div>
                    <input type="hidden" name="id_rol" value="<?= $id_rol ?>">

                    <div class="col-12">
                        <button class="custom-btn btn-7"><span><?php echo $boton ?></span></button>
                        <a id="boton" class="custom-btn btn-5" href="<?= base_url().'LoginController/inicio'; ?>"><span>Cancelar</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>