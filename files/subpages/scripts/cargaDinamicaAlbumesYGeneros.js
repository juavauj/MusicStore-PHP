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
          span.innerText = a.precio;
          tarjetaHover.appendChild(span);

          let button = document.createElement("button");
          button.innerText = "Ver más";
          tarjetaHover.appendChild(button);

          tarjeta.appendChild(tarjetaHover);

          contenedorAlbumes.appendChild(tarjeta);
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

document.addEventListener("DOMContentLoaded", function () {
  // request para los generos
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
          span.innerText = a.precio;
          divHover.appendChild(span);

          let button = document.createElement("button");
          button.innerText = "Ver más";
          divHover.appendChild(button);

          div.appendChild(divHover);

          contenedorAlbumes.appendChild(div);
        });
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
});