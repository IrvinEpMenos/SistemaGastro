<?php include '../includes/header.php'; ?>

<?php include '../includes/navbarAlumno.php'; ?>


<body>
    <h1>Generar Código QR</h1>
    <form action="../controllers/generadorQr.php" method="post">
        <label for="qrText">Introduce el texto:</label>
        <input type="text" name="qrText" id="qrText" required>
        <button type="submit">Generar QR</button>
    </form>

    <h1>Subir Imagen de Código QR</h1>
    <form action="../controllers/lectorQr.php" method="post" enctype="multipart/form-data">
        <label for="qrImage">Selecciona una imagen:</label>
        <input type="file" name="qrImage" id="qrImage" accept="image/*" required>
        <button type="submit">Leer</button>
    </form>

    <h1>Leer Código de Barras</h1>
    <form action="../controllers/lectorBarra.php" method="post" enctype="multipart/form-data">
        <label for="barcodeImage">Selecciona una imagen del código de barras:</label>
        <input type="file" name="barcodeImage" id="barcodeImage" accept="image/*" required>
        <button type="submit">Leer</button>
    </form>

    <h1>Generar Código de Barras</h1>
    <form action="../controllers/generarBarra.php" method="post">
        <label for="barcodeText">Introduce el texto para el código de barras:</label>
        <input type="text" name="barcodeText" id="barcodeText" required>
        <button type="submit">Generar Código de Barras</button>
    </form>
</body>
<a href="../index.php">QR</a>
</html>

<?php include '../includes/footer.php'; ?>
