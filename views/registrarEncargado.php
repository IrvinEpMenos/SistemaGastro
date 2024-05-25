
<?php include '../includes/header.php'; ?>
<?php include '../includes/navbarEncargado.php'; ?>
<div class="mx-auto pt-5" style="width: 65%"  >
<h1>Registro de encargados</h1>
<form class="row g-3 pt-5">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombre(s)</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Apellidos</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Correo</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Genero</label>
    <select id="inputState" class="form-select">
      <option selected>Seleccionar</option>
      <option>Hombre</option>
      <option>Mujer</option>
      <option>Otro</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Contraseña</label>
    <input class="form-control" type="text" value="12345678" aria-label="Disabled input example" disabled readonly>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Registrar</button>
  </div>
</form>
</div>
<div class="d-flex" style="height: 200px;">
  <div class="vr"></div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<?php include '../includes/footer.php'; ?>