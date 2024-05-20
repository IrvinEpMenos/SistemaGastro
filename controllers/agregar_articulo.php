<?php
include 'config.php'; //Incluye tu archivo de configuracion de la base de datos 


$message= ''; //inicializa una variable para almacenar el mensaje

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['rutaImagen'])){
    $error = $_FILES['rutaImagen']['error'];
    //verificar si el archivo ha sido cargado
    if($error === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['rutaImagen']['tmp_name'];
        $fileName = $_FILES['rutaImagen']['name'];
        $fileSize= $_FILES['rutaImagen']['size'];
        $fileType = $_FILES['rutaImagen']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtoLower(end($fileNameCmps));
    // Extensiones permitidas
$allowedfileExtensions = ['jpeg', 'jpg', 'png'];
// Se define el tamaño maximo permitido para los archivos que se cargan en el servidor,en este caso, se establecio en 5 megabytes (MB). Aqui, 1024 1024 convierte un megabyte a bytes (pues 1KB 1024 bytes y 1MB 1024KB), y luego se multiplica por 5 para obtener el total de bytes equivalentes a 5MB.
$maxFileSize = 5* 1024* 1024; // 5 MB, se ajusta este valor segun a las necesidades
if (in_array($fileExtension, $allowedfileExtensions) && $fileSize <= $maxFileSize) {
// Directorio donde se guardaran las imagenes
$uploadFileDir ='./uploaded_images/';
$nombreArticulo = $_POST['nombreArticulo']; 
$cantidadExistente = $_POST['cantidadExistente'];
$randomNumber= rand(1000, 9999); // Numero aleatorio
$nombreArticuloFormatted= preg_replace('/[^A-Za-z0-9-]/', '', $nombreArticulo); 
$newFileName = $nombreArticuloFormatted . '-'  . $cantidadExistente.'_'.$randomNumber.'.'.$fileExtension;
$dest_path= $uploadFileDir .$newFileName;
if (!file_exists($uploadFileDir)) {
    mkdir($uploadFileDir, 0755, true);

}
if(move_uploaded_file($fileTmpPath, $dest_path)) {
$sql = "INSERT INTO articulos (nombre, cantidad, imagen) VALUES (?, ?, ?)";
if($stmt =$conn->prepare($sql)) {
$stmt->bind_param("sis", $nombreArticulo, $cantidadExistente, $dest_path);
if($stmt->execute()) {
$message="¡Nuevo registro creado con éxito!";
} else {
    $message = "Error al insertar en la base de datos:". $stmt->error;
    } $stmt->close();
    } } else {
    $message = 'Error al mover el archivo cargado.';
    }
    } else {
    if ($fileSize > $maxFileSize) {
        $message= 'El archivo excede el tamaño máximo permitido.';
    } else {

    $message='El tipo de archivo cargado no está permitido. Solo se admiten archivos .jpeg, .jpg, .png';
    }
    }
    } else {
    $message ='Error al cargar el archivo. Código de error: '.$error;
    }
    } else {
    $message ='Por favor, seleccione un archivo para cargar.'; 
    }
    $conn->close();
    // Usamos $message para imprimir el echo en el alert de JavaScript que mostrara la alerta y redireccionara
    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'form.html';</script>";
    ?>