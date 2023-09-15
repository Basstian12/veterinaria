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

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


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
                    <h1 class="h2 text-dark">Administración de clientes</h1>
                </div>
                <!-- Aquí va el contenido de la página -->
                <div class="container">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-person-plus"></i> Nuevos clientes
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar un nuevo cliente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="codigo" class="form-label">Código</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo" required placeholder="@HERNANDEZ01">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre Completo</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="correo" name="correo" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rfc" class="form-label">RFC</label>
                                            <input type="text" class="form-control" id="rfc" name="rfc" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="codigoPostal" class="form-label">Código Postal</label>
                                            <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="numeroCuenta" class="form-label">Número de Cuenta</label>
                                            <input type="text" class="form-control" id="numeroCuenta" name="numeroCuenta" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </form>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector("form");

                                        form.addEventListener("submit", function(event) {
                                            event.preventDefault();

                                            const formData = new FormData(form);

                                            fetch("registrar.php", {
                                                    method: "POST",
                                                    body: formData
                                                })
                                                .then(response => response.text())
                                                .then(data => {
                                                    if (data === "success") {
                                                        Swal.fire({
                                                            icon: "success",
                                                            title: "Registro exitoso",
                                                            text: "El registro ha sido exitoso.",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        }).then(() => {
                                                            window.location.href = "clientes.php";
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            icon: "error",
                                                            title: "Error",
                                                            text: "Hubo un error al registrar.",
                                                            confirmButtonColor: "#d33",
                                                            confirmButtonText: "Ok"
                                                        });
                                                    }
                                                });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>



                <!-- consulta -->
                <?php


                $sql = "SELECT codigo, nombre, correo, telefono FROM clientes";
                $result = $conn->query($sql);

                ?>

                <div class="container mt-5">
                    <h2>Registros</h2>
                    <table id="myTable" class="display table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["codigo"] . "</td>";
                                    echo "<td>" . $row["nombre"] . "</td>";
                                    echo "<td>" . $row["correo"] . "</td>";
                                    echo "<td>" . $row["telefono"] . "</td>";
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