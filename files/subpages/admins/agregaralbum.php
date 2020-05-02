<?php 

include('db.php');

if (isset($_POST['save_album'])){
  $nombre = $_POST['nombre'];
  $imagen = $_POST['imagen'];
  $carpeta = "/../../images/albumes/";
  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];
  $stockFisico = $_POST['stockFisico'];
  $idEstado = $_POST['idEstado'];
  $idGenero = $_POST['idGenero'];
  $idArtista = $_POST['idArtista'];
  
  // Agregar imágen
  opendir($carpeta);
  $destino = $carpeta . $_FILES['imagen']['name'];
  move_uploaded_file($_FILES['imagen']['tmp_name'],$destino);

  $query = "INSERT INTO albumes(nombre, imagen, precio, fecha, stockFisico, idEstado, idGenero, idArtista ) VALUES ('$nombre', '$imagen','$precio','$fecha','$stockFisico','$idEstado','$idGenero','$idArtista')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
      die("Query Failed.");
    }
    header('Location: superadmin.php');
}

if (isset($_POST['save_song'])){
  $nombre = $_POST['nombre'];
  $idArtista = $_POST['idArtista'];
  $idAlbum = $_POST['idAlbum'];

  $query = "INSERT INTO canciones(nombre, idArtista, idAlbum ) VALUES ('$nombre', '$idArtista','$idAlbum')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
      die("Query Failed.");
    }
    header('Location: superadmin.php');
}

if (isset($_POST['save_genre'])){
  $genero = $_POST['genero'];
  $query = "INSERT INTO generos(genero) VALUES('$genero')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: superadmin.php');
}

if (isset($_POST['save_admin'])){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];
  $idEstado = $_POST['idEstado'];
  $idRol = '2';

  $query = "INSERT INTO usuarios(nombre, apellido, correo, contrasena, idEstado, idRol) VALUES('$nombre', '$apellido', '$correo', '$contrasena', '$idEstado', $idRol)";
  $result = mysqli_query($conn, $query);
  var_dump($query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: superadmin.php');
}

?>