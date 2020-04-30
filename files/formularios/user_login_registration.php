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
            <form action="" class="form-registration" method="POST">
                <!-- Correspondencia directa con los campos en DB -->
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Registrarme</button>
                <p class="message">Si ya esta registrado <a href="#">inicie sesión</a></p>
            </form>
            <form action="" class="form-login" method="POST">
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Iniciar sesión</button>
                <p class="message">Si no tiene cuenta <a href="#">registrese</a></p>
            </form>
        </section>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
    </script>
    <script src="../subpages/scripts/user_login_registration.js"></script>
</body>

</html>