<?php

require('../../config/database.php');


$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$rfc = $_POST['rfc'];
$codigoPostal = $_POST['codigoPostal'];
$direccion = $_POST['direccion'];
$numeroCuenta = $_POST['numeroCuenta'];

$sql = "INSERT INTO clientes (codigo, nombre, correo, telefono, rfc, cp, direccion, no_cuenta) VALUES ('$codigo', '$nombre', '$correo', '$telefono', '$rfc', '$codigoPostal', '$direccion', '$numeroCuenta')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}


?>