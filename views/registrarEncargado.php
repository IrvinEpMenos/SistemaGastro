
<?php include '../includes/header.php'; ?>
<?php include '../includes/navbarEncargado.php'; ?>
<div class="mx-auto pt-5" style="width: 65%"  >
<form class="row g-3">
<div>
  <div class="col-sm-7">
    <label for="inputEmail4" class="form-label">Nombre</label>
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre">
  </div>
  <div class="col-sm-7">
  <label for="inputEmail4" class="form-label">Matrícula</label>
    <input type="text" class="form-control" placeholder="Matrícula" aria-label="Matrícula">
  </div>
  <div class="col-sm-7">
  <label for="inputEmail4" class="form-label">Correo</label>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Correo">
  </div>
  <div class="col-sm-7">
  <label for="inputEmail4" class="form-label">Contraseña predeterminada</label>
  <input class="form-control" type="text" placeholder="12345678" aria-label="Disabled input example" disabled>
  </div>
</div>
</form>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<?php include '../includes/footer.php'; ?>