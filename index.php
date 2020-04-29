<?php include("config/class.Conexion.php")?>
<?php include("files/header.html")?>

<body>
    <!-- banner-leyenda -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="files/images/girl.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Nombre de la pagina</h5>
        <p>Leyenda</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="files/images/ochentera.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Nombre de la pagina</h5>
        <p>leyenda</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!--  tarjetas artistas -->
<div class="card-group">
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Artista1</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Artista2</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Artista3</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>   
</body>
  <!-- filtrador --> 
<form class="form-inline">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Categorias</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Selecciona</option>
    <option value="1">Rock</option>
    <option value="2">Pop</option>
    <option value="3">Jazz</option>
  </select>
  <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>
 <!-- Albumes -->
 <h2>Rock</h2>
<div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Dark side of the moon</h5>
        <img src="" alt="No image">
        <h6>fecha</h6>
        <h6>precio</h6>
        <ul>artistas</ul>
        <ul>canciones</ul>
        <h6>fisico</h6>
        <h6>digital</h6>
        <p class="card-text">DESCRIPTION: This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <button type="button" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
  
  </div>
</div>
<h2>Rock</h2>
<div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Dark side of the moon</h5>
        <img src="" alt="No image">
        <h6>fecha</h6>
        <h6>precio</h6>
        <ul>artistas</ul>
        <ul>canciones</ul>
        <h6>fisico</h6>
        <h6>digital</h6>
        <p class="card-text">DESCRIPTION: This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <button type="button" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
  </div>
</div>



<?php include("files/footer.php")?>