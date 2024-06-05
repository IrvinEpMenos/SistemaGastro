
<?php include '../includes/header.php';?>
<?php include '../includes/navbarEncargado.php';?>
<?php include '../controllers/config.php';?>

<?php
/*session_start();

if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role === 'director') {
        include '../includes/navbarDirector.php';
    } elseif ($role === 'encargado') {
        include '../includes/navbarEncargado.php';
    }
} else {
    
    echo 'Error: Usuario no autenticado.';

}*/
?>
<div class="mx-auto pt-5" style="width: 65%"  >
<h1>Registro de Alumnos</h1>
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre completo" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="matricula">Matrícula:</label>
                <input type="number" class="form-control" name="matricula" maxlength="8" id="matricula"  placeholder="Escribe la matrícula" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" class="form-control font-weight-bold" name="email" id="email" placeholder="Correo" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Contraseña(Predeterminada por sistema):</label>
                <input type="password" id="password" name="password" class="form-control font-weight-bold" placeholder="12345678" readonly >
            </div>
        </div>
    </div>

    <?php if(isset($_GET['role']) && $_GET['role'] == 'admin') : ?>
        <input type="hidden" name="rol" value="admin">
    <?php else: ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="grupo">Grupo:</label>
                    <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Escribe el grupo" required>
                </div>
            </div>
            <div class="col-sm">
                <label>Cautrimestre</label>
                <div class="form-group">
                    <select class="custom-select" name="cuatrimestre" required>
                        <option selected disabled value="">Seleccionar cuatrimestre...</option>
                        <option>1</option>                            
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>                            
                    </select>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <button type="submit" class="bg-white text-red-500 px-4 py-2 rounded-md">Registrar</button>
</form>

  </div>

<?php include '../includes/footer.php';?>