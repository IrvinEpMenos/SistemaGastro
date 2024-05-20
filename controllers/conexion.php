<?php
//configuracion de la db
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sistemagastro";

//crear conexion a db
$conn =new mysqli($hostname, $username, $password, $dbname);

//configura la codificacion de caracteres a UTF8
//$conn->set_charset("utf8mb4");

//verifica la conexion
if ($conn ->connect_error){
    die("Connection failed: " . $conn->connect_error);

}
?>