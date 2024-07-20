<?php 
function getProducts() {
    include '../controllers/config.php';

        try {
            // Conexión a la base de datos
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Consulta a la tabla `articulos`
            $stmt = $pdo->query("SELECT id, nombre_articulo, cantidad_articulo, categoria_articulo, medida_articulo FROM articulo");
            
            $products = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $products[$row['id']] = [
                    'name' => $row['nombre_articulo'],
                    'amount' => $row['cantidad_articulo'],
                    'category' => $row['categoria_articulo'],
                    'measure' => $row['medida_articulo']
                ];
            }
    
            return $products;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
}

function printTable($table) {
    include '../controllers/config.php';
    // Escapar el nombre de la tabla para evitar inyecciones SQL
    $table = mysqli_real_escape_string($conn, $table);

    // Consultar todos los datos de la tabla
    $query = "SELECT * FROM `$table`";
    $result = $conn->query($query);

    if (!$result) {
        echo "Error en la consulta: " . $conn->error;
        return;
    }

    // Obtener los nombres de las columnas
    $fields = $result->fetch_fields();

    // Imprimir la tabla HTML
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    
    // Imprimir el encabezado de la tabla
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name ?? '') . "</th>";
    }
    echo "<th>Acciones</th>";


    echo "</tr>";

    // Imprimir las filas de datos
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell ?? '') . "</td>";
        }
        echo " <td>{<a href='editar_registro.php?table={$table}&id={$row['id']}'>Editar</a> | <a href='eliminar_registro.php?table={$table}&id={$row['id']}'>Eliminar</a>}</td>";
        echo "</tr>";
    }
    

    echo "</table>";

    $result->free();
}


?>