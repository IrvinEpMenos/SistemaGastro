<?php
$userType = isset($_SESSION['userType']) ? $_SESSION['userType'] : 'guest';
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="/"><img width="42%" src="../assets/img/logo.png" alt=""></a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <!-- Opciones para alumnos -->
                <?php if ($userType === 'alumno'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alumno Dashboard</a>
                    </li>
                <?php endif; ?>

                <!-- Opciones para encargados -->
                <?php if ($userType === 'encargado'): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="../views/registrarAlumno.php">Registrar alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/registrarEncargado.php">Registrar utensilios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Solicitudes</a>
                </li>
                <?php endif; ?>

                <!-- Opciones para directores -->
                <?php if ($userType === 'director'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Director Dashboard</a>
                    </li>
                <?php endif; ?>

                <!-- Opciones para usuarios no autenticados (invitados) -->
                <?php if ($userType === 'guest'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Guest Link</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                <button class="btn btn-primary">Cerrar sesión</button>
            </div>
        </div>
    </div>
</nav>