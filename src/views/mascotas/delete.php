<?php

require_once('../../config/database.php');

if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $sql = "DELETE FROM mascotas WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "ERROR: No se pudo eliminar el registro.";
    }
    mysqli_close($conn);
}
