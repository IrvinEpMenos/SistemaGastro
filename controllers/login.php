<?php
// Incluir el archivo de conexión a la base de datos
include 'config.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado tanto la matrícula como la contraseña
    if (isset($_POST["matricula"]) && isset($_POST["password"])) {
        // Obtener la matrícula y la contraseña enviadas por el formulario
        $matricula = $_POST["matricula"];
        $password = $_POST["password"];
        
        // Inicializar una variable para indicar si se encontró un usuario
        $user_found = false;

        foreach ($tablas as $tabla) {
            // Preparar la consulta SQL para obtener el usuario con la matrícula proporcionada
            $sql = "SELECT * FROM " . $tabla["nombre"] . " WHERE matricula = ? LIMIT 1";
            
            // Preparar la sentencia
            $stmt = $pdo->prepare($sql);
            
            // Ejecutar la sentencia con la matrícula como parámetro
            $stmt->execute([$matricula]);
            
            // Obtener el resultado de la consulta
            $user = $stmt->fetch();
            
            // Verificar si se encontró un usuario con esa matrícula
            if ($user) {
                // Verificar si la contraseña coincide con la almacenada en la base de datos
                if (password_verify($password, $user['password'])) {
                    // Iniciar sesión
                    session_start();
                    
                    // Almacenar información del usuario en la sesión
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nombre'];
                    $_SESSION['user_type'] = $tabla['nombre'];
                    
                    // Redirigir a la página correspondiente
                    header("Location: dashboard.php");
                    exit;
                } else {
                    // Contraseña incorrecta, redirigir con mensaje de error
                    header("Location: index.php?error=incorrect");
                    exit;
                }
                // Si se encontró un usuario, romper el bucle
                $user_found = true;
                break;
            }
        }

        // Si no se encontró usuario en ninguna tabla, redirigir con mensaje de error
        if (!$user_found) {
            header("Location: index.php?error=notfound");
            exit;
        }
    } else {
        // Si no se enviaron tanto la matrícula como la contraseña, redirigir con mensaje de error
        header("Location: index.php?error=missing");
        exit;
    }
} else {
    // Si no se ha enviado el formulario, redirigir con mensaje de error
    header("Location: index.php?error=invalid");
    exit;
}
?>
