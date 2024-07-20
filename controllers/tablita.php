<?php
function tablaArticulo($conn) {
    // Start building the table HTML
    $table = '<table class="table table-bordered bg-white">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<th>Codigo</th>';
    $table .= '<th>Nombre</th>';
    $table .= '<th>Categoria</th>';
    $table .= '<th>Medida</th>';
    $table .= '<th>Cantidad</th>';
    $table .= '<th>Acciones</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    // Fetch data from database and populate table rows
    $query = 'SELECT * FROM articulo';
    $resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    while($row = mysqli_fetch_array($resultado)) {
        $table .= '<tr>';
        $table .= '<td>' . $row['id_articulo'] . '</td>';
        $table .= '<td>' . $row['nombre_articulo'] . '</td>';
        $table .= '<td>' . $row['categoria_articulo'] . '</td>';
        $table .= '<td>' . $row['medida_articulo'] . '</td>';
        $table .= '<td>' . $row['cantidad_articulo'] . '</td>';
        $table .= '<td>';
        $table .= '<a href="edit.php?id=' . $row['id_articulo'] . '">editar</a>';
        $table .= '<a href="delete_task.php?id=' . $row['id_articulo'] . '">borrar</a>';
        $table .= '</td>';
        $table .= '</tr>';
    }

    // Close the table
    $table .= '</tbody>';
    $table .= '</table>';

    // Return the completed HTML table
    return $table;
}


function tablaHistorial($conn) {
    // Inicia la sesión si no ha sido iniciada

    // HTML de la tabla
    echo '<table class="table table-bordered bg-white">';
    echo '    <thead>';
    echo '        <tr>';
    echo '            <th>Nombre</th>';
    echo '            <th>Matrícula</th>';
    echo '            <th>Descripción</th>';
    echo '            <th>Estatus</th>';
    echo '            <th>observacion</th>';
    echo '            <th>Fecha</th>';
    echo '        </tr>';
    echo '    </thead>';
    echo '    <tbody>';

    // Consulta según el rol del usuario

        $query = "SELECT * FROM pedido";
    // Ejecuta la consulta y maneja errores
    $resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Itera sobre los resultados de la consulta
    while ($row = mysqli_fetch_array($resultado)) {
        echo '        <tr>';
        echo '            <td>' . htmlspecialchars($row['matricula_alumno']) . '</td>';
        echo '            <td>' . htmlspecialchars($row['nombre_alumno']) . '</td>';
        echo '            <td>' . htmlspecialchars($row['descripcion_pedido']) . '</td>';
        echo '            <td>' . htmlspecialchars($row['estatus_pedido']) . '</td>';
        echo '            <td>' . htmlspecialchars($row['observacion']) . '</td>';
        echo '            <td>' . htmlspecialchars($row['fecha']) . '</td>';
        echo '        </tr>';
    }

    echo '    </tbody>';
    echo '</table>';
}


?>