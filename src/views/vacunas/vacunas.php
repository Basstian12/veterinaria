<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacunass</title>
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
                    <h1 class="h2 text-dark">Administración de vacunación</h1>
                </div>
                <!-- Aquí va el contenido de la página -->
                <div class="container">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-heart-pulse"></i> Vacunar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar vacunación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registroVacuna">
                                        <!--  buscar cliente -->
                                        <div class="mb-3">
                                            <label for="busqueda" class="form-label">Buscar:</label>
                                            <input type="text" class="form-control" id="busqueda">
                                        </div>
                                        <div class="mb-3">
                                            <label for="resultados" class="form-label">Mascota:</label>
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
                                            <label for="nombre" class="form-label">Fecha de vacunacion:</label>
                                            <input type="date" class="form-control" id="fecha" name="fechaVacunacion" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="especie" class="form-label">Enfermedad:</label>
                                            <select class="form-select" id="tipo_vacuna" name="enfermedad">
                                                <option value="0">Seleccionar</option>
                                                <option value="Rabia">Rabia</option>
                                                <option value="Moquillo">Moquillo</option>
                                                <option value="Parvovirus">Parvovirus</option>
                                                <option value="Leptospirosis">Leptospirosis</option>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <label for="raza" class="form-label">Comentarios:</label>
                                            <textarea class="form-control" id="comentarios" name="comentarios" rows="3" required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>

                                    </form>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#registroVacuna').submit(function(e) {
                                            e.preventDefault(); // Evita el comportamiento por defecto del formulario

                                            var formData = $(this).serialize(); // Serializa los datos del formulario

                                            $.ajax({
                                                type: 'POST',
                                                url: 'registrar.php', // Archivo PHP para el procesamiento del registro
                                                data: formData,
                                                success: function(response) {
                                                    if (response === 'success') {
                                                        Swal.fire({
                                                            icon: "success",
                                                            title: "Se guardo el registro",
                                                            text: "Vacunacion guardada.",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        }).then(() => {
                                                            window.location.href = "vacunas.php";
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


                    $sql = "SELECT codigo_mascota AS alias, mascotas.nombre AS nombre_mascota,
                     fecha_vacunacion, enfermedad, comentarios FROM historial
                     JOIN mascotas ON historial.mascota_id = mascotas.id";

                    $result = $conn->query($sql);

                    ?>

                    <div class="container mt-5">
                        <h2>Historial</h2>
                        <table id="myTable" class="display table">
                            <thead>
                                <tr>
                                    <th>Alias</th>
                                    <th>Mascota</th>
                                    <th>Fecha</th>
                                    <th>Enfermedad</th>
                                    <th>Comentarios</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["alias"] . "</td>";
                                        echo "<td>" . $row["nombre_mascota"] . "</td>";
                                        echo "<td>" . $row["fecha_vacunacion"] . "</td>";
                                        echo "<td>" . $row["enfermedad"] . "</td>";
                                        echo "<td>" . $row["comentarios"] . "</td>";
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