<?
include '../includes/header.php';
include '../includes/navbar.php';
?>
    <h1>Lista de Utencilios</h1>
    <?php
    include_once '../controllers/functions.php';
    $products = getProducts();
    echo "<ul class='list-group'>";
    foreach ($products as $id => $product) {
        echo "<li class='list-group-item'>";
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h3 class='card-title'>{$product['name']}</h3>";
        echo "<p class='card-text'>Cantidad: {$product['amount']}</p>";
        echo "<p class='card-text'>Categoría: {$product['category']}</p>";
        echo "<p class='card-text'>Tipo: {$product['measure']}</p>";
        echo "<form action='carrito.php' method='POST'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<div class='input-group mb-3'>";
        echo "<input type='number' class='form-control' name='quantity' value='1' min='1'>";
        echo "<input type='hidden' name='action' value='add'>";
        echo "<div class='input-group-append'>";
        echo "<button class='btn btn-primary' type='submit'>Añadir al carrito</button>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</li>";
    }
    echo "</ul>";
    
    

include '../includes/footer.php';
    ?>
