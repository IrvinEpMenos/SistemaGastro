<?php
require '../vendor/autoload.php';

use Zxing\QrReader;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['qrImage'])) {
    $uploadDir = '../uploaded_images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir . basename($_FILES['qrImage']['name']);
    if (move_uploaded_file($_FILES['qrImage']['tmp_name'], $uploadFile)) {
        // Crear una instancia del lector de QR
        $qrcode = new QrReader($uploadFile);
        $text = $qrcode->text();
        echo '<h1>Resultado del Código</h1>';
        if ($text !== null) {
            echo '<p>El contenido del código es: ' . htmlspecialchars($text) . '</p>';
        } else {
            echo '<p>No se pudo decodificar el código.</p>';
        }
        echo '<a href="../views/qr.php">Volver a subir otra imagen</a>';
    } else {
        echo '<p>Error al subir el archivo.</p>';
        echo '<a href="../views/qr.php">Intentar nuevamente</a>';
    }
} else {
    echo '<p>Por favor, sube una imagen.</p>';
    echo '<a href="../views/qr.php">Volver al formulario</a>';
}
?>
