<?php
include '../controllers/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que los parámetros estén presentes
    if (isset($_POST['tabla']) && isset($_POST['id'])) {
        $table = $_POST['tabla'];
        $id = $_POST['id']; // Asume que el ID del registro a actualizar está en POST

        // Elimina el ID y el nombre de la tabla del array POST
        unset($_POST['id']);
        unset($_POST['tabla']);

        $columns = array_keys($_POST);
        $values = array_values($_POST);
        
        // Genera la cadena SET para la consulta SQL
        $set = [];
        foreach ($columns as $column) {
            $set[] = "{$column} = ?";
        }
        $setString = implode(', ', $set);

        // Prepara la consulta SQL
        $query = "UPDATE `$table` SET $setString WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Determina los tipos de datos para bind_param
        $types = str_repeat('s', count($values)) . 'i';
        $values[] = $id;

        // Bind de parámetros
        $stmt->bind_param($types, ...$values);

        // Ejecuta la consulta y verifica el resultado
        if ($stmt->execute()) {
            echo "Registro actualizado con éxito.";
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Faltan parámetros necesarios.";
    }
}

$conn->close();
?>
