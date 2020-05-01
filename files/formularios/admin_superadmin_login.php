<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store - Acceso</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="../subpages/styles/admin_superadmin_login.css" rel="stylesheet">
</head>

<body>
    <section class="login-container">
        <header class="company">
            <h1>Music Store</h1>
            <p>Acceso administrativo</p>
        </header>
        <main class="login">
            <form action="../../control/usuariosControl.php?accion=login_administrativo" method="POST">
                <input type="email" name="correo" placeholder="Email" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" name="form-login">Ingresar</button>
            </form>
        </main>
        <footer class="notice">
            <p>
                Absténgase de ingresar si usted no es un usuario
                administrativo.
            </p>
            <p>
                Se aplicarán las acciones legales a que de lugar.
            </p>
        </footer>
    </section>
</body>

</html>