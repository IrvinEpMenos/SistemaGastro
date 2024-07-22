<?php 
include '../includes/header.php';
include '../includes/navbar.php';
?>
    <form action="/views/carrito.php" method="get">
        <input type="submit" value="carrito">
    </form>

    <a href="/views/verTabla.php?table=pedido">pedidos</a>

    <a href="/views/verTabla.php?table=articulo">articulo</a>

    <a href="/views/verTabla.php?table=alumno">alumno</a>

    <a href="/views/verTabla.php?table=detalle_pedido"></a>

<?php
include '../includes/footer.php';
?>