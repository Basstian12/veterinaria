<?php

require('../../config/database.php');

$busqueda = $_GET['busqueda'];

$sql = "SELECT * FROM clientes WHERE nombre LIKE '%$busqueda%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {

echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";

}
} else {
echo "<option>No se encontraron resultados</option>";
}

?>