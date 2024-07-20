<?php
session_start();
include '../controllers/config.php';

$query = "SELECT * FROM pedido";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>id</th>
                <th>Matrícula Alumno</th>
                <th>Nombre Alumno</th>
                <th>Descripción Pedido</th>
                <th>Estatus Pedido</th>
                <th>Fecha</th>
                <th>Observación</th>
                <th>Acciones</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['matricula_alumno']}</td>
                <td>{$row['nombre_alumno']}</td>
                <td>{$row['descripcion_pedido']}</td>
                <td>{$row['estatus_pedido']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['observacion']}</td>
                <td>{<a href='editar_registro.php?table=pedido&id={$row['id']}'>Editar</a> | <a href='eliminar_registro.php?table=pedido&id={$row['id']}'>Eliminar</a>}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay pedidos.";
}

$conn->close();
?>
