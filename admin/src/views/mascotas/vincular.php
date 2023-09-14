<?php

require('../../config/database.php');


$cliente = $_POST['clientes'];
$mascota = $_POST['mascotas'];





// Recupera los demás campos aquí

 $sql = "INSERT INTO contactos (id_contactocliente, id_contactomascota)
        VALUES ('$cliente', '$mascota')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
