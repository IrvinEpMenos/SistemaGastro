<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-x001HFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin=" anonymous">
</head>
<body>
<div class="container">
    <?php
    include 'config.php';
    // Verificamos la conexion
    if ($conn->connect_error) {
        die("La conexión falló:" .$conn->connect_error);
    }
// Evita la inyeccion de SQL limpiando la entrada del usuario 
$email = mysqli_real_escape_string($conn, $_POST['email']);
// Consultamos para verificar si el correo electronico ya existe 
$checkEmail = "SELECT * FROM alumnos WHERE email = '$email' ";
// La variable $result mantiene los datos de conexion y la consulta 
$result = $conn->query($checkEmail);
// La variable $count retiene el resultado de la consulta 
$count = mysqli_num_rows($result);
// Si count == 1 significa que el correo electronico ya esta en la bd
if ($count == 1) {
    echo "<script>
alert('Ese email ya está en nuestra base de datos.');
window.location.href = 'register.html'; // Redirigir al usuario a index.php después de cerrar la alerta</script>";
} else { 
    // Si el correo electronico no existe, los datos del formulario se envian a la bd y se crea la cuenta 
    // mysqli_real_escape_string es una funcion que ejecuta un proceso de limpieza paracada variable POST que se recibe para prevenir alguna inyeccion SQL

$nombre= mysqli_real_escape_string($conn, $_POST['nombre']);
$matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
$email = mysqli_real_escape_string($conn, $_POST['email']); 
$password = 12345678; // Contraseña predeterminada
$grupo = mysqli_real_escape_string($conn, $_POST['grupo']);
$cuatrimestre = mysqli_real_escape_string($conn, $_POST['cuatrimestre']);
// La funcion password_hash() convierte la contraseña en un hash antes de enviarla a la bd
$passHash = password_hash ($password, PASSWORD_DEFAULT);
// Inserta la consulta para enviar por hash
$query = "INSERT INTO alumnos (nombre, matricula, email, password , grupo, cuatrimestre)
VALUES ('$nombre', '$matricula', '$email', '$passHash', '$grupo', '$cuatrimestre')";
if (mysqli_query($conn, $query)) {
    echo "<script>
    alert('¡La cuenta ha sido creada!');
    window.location.href = 'register.html';
    </script>";
    } else {
    echo "Error: ". $query. "<br>". mysqli_error($conn);
    }
    } 
    mysqli_close($conn);
    ?>
    </div>
    
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity ="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H661ZH81PoY1FhbGU+6BZp6G7niu735Sk71N" crossorigin=" anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+SLIOodYLS7CIrQpBj1+C7nPvqq+FbNUBDunl/OZv93DB7Ln/53318e/mZXL1/P+" crossorigin="anonymous"></script>
    
</body>
</html>