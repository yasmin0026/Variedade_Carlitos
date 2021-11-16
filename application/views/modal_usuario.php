<!-- ALERTA -->
<div class="col-md-4 col-md-offset-4" style="position:fixed;" id="msj"></div>
<!-- Modal de mi perfil -->
<!-- Modal -->
<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabels" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabels">Mi perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php echo form_open('', array('id'=>'my_form')) ?>
                <div class="red" id="msj_form"></div>
                <?php echo form_open('', array('id' => 'my_form')) ?>
                <input type="hidden" name="id_usuario" id="id_usuario">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required="true">
                </div>

                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required="true">
                </div>


                <div class="form-group">
                    <label for="clave">Nick Usuario:</label>
                    <input type="password" class="form-control" id="clave" name="clave">
                </div>
                <div class="form-group">
                    <label for="clave_">Confirmar clave: *</label>
                    <input type="password" class="form-control" id="clave_" name="clave_">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_form()">Guardar</button>
            </div>
            <?php echo form_close() ?>
            <?= validation_errors(); ?>
        </div>
    </div>
</div>



<script>
    var img = '<i class="glyphicon glyphicon-dashboard"></i>';
    setTimeout(function() {
        traer_lista();
    }, 500);

    function traer_lista() {
        $.ajax({
            url: 'UsuarioController/editar_usuario', 
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
                alerta(img + ' Espere...');
            },
            success: function(data) {
                alerta();
                $('#lista').empty();
                if (data.type == false) {
                    alerta(data.message, false);
                } else {
                    var fila = '';
                    $.each(data.lista, function(k, v) {
                        fila = '<tr tabindex="2014' + v.id_usuario + '" >';
                        fila += '<td>' + v.usuario + '</td>';
                        fila += '<td>';
                        fila += '<div class="btn-group"><a class="btn btn-outline-warning" onclick="prepara_form(\'Editar\',' + v.id_usuario + ')">EDITAR</a>';
                        fila += '<a class="btn btn-outline-danger" onclick="confirm_delete( ' + v.id_usuario + ' )">ELIMINAR</a></div>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#lista').append(fila);
                    });
                }
            },
            error: function() {
                alerta();
                dialogo('Error', 'Error en la función usuarios/traer_lista.');
            }
        });
    };

    function prepara_form(accion, id_usuario) {
        $('#my_form')[0].reset();
        $('#genero option[value=""]').attr('selected', true);
        $('#id_usuario').val(id_usuario);
        if (accion == 'Editar') {
            $.ajax({
                url: 'usuarios/traer_usuario ',
                type: 'post',
                dataType: 'json',
                data: {
                    "id_usuario": id_usuario
                },
                beforeSend: function() {
                    alerta(img + ' Espere...');
                },
                success: function(data) {
                    alerta();
                    if (data.type == false) {
                        $("#dialogo").removeClass('d-none');
                        $('.notify').html(data.message);
                    } else {
                        $('#addUserModal').modal('show');
                        var v = data.usuario[0];
                        $('#id_rol').val(v.id_rol);
                        $('#usuario').val(v.usuario);
                        $('#genero option[value="' + v.genero + '"]').attr('selected', true)
                        load_form(accion);
                    }
                },
                error: function() {
                    alerta();
                    dialogo('Error', 'Error en la función usuarios/traer_usuario.');
                }
            });
        } else {
            load_form(accion);
        }
    }; // -----------------------
    function load_form(accion) {
        $("#addUserModal").modal('show');
    }; // ---------------
    function save_form() {
        $.ajax({
            url: 'usuarios/save_form',
            type: 'post',
            dataType: 'json',
            data: $('#my_form').serialize(),
            beforeSend: function() {
                $('#msj_form').html(img + ' Espere...');
            },
            success: function(data) {
                $('#msj_form').empty();
                if (data.type == false) {
                    $("#dialogo").removeClass('d-none');
                    $('.notify').html(data.message);
                } else {
                    $('#addUserModal').modal('hide');
                    traer_lista();
                    setTimeout(function() {
                        alerta(data.message, true);
                        $('tr[tabindex="2014' + data.id_usuario + '"]').focus();
                    }, -1000);
                }
            },
            error: function() {
                $('#msj_form').empty();
                dialogo('Error', 'Error en la función usuarios/save_form.');
            }
        });
    };

    function confirm_delete(id_usuario) {
        //$('.notify').html( '¿Confirma que desea eliminar este usuario?' );
        $("#modalDelete").modal('show');
        $("#deleteTrue").click(function(event) {
            delete_(id_usuario);
            $("#modalDelete").modal('hide');
        });
    }; // --------------------------
    function delete_(id_usuario) {
        $.ajax({
            url: 'usuarios/delete_',
            type: 'post',
            dataType: 'json',
            data: {
                id_usuario: id_usuario
            },
            beforeSend: function() {
                alerta(img + ' Espere...');
            },
            success: function(data) {
                alerta();
                if (data.type == false) {
                    $("#dialogo").removeClass('d-none');
                    $('.notify').html(data.message);
                } else {
                    $("#dialogo").modal("hide");
                    setTimeout(function() {
                            alerta(data.message, true);
                        },
                        -1000);
                    traer_lista();
                }
            },
            error: function() {
                alerta();
                dialogo('Error', 'Error en la función usuarios/delete_.');
            }
        });
    }
</script>
<style>
    .red {
        color: red;
        min-height: 30px
    }

    .completa {
        width: 100%
    }

    .hide_ {
        display: none
    }

    table td {
        padding: 5px
    }

    table td i {
        margin: 5px
    }
</style>