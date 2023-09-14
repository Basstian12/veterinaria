<?php

require('../../config/database.php');


$cliente = $_POST['resultados'];
$codigoMascota = $_POST['codigoMascota'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$colorPelo = $_POST['colorPelo'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$pesoAnterior = $_POST['pesoAnterior'];
$pesoActual = $_POST['pesoActual'];




// Recupera los demás campos aquí

 $sql = "INSERT INTO mascotas (cliente_id, codigo_mascota, nombre, especie, raza, color_pelo, fecha_nacimiento, peso_anterior, peso_actual)
        VALUES ('$cliente', '$codigoMascota', '$nombre', '$especie', '$raza', '$colorPelo', '$fechaNacimiento', '$pesoAnterior', '$pesoActual')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
} 


?>