<?php include'config.php';

// Consulta SQL para obtener los datos de la tabla alumnos
$sql = "SELECT * FROM alumno";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Nombre del archivo CSV que se va a generar
    $filename = "alumnos.csv";

    // Headers para forzar la descarga del archivo CSV generado
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Abrir el archivo para escritura
    $fp = fopen('php://output', 'w');

    // Escribir la línea de encabezados en el archivo CSV
    fputcsv($fp, array('Correo Electrónico', 'Contraseña', 'Cuatrimestre', 'Grupo'));

    // Recorrer los resultados de la consulta y escribir cada fila en el archivo CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    // Cerrar el puntero al archivo
    fclose($fp);

    // Finalizar la ejecución del script
    exit;
} else {
    echo "No se encontraron resultados en la tabla de alumnos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
