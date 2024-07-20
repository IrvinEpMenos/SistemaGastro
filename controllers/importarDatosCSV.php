<?php
if (isset($_FILES['datosCSV']) && $_FILES['datosCSV']['error'] === UPLOAD_ERR_OK) {
    // Ruta donde se almacenará temporalmente el archivo CSV subido
    $archivo_temporal = $_FILES['datosCSV']['tmp_name'];
    
    $file_extension = pathinfo($_FILES['datosCSV']['name'], PATHINFO_EXTENSION);
    if (strtolower($file_extension) !== 'csv') {
        die('Error: El archivo debe ser un archivo CSV.');
    }

    // Procesar el archivo CSV
    $handle = fopen($archivo_temporal, 'r');
    if ($handle !== false) {
        // Conectarse a la base de datos (ajusta estos valores según tu configuración)
        include 'config.php';

        // Preparar la consulta para insertar los datos del CSV en la tabla alumnos
        $sql = "INSERT INTO alumno (nombre_alumno, matricula_alumno, correo_electronico, contrasena_alumno, cuatrimestre_alumno, grupo_alumno) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Si la consulta está lista
        if ($stmt) {
            // Leer línea por línea del archivo CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Asignar cada columna a variables (ajustar según la estructura del CSV)
                $nombre = $data[0];
                $matricula = intval($data[1]);
                $correo = $matricula . '@gmail.com';
                $contrasena = '12345678';
                $cuatrimestre = $data[2];
                $grupo = $data[3];
                echo $nombre . ' ' . $matricula . ' ' . $correo . ' ' . $contrasena . ' ' . $cuatrimestre . ' ' . $grupo;
                // // Insertar los datos en la tabla alumnos
                // // Vincular parámetros y ejecutar la consulta preparada
                $stmt->bind_param("ssssss", $nombre, $matricula, $correo, $contrasena, $cuatrimestre, $grupo);
                if (!$stmt->execute()) {
                    echo "Error al insertar datos: " . $stmt->error;
                }
            }
            
            // Cerrar la declaración preparada
            $stmt->close();
            
            echo "Datos insertados correctamente desde el archivo CSV.";
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }

        // Cerrar conexión y archivo CSV
        $conn->close();
        fclose($handle);
    } else {
        echo "Error al abrir el archivo CSV.";
    }
} else {
    echo "Error al subir el archivo CSV.";
}
?>
