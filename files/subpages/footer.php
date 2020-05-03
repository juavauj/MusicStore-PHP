<footer class="foot" id="foot">
    <div>
        <h2 class="footText">Contáctanos</h2>
        <p class="footContent">742 de Evergreen Terrace</p>
        <p class="footContent">Tel: 3465346</p>
        <p class="footContent">info@musicstore.com</p>
    </div>
    <div id="siguenos">
        <h2 class="footText">Síguenos</h2>
        <a class="footContent" href=""><img src="files/images/facebook.png" alt=""></a>
        <a class="footContent" href=""><img src="files/images/instagram.png" alt=""></a>
        <a class="footContent" href=""><img src="files/images/spotify-sketch.png" alt=""></a>
        <br>
        <a class="footContent" href=""><img src="files/images/twitter.png" alt=""></a>
        <a class="footContent" href=""><img src="files/images/whatsapp.png" alt=""></a>
        <a class="footContent" href=""><img src="files/images/brand.png" alt=""></a>
    </div>
    <div>
        <h2 class="footText">Trabaja con nosotros</h2>
        <input name="" id="" placeholder="Déjanos tu correo"></textarea>
        <button>Enviar</button>
    </div>
    <div>
        <h2 class="footText">Cosas aburridas</h2>
        <p>
            Music store 2020. Todos los derechos reservados. Dream team BICTIA 2020. Actividad académica.
        </p>
    </div>
</footer>
<script>
    let fotoActiva = [];
    let punto = [];
    let fordward = document.getElementById("fordward");
    let backward = document.getElementById("backward");
    let index = 0;

    function slider() {
        fotoActiva = document.getElementsByClassName("carrusel-item");
        punto = document.getElementsByClassName("puntos");
        if (index < 0) {
            index = fotoActiva.length - 1
        }
        if (index >= fotoActiva.length) {
            index = 0
        }
        for (let i = 0; i < fotoActiva.length; i++) {
            fotoActiva[i].classList.remove('img-activa')
            punto[i].classList.remove('puntoActivo')
        }
        fotoActiva[index].classList.add('img-activa')
        punto[index].classList.add('puntoActivo')
    }
    fordward.addEventListener("click", function next() {
        index++
        slider()
    })
    backward.addEventListener("click", function prev() {
        index--
        slider()
    })
    let puntos = document.getElementsByClassName("puntos")
    for (j = 0; j < puntos.length; j++) {
        puntos[j].addEventListener("click", function() {
            index++
            slider()
        })
    }
    setInterval(function() {
        index++
        slider()
    }, 7000);

    let menuRes = document.getElementById("anvorguesa")

    menuRes.addEventListener("click", function dropDown() {
        let drop = document.getElementById("menu")
        if (drop.style.display == "none") {
            drop.style.display = "block"
        } else {
            drop.style.display = "none"
        }
    })
    let abrir = document.getElementsByClassName("modalAbrir")
    let modal = document.getElementsByClassName("modal")
    let tarjetas = document.getElementsByClassName("tarjeta")

    for (let k = 0; k < tarjetas.length; k++) {
        abrir[k].addEventListener("click", function() {
            modal[0].style.display = "block"
        })
        if (tarjetas[k].style.width <= "800px") {
            tarjetas[k].addEventListener("click", function() {
                modal[0].style.display = "block"
            })
        }
    }

    let cerrar = document.getElementById("modalClose")
    cerrar.addEventListener("click", function() {
        modal[0].style.display = "none"
    })
</script>
<script src="files/subpages/scripts/cargaDinamicaAlbumesYGeneros.js"></script>
</body>
<link rel="stylesheet" href="files/subpages/styles/estilos.css">

</html>