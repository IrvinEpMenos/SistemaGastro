<?php 
function getProducts() {
    include'../controllers/config.php';

        try {
            // Conexión a la base de datos
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Consulta a la tabla `articulos`
            $stmt = $pdo->query("SELECT id_articulo, nombre_articulo, cantidad_articulo, categoria_articulo, medida_articulo FROM articulo");
            
            $products = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $products[$row['id_articulo']] = [
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
    

?>