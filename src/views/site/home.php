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
                    <h1 class="h2 text-dark">Binvenido Dr. Viko Gomez</h1>
                </div>
                <!-- Aquí va el contenido de la página -->

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