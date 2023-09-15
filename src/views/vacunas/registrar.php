<?php

require('../../config/database.php');


$mascota = $_POST['resultados'];
$fechaVacunacion = $_POST['fechaVacunacion'];
$enfermedad = $_POST['enfermedad'];
$comentarios = $_POST['comentarios'];





// Recupera los demás campos aquí...

 $sql = "INSERT INTO historial (mascota_id, fecha_vacunacion, enfermedad, comentarios)
        VALUES ('$mascota', '$fechaVacunacion', '$enfermedad', '$comentarios')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
