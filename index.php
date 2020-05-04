<?php include("config/class.Conexion.php") ?>
<?php include("files/subpages/header.html") ?>
<!-- Comentario ejemplo -->
<link rel="stylesheet" href="files/subpages/styles/estilos.css">

<body>
    <section id="carrusel">
        <div class="carrusel-item img-activa">
            <img src="files/images/woman-4158906_1920.jpg" alt="">
            <h3 class="slideTitulo">Título de algo</h3>
            <p class="slideContenido">Contenido a poner</p>
        </div>
        <div class="carrusel-item">
            <img src="files/images/elvis-presley-1482026_1920.jpg" alt="">
            <h3 class="slideTitulo">Título de algo 2</h3>
            <p class="slideContenido">Contenido a poner</p>
        </div>
        <div class="carrusel-item">
            <img src="files/images/vinyl-1595847_1920.jpg" alt="">
            <h3 class="slideTitulo">Título de algo 3</h3>
            <p class="slideContenido">Contenido a poner</p>
        </div>
        <div class="carrusel-item">
            <img src="files/images/ochentera.jpg" alt="">
            <h3 class="slideTitulo">Título de algo 4</h3>
            <p class="slideContenido">Contenido a poner</p>
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