<?php
require '../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qrText'])) {
    $text = $_POST['qrText'];

    // Crear una nueva instancia de QrCode
    $qrCode = new QrCode($text);
    $writer = new PngWriter();

    // Directorio donde se guardará el código QR generado
    $uploadDir = '../uploaded_images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Ruta del archivo QR generado
    $filePath = $uploadDir . 'qr-code.png';

    // Guardar el código QR como archivo PNG
    $result = $writer->write($qrCode);
    $result->saveToFile($filePath);

    echo '<h1>Código QR Generado</h1>';
    echo '<img src="' . $filePath . '" alt="Código QR">';
    echo '<p>El contenido del código QR es: ' . htmlspecialchars($text) . '</p>';
    echo '<a href="../views/qr.php">Generar otro código QR</a>';
} else {
    echo '<p>Por favor, introduce un texto.</p>';
    echo '<a href="../views/qr.php">Volver al formulario</a>';
}
?>


