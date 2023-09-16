
<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)

require('../../config/database.php');


// Recupera los datos enviados desde el formulario (asegúrate de validar y limpiar los datos)
$idUsuario = $_POST['id']; // Supongamos que tienes un campo oculto con el ID del usuario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$nocuenta = $_POST['numeroCuenta'];
$rfc = $_POST['rfc'];
$cp = $_POST['codigoP'];
$direccion = $_POST['direccion'];

// Ejecuta la consulta SQL UPDATE
$sql = "UPDATE clientes SET 
    nombre = '$nombre',
    correo = '$correo',
    telefono = '$telefono',
    no_cuenta = '$nocuenta',
    rfc = '$rfc',
    cp = '$cp',
    direccion = '$direccion'
    WHERE id = $idUsuario"; // Ajusta la tabla y el campo ID según tu base de datos.

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
        swal("¡Éxito!", "Los datos se actualizaron correctamente.", "success").then(function() {
            window.location.href = "clientes.php"; // Redirigir pagina
        });
    </script>';
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cierra la conexión a la base de datos

?>