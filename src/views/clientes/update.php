<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos</title>
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
            <main class="col-md-6">
                <div class="d-flex">
                    <h1 class="h2 text-dark">Actualizar datos del cliente </h1>
                </div>
                <!-- Aquí va el contenido de la página -->
                <div class="container">
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM clientes WHERE id = '$id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Obtener los datos del usuario
                        $row = $result->fetch_assoc();
                        $id = $row['id'];
                        $nombre = $row['nombre'];
                        $correo = $row['correo'];

                        // Mostrar los datos del usuario


                    } else {
                        echo "Usuario no encontrado.";
                    }

                    ?>

                    <form id="form_clientes">
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <div class="">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="correo" class="form-label">Correo:</label>
                                        <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $row['correo'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono" class="form-label">Telefono:</label>
                                        <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $row['telefono'] ?>" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numeroCuenta" class="form-label">N° cuenta:</label>
                                        <input type="number" name="numeroCuenta" id="numeroCuenta" class="form-control" value="<?php echo $row['no_cuenta'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rfc" class="form-label">RFC:</label>
                                        <input type="text" name="rfc" id="rfc" class="form-control" value="<?php echo $row['rfc'] ?>" oninput="mayuscula(this)" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codigoP" class="form-label">Codigo Postal:</label>
                                        <input type="number" name="codigoP" id="codigoP" class="form-control" value="<?php echo $row['cp'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <textarea class="form-control" id="direccion" name="direccion" rows="3" required><?php echo $row['direccion'] ?></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>





                </div>
            </main>
        </div>
    </div>

    <!--  convertir palabras a mayuscula para input rfc -->
    <script>
        function mayuscula(input) {
            input.value = input.value.toUpperCase();
        }
    </script>



    <!-- para sweet alert en los botones -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="../../js/scripts.js"></script>


</body>

</html>