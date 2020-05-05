var canciones;

// Funciones relacionadas con estilo (Jonathan)
function numAleatorio() {
  let aleatorio = (Math.random() * 255).toFixed(0);
  return aleatorio;
}

function losRgb() {
  let numRgb = `rgb(${numAleatorio()}, ${numAleatorio()}, ${numAleatorio()})`;
  return numRgb;
}

// Todas las canciones en BDD
function getTodasLasCanciones() {
  let requestCanciones = new XMLHttpRequest();
  requestCanciones.onreadystatechange = function (lista) {
    canciones = JSON.parse(requestCanciones.responseText);
  };
  requestCanciones.open(
    "GET",
    // Evitar la cache
    "control/cancionesControl.php?accion=getCanciones" +
      "&" +
      new Date().getTime(),
    true
  );
  requestCanciones.send();
}

// Request para todos los albumes activos con determinado genero
//  e inclusion en el DOM
function getAlbumesConGenero(idGenero) {
  let requestSoloGenero = new XMLHttpRequest();
  requestSoloGenero.onreadystatechange = function () {
    try {
      if (
        requestSoloGenero.readyState === XMLHttpRequest.DONE &&
        requestSoloGenero.status === 200
      ) {
        let contenedorAlbumes = document.querySelector("#album .tContainer");
        contenedorAlbumes.innerHTML = "";
        let albumes = JSON.parse(requestSoloGenero.responseText);
        albumes.forEach((a) => {
          let tarjeta = document.createElement("div");
          tarjeta.classList.add("tarjeta");

          let img = document.createElement("img");
          img.setAttribute("src", a.imagen);
          img.setAttribute("alt", "sin imagen");
          tarjeta.appendChild(img);

          let modal = document.createElement("div");
          modal.classList.add("modal");

          let mWindow = document.createElement("div");
          mWindow.classList.add("mWindow");

          // descripcion
          let divDescr = document.createElement("div");
          let imgAlbum = document.createElement("img");
          imgAlbum.setAttribute("src", a.imagen);
          let pDescr = document.createElement("p");
          pDescr.innerText = a.descripcion;
          divDescr.appendChild(imgAlbum);
          divDescr.appendChild(pDescr);
          mWindow.appendChild(divDescr);

          // info del album
          let divInfo = document.createElement("div");
          let tituloAlbum = document.createElement("h1");
          tituloAlbum.innerText = a.nombreAlbum;
          let tituloArtista = document.createElement("h3");
          tituloArtista.innerText = a.nombreArtista;
          divInfo.appendChild(tituloAlbum);
          divInfo.appendChild(tituloArtista);

          // Lista de canciones
          let ol = document.createElement("ol");
          canciones.forEach((c) => {
            if (c.albumCancion === a.idAlbum) {
              let liCancion = document.createElement("li");
              liCancion.innerText = c.nombreCancion;
              ol.appendChild(liCancion);
            }
          });

          divInfo.appendChild(ol);

          mWindow.appendChild(divInfo);
          modal.appendChild(mWindow);

          let botonCerrarModal = document.createElement("button");
          botonCerrarModal.innerText = "x";
          botonCerrarModal.classList.add("modalClose");
          // Reemplaza el for
          botonCerrarModal.addEventListener("click", function () {
            modal.style.display = "none";
            document.querySelector("body").style.overflow = "scroll";
            modal.style.overflowY = "none";
          });

          mWindow.appendChild(botonCerrarModal);

          let tarjetaHover = document.createElement("div");
          tarjetaHover.classList.add("tarjetaHover");

          let h4 = document.createElement("h4");
          h4.innerText = a.nombreAlbum;
          tarjetaHover.appendChild(h4);

          let h5 = document.createElement("h5");
          h5.innerText = a.nombreArtista;
          tarjetaHover.appendChild(h5);

          let p = document.createElement("p");
          p.innerText = a.descripcion;
          tarjetaHover.appendChild(p);

          let span = document.createElement("span");
          span.innerText = "$" + a.precio;
          tarjetaHover.appendChild(span);

          let button = document.createElement("button");
          button.innerText = "Ver más";
          button.classList.add("boton", "modalAbrir");
          // reemplaza el for
          button.addEventListener("click", function () {
            modal.style.display = "block";
            document.querySelector("body").style.overflow = "hidden";
            modal.style.overflowY = "scroll";
          });
          tarjetaHover.appendChild(button);

          tarjeta.appendChild(tarjetaHover);

          tarjeta.addEventListener("click", function () {
            modal.style.display = "block";
            document.querySelector("body").style.overflow = "hidden";
            modal.style.overflowY = "scroll";
          });

          contenedorAlbumes.appendChild(tarjeta);
          contenedorAlbumes.appendChild(modal);
        });
      }
    } catch (error) {
      console.log(
        "Error al solicitar generos especificos: " + error.description
      );
      console.log(error);
    }
  };
  requestSoloGenero.open(
    "GET",
    // Evitar la cache
    "control/albumesControl.php?accion=getSoloGenero&idGenero=" +
      idGenero +
      "&",
    new Date().getTime(),
    true
  );
  requestSoloGenero.send();
}

// Request para todos los albumes activos e inclusion en el DOM
function getTodosLosAlbumes() {
  let requestAlbumes = new XMLHttpRequest();
  requestAlbumes.onreadystatechange = function () {
    try {
      if (
        requestAlbumes.readyState === XMLHttpRequest.DONE &&
        requestAlbumes.status === 200
      ) {
        let contenedorAlbumes = document.querySelector("#album .tContainer");
        // Vaciar posible contenido
        contenedorAlbumes.innerHTML = "";
        let albumes = JSON.parse(requestAlbumes.responseText);
        albumes.forEach((a) => {
          let div = document.createElement("div");
          div.classList.add("tarjeta");

          let img = document.createElement("img");
          img.setAttribute("src", a.imagen);
          img.setAttribute("alt", "sin imagen");
          div.appendChild(img);

          let modal = document.createElement("div");
          modal.classList.add("modal");

          let mWindow = document.createElement("div");
          mWindow.classList.add("mWindow");

          // descripcion
          let divDescr = document.createElement("div");
          let imgAlbum = document.createElement("img");
          imgAlbum.setAttribute("src", a.imagen);
          let pDescr = document.createElement("p");
          pDescr.innerText = a.descripcion;
          divDescr.appendChild(imgAlbum);
          divDescr.appendChild(pDescr);
          mWindow.appendChild(divDescr);

          // info del album
          let divInfo = document.createElement("div");
          let tituloAlbum = document.createElement("h1");
          tituloAlbum.innerText = a.nombreAlbum;
          let tituloArtista = document.createElement("h3");
          tituloArtista.innerText = a.nombreArtista;
          divInfo.appendChild(tituloAlbum);
          divInfo.appendChild(tituloArtista);

          // Lista de canciones
          let ol = document.createElement("ol");
          canciones.forEach((c) => {
            if (c.albumCancion === a.idAlbum) {
              let liCancion = document.createElement("li");
              liCancion.innerText = c.nombreCancion;
              ol.appendChild(liCancion);
            }
          });

          divInfo.appendChild(ol);

          mWindow.appendChild(divInfo);
          modal.appendChild(mWindow);

          let botonCerrarModal = document.createElement("button");
          botonCerrarModal.innerText = "x";
          botonCerrarModal.classList.add("modalClose");
          // Reemplaza el for
          botonCerrarModal.addEventListener("click", function () {
            modal.style.display = "none";
            document.querySelector("body").style.overflow = "scroll";
            modal.style.overflowY = "none";
          });

          mWindow.appendChild(botonCerrarModal);

          let divHover = document.createElement("div");
          divHover.classList.add("tarjetaHover");

          let h4 = document.createElement("h4");
          h4.innerText = a.nombreAlbum;
          divHover.appendChild(h4);

          let h5 = document.createElement("h5");
          h5.innerText = a.nombreArtista;
          divHover.appendChild(h5);

          let p = document.createElement("p");
          p.innerText = a.descripcion;
          divHover.appendChild(p);

          let span = document.createElement("span");
          span.innerText = "$" + a.precio;
          divHover.appendChild(span);

          let button = document.createElement("button");
          button.innerText = "Ver más";
          button.classList.add("boton", "modalAbrir");
          // reemplaza el for
          button.addEventListener("click", function () {
            modal.style.display = "block";
            document.querySelector("body").style.overflow = "hidden";
            modal.style.overflowY = "scroll";
          });
          divHover.appendChild(button);

          div.appendChild(divHover);

          div.addEventListener("click", function () {
            modal.style.display = "block";
            document.querySelector("body").style.overflow = "hidden";
            modal.style.overflowY = "scroll";
          });

          contenedorAlbumes.appendChild(div);
          contenedorAlbumes.appendChild(modal);
        });
        /* let abrir = document.getElementsByClassName("modalAbrir");
        let modales = document.getElementsByClassName("modal");
        let tarjetas = document.getElementsByClassName("tarjeta");
        let cerrar = document.getElementsByClassName("modalClose"); */

        /* for (let k = 0; k < tarjetas.length; k++) {
          abrir[k].addEventListener("click", function () {
            modales[0].style.display = "block";
          });
          if (tarjetas[k].style.width <= "800px") {
            tarjetas[k].addEventListener("click", function () {
              modales[0].style.display = "block";
            });
          }
          cerrar[k].addEventListener("click", function () {
            modales[0].style.display = "none";
          });
        } */
      }
    } catch (error) {
      console.log("Fallo solicitud de albumes: " + error.description);
    }
  };
  requestAlbumes.open(
    "GET",
    // Evitar la cache
    "control/albumesControl.php?accion=getAlbumesActivos&" +
      new Date().getTime(),
    true
  );
  requestAlbumes.send();
}

// Request para todos los generos activos e inclusion en el DOM
function getTodosLosGeneros() {
  let requestGeneros = new XMLHttpRequest();
  requestGeneros.onreadystatechange = function () {
    try {
      if (
        requestGeneros.readyState === XMLHttpRequest.DONE &&
        requestGeneros.status === 200
      ) {
        let contenedorGeneros = document.querySelector("#generos .tContainer");
        // Vaciar posible contenido
        contenedorGeneros.innerHTML = "";
        let generos = JSON.parse(requestGeneros.responseText);
        generos.forEach((g) => {
          let div = document.createElement("div");
          div.classList.add("tarjetaGn");
          let h4 = document.createElement("h4");
          // Primera en minuscula
          h4.innerText =
            g.genero.charAt(0).toUpperCase() + g.genero.substr(1).toLowerCase();

          // Almacenar el id del genero en un atributo data-*
          div.dataset.idGenero = g.idGenero;
          // Gestor para el evento click
          div.addEventListener("click", function (evento) {
            // Realizar peticion solo por albumes con ese id de genero
            getAlbumesConGenero(evento.currentTarget.dataset.idGenero);
          });

          div.appendChild(h4);
          contenedorGeneros.appendChild(div);
        });
        // Boton para ver todos los generos
        divVerTodos = document.createElement("div");
        divVerTodos.classList.add("tarjetaGn");

        let h4 = document.createElement("h4");
        h4.innerText = "Ver todo";
        divVerTodos.appendChild(h4);

        divVerTodos.addEventListener("click", function () {
          getTodosLosAlbumes();
        });

        contenedorGeneros.appendChild(divVerTodos);
      }
    } catch (error) {
      console.log("Fallo solicitud de generos: " + error.description);
    }
  };
  requestGeneros.open(
    "GET",
    // Evitar la cache
    "control/generosControl.php?accion=getGenerosActivos&" +
      new Date().getTime(),
    true
  );
  requestGeneros.send();
}

// Request para todos los artistas activos e inclusion en el DOM
function getTodosLosArtistas() {
  let requestArtistas = new XMLHttpRequest();
  requestArtistas.onreadystatechange = function () {
    try {
      if (
        requestArtistas.readyState === XMLHttpRequest.DONE &&
        requestArtistas.status === 200
      ) {
        let contenedorArtistas = document.querySelector(
          "#artistas .tContainer"
        );
        // Vaciar posible contenido
        contenedorArtistas.innerHTML = "";
        let artistas = JSON.parse(requestArtistas.responseText);
        artistas.forEach((a) => {
          let tarjetaArt = document.createElement("div");
          tarjetaArt.classList.add("tarjetaArt");

          let anchor = document.createElement("a");
          anchor.setAttribute("href", "");

          let img = document.createElement("img");
          img.setAttribute("src", a.imagen);
          img.setAttribute("alt", "sin imagen");

          anchor.appendChild(img);
          tarjetaArt.appendChild(anchor);

          let tarjetaLabel = document.createElement("div");
          tarjetaLabel.classList.add("tarjetaLabel");

          let h4 = document.createElement("h4");
          h4.innerText = a.nombre;
          tarjetaLabel.appendChild(h4);
          tarjetaArt.appendChild(tarjetaLabel);

          contenedorArtistas.appendChild(tarjetaArt);
        });

        // Jonathan
        let cuadros = document.getElementsByClassName("tarjetaArt");
        for (let i = 0; i < cuadros.length; i++) {
          cuadros[i].style.backgroundColor = losRgb();
        }
      }
    } catch (error) {
      console.log("Fallo solicitud de artistas: " + error.description);
    }
  };
  requestArtistas.open(
    "GET",
    // Evitar la cache
    "control/artistasControl.php?accion=getArtistasActivos&" +
      new Date().getTime(),
    true
  );
  requestArtistas.send();
}

document.addEventListener("DOMContentLoaded", function () {
  getTodasLasCanciones();
  getTodosLosGeneros();
  getTodosLosAlbumes();
  getTodosLosArtistas();
});
