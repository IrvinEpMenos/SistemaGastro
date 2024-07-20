<?php include '../includes/header.php'; ?>

<form action="exportar.php" method="post">
    <input type="submit" value="Exportar">
</form>

<form action="../controllers/importarDatosCSV.php" method="post">
    <input type="submit" value="Importar">
</form>

<?php include '../includes/footer.php';