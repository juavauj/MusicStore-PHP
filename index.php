<?php include("config/class.Conexion.php") ?>
<?php include("files/subpages/header.html") ?>
<!-- Comentario ejemplo -->
<link rel="stylesheet" href="files/subpages/styles/estilos.css">

<!-- Si no hay sesion de usuario, retornar al login -->
<?php
session_start();
if (!isset($_SESSION["rol"])) {
    header("Location: files/formularios/user_login_registration.php");
}

// Destruir sesion de usuario
if (isset($_GET["accion"]) && ($_GET["accion"] == "logout")) {
    session_destroy();
    header("Location: files/formularios/user_login_registration.php");
}
?>

<body>
    <section id="carrusel">
        <div class="carrusel-item img-activa">
            <img src="files/images/woman-4158906_1920.jpg" alt="">
            <h3 class="slideTitulo">
                En Music Store las últimas tendencias musicales
            </h3>
            <div class="btn-container">
                <a href="">Ver tendencias</a>
            </div>
        </div>
        <div class="carrusel-item">
            <img src="files/images/elvis-presley-1482026_1920.jpg" alt="">
            <h3 class="slideTitulo">
                ¿Eres un coleccionista?
            </h3>
            <div class="btn-container">
                <a href="">Ver precios especiales</a>
            </div>
        </div>
        <div class="carrusel-item">
            <img src="files/images/vinyl-1595847_1920.jpg" alt="">
            <h3 class="slideTitulo">
                En Music Store somos amantes de lo antiguo
            </h3>
            <div class="btn-container">
                <a href="">Ver sección histórica</a>
            </div>
        </div>
        <div class="carrusel-item">
            <img src="files/images/ochentera.jpg" alt="">
            <h3 class="slideTitulo">
                Amamos estar actualizados
            </h3>
            <div class="btn-container">
                <a href="">Ver novedades</a>
            </div>
        </div>
        <div class="flechas">
            <a class="mover" id="backward" href="#carrusel">&#10094</a>
            <a class="mover" id="fordward" href="#carrusel">&#10095</a>
        </div>
        <div class="cajaPuntos">
            <div class="puntos puntoActivo"></div>
            <div class="puntos"></div>
            <div class="puntos"></div>
            <div class="puntos"></div>
        </div>
    </section>
    <!-- contenidos -->
    <section id="generos">
        <h1 class="titulos">Según tu estilo</h1>
        <div class="tContainer">
        </div>
    </section>
    <section id="album">
        <h1 class="titulos">Álbumes destacados</h1>
        <div class="tContainer">
        </div>
    </section>
    <section id="artistas">
        <h1 class="titulos">Tus artistas favoritos</h1>
        <div class="tContainer">
        </div>
    </section>

    <?php include("files/subpages/footer.php") ?>