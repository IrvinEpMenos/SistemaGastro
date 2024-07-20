<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="../controllers/importarDatosCSV.php" method="post" enctype="multipart/form-data">
    <label for="datosCSV">Importar archivo CSV:</label>
    <input type="file" name="datosCSV" id="datosCSV">
    <button type="submit">Importar</button>
</form>
<a href="../controllers/exportarCSV.php"><button>Descargar CSV</button></a>
    </div>
</body>
</html>