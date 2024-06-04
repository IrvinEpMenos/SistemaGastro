<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "sysgastro";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
  die("Error de conexión: " . mysqli_connect_error());
} else {
  echo 'Conexion exitosa';

mysqli_close($conn);
}