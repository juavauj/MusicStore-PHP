<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store - Bienvenidos</title>
</head>

<body>
    <!-- Contiene ambos formularios -->
    <section class="form-container">
        <section class="form">
            <form action="" class="form-registration">
                <!-- Correspondencia directa con los campos en DB -->
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button>Registrarme</button>
                <p class="message">Si ya esta registrado <a href="#">inicie sesión</a></p>
            </form>
            <form action="" class="form-login">
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button>Iniciar sesión</button>
                <p class="message">Si no tiene cuenta <a href="#">registrese</a></p>
            </form>
        </section>
    </section>
</body>

</html>