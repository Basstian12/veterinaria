<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-dark">Administracion de mascotas</h1>
                </div>
                <!-- Aquí va el contenido de la página -->
                <div class="container">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-plus"></i> Nuevo mascota
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar una mascota</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registroMascota">
                                        <!--  buscar cliente -->
                                        <div class="mb-3">
                                            <label for="busqueda" class="form-label">Buscar:</label>
                                            <input type="text" class="form-control" id="busqueda">
                                        </div>
                                        <div class="mb-3">
                                            <label for="resultados" class="form-label">Cliente:</label>
                                            <select class="form-select" id="resultados" name="resultados">

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
                                                                $('#resultados').html(response);
                                                            }
                                                        });
                                                    } else {
                                                        $('#resultados').html('');
                                                    }
                                                });
                                            });
                                        </script>


                                        <div class="mb-3">
                                            <label for="codigoMascota" class="form-label">Código Mascota</label>
                                            <input type="text" class="form-control" id="codigoMascota" name="codigoMascota" required placeholder="@P01">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="especie" class="form-label">Especie</label>
                                            <input type="text" class="form-control" id="especie" name="especie" required placeholder="Perro-Gato...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="raza" class="form-label">Raza</label>
                                            <input type="text" class="form-control" id="raza" name="raza" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="colorPelo" class="form-label">Color de Pelo</label>
                                            <input type="text" class="form-control" id="colorPelo" name="colorPelo" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pesoAnterior" class="form-label">Peso Anterior</label>
                                            <input type="number" class="form-control" id="pesoAnterior" name="pesoAnterior" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pesoActual" class="form-label">Peso Actual</label>
                                            <input type="number" class="form-control" id="pesoActual" name="pesoActual" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar Mascota</button>
                                    </form>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#registroMascota').submit(function(e) {
                                            e.preventDefault(); // Evita el comportamiento por defecto del formulario

                                            var formData = $(this).serialize(); // Serializa los datos del formulario

                                            $.ajax({
                                                type: 'POST',
                                                url: 'insertar.php', // Archivo PHP para el procesamiento del registro
                                                data: formData,
                                                success: function(response) {
                                                    if (response === 'success') {
                                                        Swal.fire({
                                                            icon: "success",
                                                            title: "Registro exitoso",
                                                            text: "El registro ha sido exitoso.",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        }).then(() => {
                                                            window.location.href = "mascotas.php";
                                                        });
                                                        // Puedes redirigir a otra página aquí si lo deseas
                                                    } else {
                                                        Swal.fire({
                                                            icon: "error",
                                                            title: "Error",
                                                            text: "Hubo un error al registrar.",
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
                    <?php


                    $sql = "SELECT mascotas.nombre AS nombre_mascota, mascotas.raza, clientes.nombre AS nombre_cliente, mascotas.id AS id_mascota FROM mascotas
        JOIN clientes ON mascotas.cliente_id = clientes.id";

                    $result = $conn->query($sql);

                    ?>

                    <div class="container mt-5">
                        <h2>Registros</h2>
                        <table id="myTable" class="display table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Raza</th>
                                    <th>Dueño</th>
                                    <th><i class="bi bi-person-lines-fill"></i> Contactos</th>
                                    <th><i class="fas fa-clock"></i> Historial</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";

                                        echo "<td>" . $row["nombre_mascota"] . "</td>";
                                        echo "<td>" . $row["raza"] . "</td>";
                                        echo "<td>" . $row["nombre_cliente"] . "</td>";
                                        echo "<td><a href='contactos.php?id=" . $row['id_mascota'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> </td>";
                                        echo "<td><a href='historial.php?id=" . $row['id_mascota'] . "' class='btn btn-primary'><i class='bi bi-eye'></i></a> </td>";
                                        echo "<td>
                                    <a href='' class='btn btn-info'><i class='bi bi-pencil-square'></i></a>
                                    <a href='' class='btn btn-danger'><i class='bi bi-trash'></i></a>
                                    </td>";

                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No se encontraron registros.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </main>
        </div>
    </div>





    <script>
        const mostrarIcono = document.getElementById("mostrarIcono");
        const ocultarIcono = document.getElementById("ocultarIcono");
        const miDiv = document.getElementById("miDiv");

        mostrarIcono.addEventListener("click", function() {
            miDiv.style.display = "block";
            mostrarIcono.classList.add("d-none");
            ocultarIcono.classList.remove("d-none");
        });

        ocultarIcono.addEventListener("click", function() {
            miDiv.style.display = "none";
            ocultarIcono.classList.add("d-none");
            mostrarIcono.classList.remove("d-none");
        });
    </script>

</body>

</html>