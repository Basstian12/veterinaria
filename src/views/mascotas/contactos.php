<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto-Mascota</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    require('../../config/database.php');
    ?>

    <div class="container-fluid c-header">
        <div class="fw-barra">
            <i class="bi bi-list " id="mostrarIcono"></i>
            <i class="bi bi-x-circle d-none" id="ocultarIcono"></i>

        </div>
        <div class="text-center">
            <h2 class="text-center fw-bold logo">HUELLITAS</h2>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">

            <?php

            require('../nav.php');

            ?>

            <!-- Contenido Principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <!-- consulta -->
                <?php


                $id = $_GET['id'];

                $sql = "SELECT mascotas.nombre AS mascotas_nombre, raza, color_pelo, fecha_nacimiento, peso_anterior, peso_actual, clientes.nombre AS nombre_cliente, correo, telefono FROM mascotas
                JOIN clientes ON mascotas.cliente_id = clientes.id
                 WHERE mascotas.id = $id"; // Cambia 'mascotas' por el nombre de tu tabla

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nombre = $row["mascotas_nombre"];
                    $raza = $row["raza"];
                    $color_pelo = $row["color_pelo"];
                    $fecha_nacimiento = $row["fecha_nacimiento"];
                    $peso_anterior = $row["peso_anterior"];
                    $peso_actual = $row["peso_actual"];
                    $nombre_cliente = $row["nombre_cliente"];
                    $correo = $row["correo"];
                    $telefono = $row["telefono"];
                } else {
                    echo "No se encontró el registro.";
                    exit();
                }


                ?>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-dark">Contactos de <?php echo $nombre; ?> </h1>
                </div>
                <!-- Aquí va el contenido de la página -->
                <div class="container">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-people"></i> Asociar contactos
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Asociar mascota con un cliente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registroContacto">
                                        <!--  buscar cliente -->
                                        <div class="mb-3">
                                            <label for="busqueda" class="form-label">Buscar cliente:</label>
                                            <input type="text" class="form-control" id="busqueda">
                                        </div>
                                        <div class="mb-3">
                                            <label for="clientes" class="form-label">Cliente:</label>
                                            <select class="form-select" id="clientes" name="clientes">

                                            </select>
                                        </div>


                                        <script>
                                            $(document).ready(function() {
                                                $('#busqueda').on('input', function() {
                                                    var busqueda = $(this).val();
                                                    if (busqueda.length >= 3) {
                                                        $.ajax({
                                                            type: 'GET',
                                                            url: 'buscar.php', // Archivo PHP que realizará la búsqueda en la base de datos
                                                            data: {
                                                                busqueda: busqueda
                                                            },
                                                            success: function(response) {
                                                                $('#clientes').html(response);
                                                            }
                                                        });
                                                    } else {
                                                        $('#clientes').html('');
                                                    }
                                                });
                                            });
                                        </script>

                                        <!-- buscar mascota -->
                                        <div class="mb-3">
                                            <label for="busqueda2" class="form-label">Buscar mascota:</label>
                                            <input type="text" class="form-control" id="busqueda2">
                                        </div>
                                        <div class="mb-3">
                                            <label for="resultados" class="form-label">Mascota:</label>
                                            <select class="form-select" id="mascotas" name="mascotas">

                                            </select>
                                        </div>


                                        <script>
                                            $(document).ready(function() {
                                                $('#busqueda2').on('input', function() {
                                                    var busqueda2 = $(this).val();
                                                    if (busqueda2.length >= 3) {
                                                        $.ajax({
                                                            type: 'GET',
                                                            url: 'buscar_mascota.php', // Archivo PHP que realizará la búsqueda en la base de datos
                                                            data: {
                                                                busqueda2: busqueda2
                                                            },
                                                            success: function(response) {
                                                                $('#mascotas').html(response);
                                                            }
                                                        });
                                                    } else {
                                                        $('#mascotas').html('');
                                                    }
                                                });
                                            });
                                        </script>


                                        <button type="submit" class="btn btn-primary">Vincular</button>
                                    </form>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#registroContacto').submit(function(e) {
                                            e.preventDefault(); // Evita el comportamiento por defecto del formulario

                                            var formData = $(this).serialize(); // Serializa los datos del formulario

                                            $.ajax({
                                                type: 'POST',
                                                url: 'vincular.php', // Archivo PHP para el procesamiento del registro
                                                data: formData,
                                                success: function(response) {
                                                    if (response === 'success') {
                                                        Swal.fire({
                                                            icon: "success",
                                                            title: "Vinculado exitoso",
                                                            text: "El contacto se ha vinculado con exito.",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        }).then(() => {
                                                            /* window.location.href = "contactos.php"; */
                                                        });
                                                        // Puedes redirigir a otra página aquí si lo deseas
                                                    } else {
                                                        Swal.fire({
                                                            icon: "error",
                                                            title: "Error",
                                                            text: "Hubo un error al vincular.",
                                                            confirmButtonColor: "#d33",
                                                            confirmButtonText: "Ok"
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                    });
                                </script>


                            </div>
                        </div>
                    </div>


                    <!-- consulta -->

                    <!-- Della del animal -->
                    <br><br>
                    <div class="container d-flex">
                        <div class="card w-25 me-2">
                            <div class="card-body">
                                <h5 class="card-title">DETALLES</h5>
                                <label for="nombre" class="fw-bold">Raza: </label>
                                <p class="card-text"><?php echo $raza; ?></p>
                                <label for="nombre" class="fw-bold">Color del pelo: </label>
                                <p class="card-text"><?php echo $color_pelo; ?></p>
                                <label for="nombre" class="fw-bold">Fecha de nacimiento: </label>
                                <p class="card-text"><?php echo $fecha_nacimiento ?></p>
                                <label for="nombre" class="fw-bold">Peso medio: </label>
                                <p class="card-text"><?php echo $peso_anterior ?></p>
                                <label for="nombre" class="fw-bold">Peso actual: </label>
                                <p class="card-text"><?php echo $peso_actual ?></p>
                                <label for="nombre" class="fw-bold">Dueño: </label>
                                <p class="card-text"><?php echo $nombre_cliente ?></p>
                            </div>
                        </div>
                        <div class="card w-25 me-2">
                            <div class="card-body">
                                <h5 class="card-title">DUEÑO</h5>
                                <label for="nombre" class="fw-bold">Nombre: </label>
                                <p class="card-text"><?php echo $nombre_cliente ?></p>
                                <label for="nombre" class="fw-bold">Correo: </label>
                                <p class="card-text"><?php echo $correo ?></p>
                                <label for="nombre" class="fw-bold">Telefono: </label>
                                <p class="card-text"><?php echo $telefono ?></p>

                            </div>
                        </div>

                        <!-- consulta de personas vinculadas -->
                        <?php


                        $id = $_GET['id'];

                        $sql = "SELECT clientes.nombre AS contacto_nombre, clientes.correo AS contacto_correo, 
                        clientes.telefono AS contacto_telefono
                         FROM contactos
                 JOIN clientes ON contactos.id_contactocliente = clientes.id
                 JOIN mascotas ON contactos.id_contactomascota = mascotas.id
                 WHERE mascotas.id = $id"; // Cambia 'mascotas' por el nombre de tu tabla

                        $consult = $conn->query($sql);

                        if ($consult->num_rows > 0) {
                            $row = $consult->fetch_assoc();
                            $cliente = $row["contacto_nombre"];
                            $clienteCorreo = $row["contacto_correo"];
                            $clienteTelefono = $row["contacto_telefono"];
                        } else {

                            // Tu código PHP para realizar ciertas operaciones...

                            // Luego, si deseas mostrar una alerta de Bootstrap basada en ciertas condiciones:
                            $mensaje = "NO HAY PERSONAS VINCULADAS";
                            $tipoAlerta = "warning"; // Puede ser "success", "info", "warning" o "danger"

                            // Genera el código HTML para el div de alerta
                            $alertHTML = '<div class="alert alert-' . $tipoAlerta . ' alert-dismissible fade show" role="alert">';
                            $alertHTML .= $mensaje;
                            $alertHTML .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            $alertHTML .= '</div>';

                            // Luego, en el lugar donde deseas mostrar la alerta, simplemente imprime el HTML generado
                            echo $alertHTML;

                            exit();
                        }

                        $conn->close();
                        ?>


                        <div class="card w-25 me-2">
                            <div class="card-body">
                                <h5 class="card-title">Personas vinculadas</h5>
                                <label for="nombre" class="fw-bold">Nombre: </label>
                                <p class="card-text"><?php echo $cliente ?></p>
                                <label for="nombre" class="fw-bold">Correo: </label>
                                <p class="card-text"><?php echo $clienteCorreo ?></p>
                                <label for="nombre" class="fw-bold">Telefono: </label>
                                <p class="card-text"><?php echo $clienteTelefono ?></p>


                            </div>
                        </div>

                    </div>



                </div>

            </main>
        </div>
    </div>







</body>

</html>