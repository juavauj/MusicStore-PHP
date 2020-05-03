$(document).ready(function () {
  // Revisando el query string
  let urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("form")) {
    let showingForm = urlParams.get("form");
    if (showingForm == "form_login") {
      // Mostrar login
      $(".form .form-registration").hide();
    } else if (showingForm == "form_registration") {
      // Mostrar registro
      $(".form .form-login").hide();
    }
  } else {
    // Por defecto, mostrar el formulario de login
    $(".form .form-registration").hide();
  }

  // jquery facilita la transicion mediante su funcion toggle
  $(".message a").click(() => {
    $(".form-registration").toggle("slow");
    $(".form-login").toggle("slow");

    // Eliminar cualquier mensaje informativo
    $("section.error").remove();
    $("section.success").remove();
  });
});
