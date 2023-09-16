// botón eliminar cliente

$(document).ready(function () {
    $('.eliminar').click(function () {
        var id = $(this).data('id');
        Swal.fire({
            title: '¿Está seguro?',
            text: "No podrá revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Se ha eliminado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // Redireccionar a otra página después de eliminar el registro
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        })
    });
});


/* boton eliminar mascotas */
$(document).ready(function () {
    $('.eliminar_mascota').click(function () {
        var id = $(this).data('id');
        Swal.fire({
            title: '¿Está seguro?',
            text: "No podrá revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Se ha eliminado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // Redireccionar a otra página después de eliminar el registro
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        })
    });
});

//actualizar datos de clientes a la bd

$(document).ready(function () {
    // Capturar evento de envío del formulario
    $('#form_clientes').submit(function (event) {
        // Evitar el comportamiento por defecto del formulario
        event.preventDefault();

        // Obtener los datos del formulario
        var datos = $(this).serialize();

        // Enviar los datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: 'update_save.php',
            data: datos,
            success: function (result1) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Datos Actualizados',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    // Después de que se cierre la alerta (después de 2 segundos en este caso),
                    // redirige al usuario a otra página utilizando JavaScript
                    window.location.href = 'clientes.php'; // Reemplaza 'nueva_pagina.html' con la URL de la página a la que deseas redirigir al usuario
                });
                
            },
            error: function () {
                // Mostrar mensaje de error
                alert('Error al insertar registro');
            }
        });
    });
});