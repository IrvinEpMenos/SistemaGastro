<?php
// Verificar si se envió una imagen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['barcodeImage'])) {
    // Directorio donde se guardarán las imágenes cargadas
    $uploadDir = '../uploaded_images/';

    // Verificar si el directorio de carga existe, si no, crearlo
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Ruta completa del archivo de imagen cargado
    $uploadFile = $uploadDir . basename($_FILES['barcodeImage']['name']);

    // Mover el archivo cargado al directorio de carga
    if (move_uploaded_file($_FILES['barcodeImage']['tmp_name'], $uploadFile)) {
        // Incluir la biblioteca ZBar
        require 'path/to/zbar.php';

        // Crear un objeto de decodificador de código de barras
        $scanner = new ZBarCodeScanner();

        // Leer la imagen y decodificar el código de barras
        $results = $scanner->scan($uploadFile);

        // Verificar si se encontraron códigos de barras
        if (empty($results)) {
            $message = "No se encontraron códigos de barras en la imagen.";
        } else {
            // Mostrar los resultados
            $message = "<h1>Resultado del Código de Barras</h1>";
            foreach ($results as $result) {
                $message .= "<p>Tipo de código de barras: " . $result['type'] . "</p>";
                $message .= "<p>Contenido del código de barras: " . $result['data'] . "</p>";
            }
        }

        // Proporcionar un enlace para subir otra imagen
        $message .= '<a href="../views/qr.php">Volver a subir otra imagen</a>';
    } else {
        // Mostrar un mensaje de error si no se puede mover el archivo cargado
        $message = "<p>Error al subir el archivo.</p>";
        $message .= '<a href="../views/qr.php">Intentar nuevamente</a>';
    }
} else {
    // Mostrar un mensaje si no se proporcionó ninguna imagen para cargar
    $message = "<p>Por favor, sube una imagen.</p>";
    $message .= '<a href="../views/qr.php">Volver al formulario</a>';
}

echo $message;
?>
