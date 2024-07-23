<?php
session_start();

// Si la sesión ya está iniciada, redirige al dashboard
//    if (isset($_SESSION['matricula'])) {
//        header("location: ../views/dashboard.php");
//        exit();
//   }

include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];

    // Verifica que los campos no estén vacíos
    if (empty($matricula) || empty($password)) {
        header("location: ../index.php?error=emptyfields");
        exit();
    }

    // Consulta para encargado
    $query_encargado = "SELECT * FROM encargado WHERE matricula_encargado = ?";
    if ($stmt = $conn->prepare($query_encargado)) {
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $result_encargado = $stmt->get_result();
        if ($result_encargado->num_rows === 1) {
            $row = $result_encargado->fetch_assoc();
            if (password_verify($password, $row['contrasena_encargado'])) {
                $_SESSION['matricula'] = $row['matricula_encargado'];
                $_SESSION['userType'] = 'encargado'; // Establece el tipo de usuario
                header("location: ../views/dashboard.php");
                exit();
            } else {
                session_destroy();
                header("location: ../index.php?error=incorrect");
                exit();
            }
        }
    }

    // Consulta para alumno
    $query_alumno = "SELECT * FROM alumno WHERE matricula_alumno = ?";
    if ($stmt = $conn->prepare($query_alumno)) {
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $result_alumno = $stmt->get_result();
        if ($result_alumno->num_rows === 1) {
            $row = $result_alumno->fetch_assoc();
            if (password_verify($password, $row['contrasena_alumno'])) {
                $_SESSION['matricula'] = $row['matricula_alumno'];
                $_SESSION['userType'] = 'alumno'; // Establece el tipo de usuario
                header("location: ../views/dashboard.php");
                exit();
            } else {
                session_destroy();
                header("location: ../index.php?error=incorrect");
                exit();
            }
        }
    }

    // Verificación con credenciales correctas (por ejemplo, para un superusuario)
    $matricula_correcta = "33333333";
    $contrasena_correcta = "33333333";

    if ($matricula === $matricula_correcta && $password === $contrasena_correcta) {
        $_SESSION['matricula'] = $matricula_correcta;
        $_SESSION['userType'] = 'superuser'; // Establece el tipo de usuario
        header("location: ../views/dashboard.php");
        exit();
    } else {
        session_destroy();
        header("location: ../index.php?error=incorrect");
        exit();
    }

    // Si no se encuentra ninguna coincidencia
    session_destroy();
    header("location: ../index.php?error=notfound");
    exit();
} else {
    header("location: ../index.php");
    exit();
}
?>
