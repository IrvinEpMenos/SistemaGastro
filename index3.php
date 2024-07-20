<?php include 'includes/header.php'; ?>

<main class="form-signin w-100 m-auto">
  <form id="registration" action="controllers/login.php" method="post" onsubmit="return validateForm();">
  <h6>
        <?php 
        if (isset($_GET['error'])) {
            $error = htmlentities($_GET['error']);
            if ($error == 'incorrect') {
                echo '<div class="alert alert-danger" role="alert">Contraseña o matrícula incorrecta.</div>';
            } elseif ($error == 'notfound') {
                echo '<div class="alert alert-danger" role="alert">Matrícula no encontrada. Inténtalo de nuevo.</div>';
            } elseif ($error == 'missing') {
                echo '<div class="alert alert-warning" role="alert">Por favor, ingresa tu matrícula y contraseña.</div>';
            } elseif ($error == 'invalid') {
                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>An example danger alert with an icon</div>
                    </div>';
            }
        }
        ?>
        </h6>
    <img src="assets/img/chef-8.png" alt="" width="300" height="250">
    <figure class="text-center">
      <blockquote class="blockquote">
        <p>Universidad Tecnologica de la Costa Grande de Guerrero</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        Educación de excelencia con compromiso social
      </figcaption>
    </figure>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="matricula" maxlength="8" placeholder="Matrícula">
      <label for="floatingInput">Matrícula</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Iniciar Sesión</button>
  </form>
</main>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
  function validateForm() {
    var username = document.getElementById('floatingInput').value;
    var password = document.getElementById('floatingPassword').value;

    if (username.trim() === '' || password.trim() === '') {
        alert('Por favor, complete todos los campos.');
        return false;
    }

    return true;
  }

  document.getElementById('floatingInput').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
  });
</script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.getElementById('alert');
            if (alert) {
                setTimeout(() => {
                    alert.remove();
                }, 5000); // 5000 ms = 5 segundos
            }
        });
</script>

<?php include 'includes/footer.php'; ?>
