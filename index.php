<?php include 'includes/header.php'; ?>
    
<main class="form-signin w-100 m-auto">
<form id="registration" action="controllers/login.php" method="post">
            <h6><?php 
            if (isset($_GET['error'])) {
              if ($_GET['error'] == 'incorrect') {
                  echo '<p style="color:red;">Contraseña incorrecta. Inténtalo de nuevo.</p>';
              } elseif ($_GET['error'] == 'notfound') {
                  echo '<p style="color:red;">Matrícula no encontrada. Inténtalo de nuevo.</p>';
              } elseif ($_GET['error'] == 'missing') {
                  echo '<p style="color:red;">Por favor, ingresa tu matrícula y contraseña.</p>';
              } elseif ($_GET['error'] == 'invalid') {
                  echo '<p style="color:red;">Solicitud inválida.</p>';
              }
          }?>
            </h6>
    <img src="assets/img/chef-8.png" alt="" width="300" height="250">
    <figure class="text-center">
  <blockquote class="blockquote">
    <p>Universidad Tecnologica de la Costa Grande de Guerrero</p>
  </blockquote>
  <figcaption class="blockquote-footer">
  Educación de excelencia con compromiso social</cite>
  </figcaption>
</figure>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" maxlength="8" placeholder="Matrícula">
      <label for="floatingInput">Matrícula</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Iniciar Sesión</button>
  </form>
</main>

<script src="back/conexion.php"></script>
    <script src="back/login.php"></script>
    <script src="script.js"></script>

    <script>
        function validateForm() {
            var username = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (username.trim() === '' || password.trim() === '') {
                alert('Por favor, complete todos los campos.');
                return false;
            }

            return true;
        }
    </script>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'includes/footer.php'; ?>

