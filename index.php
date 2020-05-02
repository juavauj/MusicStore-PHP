<?php include("config/class.Conexion.php")?>
<?php include("files/subpages/header.html")?>
<!-- Comentario ejemplo -->
<link rel="stylesheet" href="files/subpages/styles/estilos.css">
<body>
    <section id="carrusel">
            <div class="carrusel-item img-activa">
                <img src="../Documents/GitHub/MusicStore-PHP/files/images/woman-4158906_1920.jpg" alt="">
                <h3 class="slideTitulo">Título de algo</h3>
                <p class="slideContenido">Contenido a poner</p>
            </div>
            <div class="carrusel-item">
                <img src="../Documents/GitHub/MusicStore-PHP/files/images/elvis-presley-1482026_1920.jpg" alt="">
                <h3 class="slideTitulo">Título de algo 2</h3>
                <p class="slideContenido">Contenido a poner</p>
            </div>
            <div class="carrusel-item">
                <img src="../Documents/GitHub/MusicStore-PHP/files/images/vinyl-1595847_1920.jpg" alt="">
                <h3 class="slideTitulo">Título de algo 3</h3>
                <p class="slideContenido">Contenido a poner</p>
            </div>
            <div class="carrusel-item">
                <img src="../Documents/GitHub/MusicStore-PHP/files/images/ochentera.jpg" alt="">
                <h3 class="slideTitulo">Título de algo 4</h3>
                <p class="slideContenido">Contenido a poner</p>
            </div>
            <div class="flechas">
                <a class="mover" id="backward"  href="#carrusel">&#10094</a>
                <a class="mover" id="fordward" href="#carrusel">&#10095</a>
            </div>
            <div class="cajaPuntos">
                <div class="puntos puntoActivo"></div>
                <div class="puntos"></div>
                <div class="puntos"></div>
                <div class="puntos"></div>
            </div>
            <section id="generos">
        <h1 class="titulos">Géneros</h1>
        <div class="tContainer">
        <div class="tarjetaGn">
            <h4>Rock</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Pop</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Jazz</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Blues</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Reggaetón</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Dancehall</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Salsa</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Country</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Metal</h4>
        </div>
        <div class="tarjetaGn">
            <h4>Rap</h4>
        </div>
    </div>
    </section>
    <section id="album">
        <h1 class="titulos">Álbumes</h1>
        <div class="tContainer">
        <div class="tarjeta">
            <img src="../Documents/GitHub/MusicStore-PHP/files/images/albumes/kindOfBlue.jpg" alt="">
            <div class="tarjetaHover">
               <h4>Kind of Blue</h4> 
               <h5>Miles Davis</h5> 
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore similique cupiditate consequuntur consequatur iusto animi eveniet, incidunt placeat voluptatum tempore nam ullam laudantium deleniti excepturi saepe nulla accusamus expedita reprehenderit!</p>
               <span>$30.000</span>
               <button>Ver más</button>
            </div>
        </div>
        <div class="tarjeta">
            <img src="../Documents/GitHub/MusicStore-PHP/files/images/albumes/laquidity.jpg" alt="">
            <div class="tarjetaHover">
               <h4>Kind of Blue</h4> 
               <h5>Miles Davis</h5> 
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore similique cupiditate consequuntur consequatur iusto animi eveniet, incidunt placeat voluptatum tempore nam ullam laudantium deleniti excepturi saepe nulla accusamus expedita reprehenderit!</p>
               <span>$30.000</span>
               <button>Ver más</button>
            </div>
        </div>
        <div class="tarjeta">
            <img src="../Documents/GitHub/MusicStore-PHP/files/images/albumes/aLoveSupreme.jpg" alt="">
            <div class="tarjetaHover">
               <h4>Kind of Blue</h4> 
               <h5>Miles Davis</h5> 
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore similique cupiditate consequuntur consequatur iusto animi eveniet, incidunt placeat voluptatum tempore nam ullam laudantium deleniti excepturi saepe nulla accusamus expedita reprehenderit!</p>
               <span>$30.000</span>
               <button>Ver más</button>
            </div>
        </div>
    </div>
    </section>
    <section id="artistas">
        <h1 class="titulos">Artistas</h1>
        <div class="tContainer">
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/pinkFloyd.jpg" alt=""></a>
            <div class="tarjetaLabel">
               <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/sunRa.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/charlesMingus.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/death.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/johnColtrane.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/artBlakey.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/milesDavis.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
        <div class="tarjetaArt">
            <a href=""><img src="../Documents/GitHub/MusicStore-PHP/files/images/artistas/kateBush.jpg" alt=""></a>
            <div class="tarjetaLabel">
                <h4>Kind of Blue</h4> 
            </div>
        </div>
    </div>
    </section>

<?php include("files/subpages/footer.php")?>