<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require('database.php');


$email = $_POST["email"];
$password = $_POST["password"];


    session_start();
    $sql = "SELECT * FROM recepcion WHERE correo = '$email' AND contraseña = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Obtener los datos del usuario desde la base de datos
        $row = $result->fetch_assoc();

        // Crear una sesión y almacenar los datos del usuario
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['nombre'];

        // Redirigir al usuario a la página de inicio
        header("Location: ../views/site/home.php");
    } else {
        header("Location: ../../index.php?error");
        die();
    }


?>