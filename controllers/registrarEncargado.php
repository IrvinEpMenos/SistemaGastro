<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre_encargado"];
    $matricula = $_POST["matricula_encargado"];
    $correo = $_POST["correo_encargado"];
    $contrasena = password_hash($_POST["contrasena_encargado"], PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("INSERT INTO encargado (nombre_encargado, matricula_encargado, correo_encargado, contrasena_encargado) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $matricula, $correo, $contrasena);

    if ($stmt->execute()) {
        echo "Nuevo encargado registrado con éxito.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT nombre_encargado, matricula_encargado, correo_encargado FROM encargado";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generar filas de la tabla dinámicamente
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["nombre_encargado"]) . "</td>
                <td>" . htmlspecialchars($row["matricula_encargado"]) . "</td>
                <td>" . htmlspecialchars($row["correo_encargado"]) . "</td>
                <td>
                    <form method='POST' action='../controllers/eliminarEncargado.php' style='display:inline-block;'>
                        <input type='hidden' name='matricula' value='" . htmlspecialchars($row["matricula_encargado"]) . "'>
                        <button type='submit' class='btn btn-danger btn-sm'><i class='fi fi-rs-user-pen'></i> Eliminar</button>
                    </form>
                    <button class='btn btn-primary btn-sm'><i class='fi fi-rs-user-pen'></i></button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
}

$conn->close();
?>