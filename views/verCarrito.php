<?php 
session_start();
include '../controllers/functions.php';
include '../controllers/config.php';
$products = getProducts();
$total = 0;

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Manejar la acción de vaciar el pedido
    if ($action == 'clear') {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        echo "El pedido ha sido vaciado.";
    }
    // Manejar la acción de generar el pedido
    elseif ($action == 'order') {
        $_SESSION['matricula_alumno'] = '21307006';
        $_SESSION['nombre_alumno'] = 'Jonathan Narvaez Moralez';

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $matricula_alumno = $_SESSION['matricula_alumno'];
            $nombre_alumno = $_SESSION['nombre_alumno'];
            $descripcion_pedido = json_encode($_SESSION['cart']); // Convertir el carrito a JSON
            $estatus_pedido = 'pendiente'; // Estatus inicial del pedido
            $fecha = date('Y-m-d H:i:s');
            $observacion = ''; // Puedes ajustar esto según tus necesidades

            $query = "INSERT INTO pedido (matricula_alumno, nombre_alumno, descripcion_pedido, estatus_pedido, fecha, observacion)
                      VALUES (?, ?, ?, ?, ?, ?)";

            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('isssss', $matricula_alumno, $nombre_alumno, $descripcion_pedido, $estatus_pedido, $fecha, $observacion);

                if ($stmt->execute()) {
                    unset($_SESSION['cart']);
                    echo "El pedido ha sido generado.";
                } else {
                    echo "Error al generar el pedido: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error al preparar la consulta: " . $conn->error;
            }
        } else {
            echo "El carrito está vacío.";
        }
    }
}

?>
<?php 
include '../includes/header.php';
include '../includes/navbar.php';
?>
    <h1>Pedido</h1>
    <div class="cart">
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $quantity) {
                if (isset($products[$id])) {
                    $product = $products[$id];
                    echo "<div class='cart-item'>";
                    echo "<h3>{$product['name']}</h3>";
                    echo "<p>Cantidad: {$quantity}</p>";
                    echo "<p>Categoría: {$product['category']}</p>";
                    echo "<p>Medida: {$product['measure']}</p>";
                    echo "</div>";
                }
            }
        } else {
            echo "<p>Tu carrito está vacío.</p>";
        }
        ?>
        <a href="listaUtencilios.php">Volver a la tienda</a>
        <form action="#" method="POST">
            <input type="hidden" name="action" value="clear">
            <input type="submit" value="Vaciar Pedido">
        </form>
        <form action="#" method="POST">
            <input type="hidden" name="action" value="order">
            <input type="submit" value="Generar Pedido">
        </form>
    </div>
<?php 
include '../includes/footer.php';
?>

