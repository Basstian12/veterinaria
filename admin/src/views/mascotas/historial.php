<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
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


                <!-- Busqueda de mascota con el id -->

                <!-- consulta -->
                <?php


                $id = $_GET['id'];

                $sql = "SELECT mascotas.nombre AS mascotas_nombre FROM mascotas
                 WHERE mascotas.id = $id"; // Cambia 'mascotas' por el nombre de tu tabla

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nombre = $row["mascotas_nombre"];
                } else {
                    echo "No se encontró el registro.";
                    exit();
                }


                ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-dark">Historial medica de <?php echo $nombre; ?></h1>
                </div>
                <!-- Aquí va el contenido de la página -->
                <div class="container">
                    <!-- consulta -->
                    <?php


                    $sql = "SELECT codigo_mascota AS alias, mascotas.nombre AS nombre_mascota,
                     fecha_vacunacion, enfermedad, comentarios FROM historial
                     JOIN mascotas ON historial.mascota_id = mascotas.id
                     WHERE historial.mascota_id = $id";

                    $result = $conn->query($sql);

                    ?>

                    <div class="container mt-5">
                        <h2>Historial</h2>
                        <table id="myTable" class="display table">
                            <thead>
                                <tr>
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
                                        echo "<td>" . $row["fecha_vacunacion"] . "</td>";
                                        echo "<td>" . $row["enfermedad"] . "</td>";
                                        echo "<td>" . $row["comentarios"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No cuenta con historial médica</td></tr>";
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