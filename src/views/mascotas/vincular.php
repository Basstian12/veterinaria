<?php

require('../../config/database.php');


$cliente = $_POST['clientes'];
$mascota = $_POST['mascotas'];
$parentesco = $_POST['parentesco'];





// Recupera los demás campos aquí

 $sql = "INSERT INTO contactos (id_contactocliente, id_contactomascota, parentesco)
        VALUES ('$cliente', '$mascota', '$parentesco')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
