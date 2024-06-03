<?php
require '../vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['barcodeText'])) {
    // Texto para el código de barras
    $text = $_POST['barcodeText'];

    // Crear una nueva instancia del generador de códigos de barras
    $generator = new BarcodeGeneratorPNG();

    // Generar el código de barras
    $barcode = $generator->getBarcode($text, $generator::TYPE_CODE_128);

    // Guardar el código de barras como archivo PNG
    $filePath = '../uploaded_images' . $text . '.png';
    file_put_contents($filePath, $barcode);

    // Mostrar el código de barras en la página
    echo '<h1>Código de Barras Generado</h1>';
    echo '<img src="' . $filePath . '" alt="Código de Barras">';
    echo '<p>El contenido del código de barras es: ' . htmlspecialchars($text) . '</p>';
    echo '<a href="../views/qr.php">Generar otro código de barras</a>';
} else {
    echo '<p>Por favor, introduce un texto para generar el código de barras.</p>';
    echo '<a href="../views/qr.php">Volver al formulario</a>';
}
?>
