<?php 
include '../includes/header.php'; 
include '../includes/navbar.php';
?>
<link href="../assets/css/dash.css" rel="stylesheet">

<div class="main-content">
    <div class="container">
        <h2>Resumen</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h3 class="card-title">Requisisiones pendientes</h3>
                        <p class="card-text">120</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h3 class="card-title">Requisisiones entregadas</h3>
                        <p class="card-text">350</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h3 class="card-title">Historial de requiciciones</h3>
                        <p class="card-text">200</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="recent-orders">
            <h2>Pedidos Recientes</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Cliente A</td>
                            <td>$100.00</td>
                            <td>01/07/2024</td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Cliente B</td>
                            <td>$150.00</td>
                            <td>02/07/2024</td>
                        </tr>
                        <!-- Aquí irían más filas de pedidos recientes -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
