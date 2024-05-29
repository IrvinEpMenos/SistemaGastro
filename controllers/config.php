<?php
// Datos de la conexión
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sisgastro";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos";

// Aquí puedes agregar código adicional para interactuar con la base de datos

// Cerrar la conexión
$conn->close();
?>
