<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store - Bienvenidos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="../subpages/styles/user_login_registration.css" rel="stylesheet">
</head>

<body>
    <!-- Contiene ambos formularios -->
    <section class="form-container">
        <section class="form">
            <form action="../../control/usuariosControl.php?accion=registro_usuario" class="form-registration" method="POST">
                <h2>Registro</h2>
                <!-- Correspondencia directa con los campos en DB -->
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" name="form-registration">Registrarme</button>
                <p class="message">Si ya esta registrado <a href="#">inicie sesión</a></p>
            </form>
            <form action="../../control/usuariosControl.php?accion=login_usuario" class="form-login" method="POST">
                <h2>Inicio de sesión</h2>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" name="form-login">Iniciar sesión</button>
                <p class="message">Si no tiene cuenta <a href="#">registrese</a></p>
            </form>
        </section>
        <?php if (isset($_GET["error"])) : ?>
            <section class="error">
                <?php $error = $_GET["error"]; ?>
                <?php if ($error == "empty_fields") : ?>
                    <p>
                        Los campos no pueden estar vacíos.
                    </p>
                <?php endif; ?>
                <?php if ($error == "invalid_email") : ?>
                    <p>
                        Correo electrónico inválido.
                    </p>
                <?php endif; ?>
                <?php if ($error == "login_failed") : ?>
                    <p>
                        Usuario o contraseña incorrectos. Intente de nuevo
                        o comuníquese con el administrador.
                    </p>
                <?php endif; ?>
                <!-- Posibilidad de enumeracion (sacrificio usabilidad vs seguridad) -->
                <?php if ($error == "registration_failed") : ?>
                    <p>
                        El registro no ha sido posible. Si usted ya tiene una
                        cuenta, inicie sesión, de lo contrario, comuníquese con el
                        administrador.
                    </p>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (isset($_GET["success"])) : ?>
            <section class="success">
                <p>Registro exitoso, ya puede iniciar sesión.</p>
            </section>
        <?php endif; ?>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
    </script>
    <script src="../subpages/scripts/user_login_registration.js"></script>
</body>

</html>