<?php


require(__DIR__ . '/../modelo/class.Usuarios.php');

// Registro de usuario en la tienda
if ($_GET["accion"] == "registro_usuario") {
    // ¿Se utilizo el formulario?
    if (isset($_POST["form-registration"])) {
        // Obtener datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        // El correo es case insensitive
        $correo = strtolower($_POST["correo"]);
        $contrasena = $_POST["contrasena"];

        // Los campos no estan vacios
        if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena)) {
            // Redireccion de nuevo al formulario
            header("Location: ../files/formularios/user_login_registration.php?error=empty_fields");

            // Finalizar inmediatamente el script
            exit();
        }

        // El correo es valido
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../files/formularios/user_login_registration.php?error=invalid_email");
            exit();
        }

        // Intentar registrar al usuario
        $usuarios = new Usuarios();
        $success = $usuarios->userRegistration($nombre, $apellido, $correo, $contrasena, "user");

        if ($success) {
            // Redireccion a la vista de login
            header("Location: ../files/formularios/user_login_registration.php?success=ok");
            exit();
        } else {
            header("Location: ../files/formularios/user_login_registration.php?error=user_exists");
            exit();
        }
    }
}

// Login de usuario en la tienda
if ($_GET["accion"] == "login_usuario") {
    if (isset($_POST["form-login"])) {
        $correo = $_POST["correo"];

        // Comparacion sin tener en cuenta el case
        $contrasena = strtolower($_POST["contrasena"]);

        if (empty($correo) || empty($contrasena)) {
            header("Location: ../files/formularios/user_login_registration.php?error=empty_fields");
            exit();
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../files/formularios/user_login_registration.php?error=invalid_email");
            exit();
        }

        // Intentar el login del usuario
        $usuarios = new Usuarios();
        $success = $usuarios->userLogin($correo, $contrasena);

        if ($success) {
            // Redireccion al index
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../files/formularios/user_login_registration.php?error=user_not_exists");
            exit();
        }
    }
}

?>
