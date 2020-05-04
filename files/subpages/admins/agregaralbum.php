<?php 
session_start();
include('db.php');

if (isset($_POST['save_album'])){
  $nombre = addslashes($_POST['nombre']);
  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];
  $description = addslashes($_POST['descripcion']);
  $stockFisico = $_POST['stockFisico'];
  $idEstado = $_POST['idEstado'];
  $idGenero = $_POST['idGenero'];
  $idArtista = $_POST['idArtista'];
  
  // Agregar imágen
  $carpeta = "files/images/albumes/".basename($_FILES['imagen']['name']);
  $carpetaAdmin = "../../images/albumes/".basename($_FILES['imagen']['name']);
  $imagen = $_FILES['imagen']['name'];
  move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaAdmin);

  $query = "INSERT INTO albumes(nombre, imagen, descripcion, precio, fecha, stockFisico, idEstado, idGenero, idArtista ) VALUES ('$nombre', '$carpeta', '$description', '$precio','$fecha','$stockFisico','$idEstado','$idGenero','$idArtista');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
      die("introdujiste un valor no valido y la consulta no se envio. regresa y por favor verifica que los datos son los correctos");
    }
    if($_SESSION['rol'] == 'superadmin'){     
      header("location: superAdmin.php");
  } else {           
      header("location: admin.php");
  }; 
}

if (isset($_POST['save_song'])){
  $nombre = addslashes($_POST['nombre']);
  $idArtista = $_POST['idArtista'];
  $idAlbum = $_POST['idAlbum'];
  $idEstado = $_POST['idEstado'];

  $query = "INSERT INTO canciones(nombre, idArtista, idAlbum, idEstado ) VALUES ('$nombre', '$idArtista','$idAlbum', '$idEstado')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
      die("Query Failed.");
    }
    if($_SESSION['rol'] == 'superadmin'){     
      header("location: superAdmin.php");
  } else {           
      header("location: admin.php");
  }; 
}

if (isset($_POST['save_genre'])){
  $genero = addslashes($_POST['genero']);
  $idEstado = $_POST['idEstado'];

  $query = "INSERT INTO generos(genero, idEstado) VALUES('$genero', $idEstado)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  if($_SESSION['rol'] == 'superadmin'){     
    header("location: superAdmin.php");
} else {           
    header("location: admin.php");
}; 
}

if (isset($_POST['save_admin'])){
  $nombre = addslashes($_POST['nombre']);
  $apellido = addslashes($_POST['apellido']);
  $correo = addslashes($_POST['correo']);
  $contrasena = addslashes($_POST['contrasena']);
  $idEstado = $_POST['idEstado'];
  $idRol = '2';

  $query = "INSERT INTO usuarios(nombre, apellido, correo, contrasena, idEstado, idRol) VALUES('$nombre', '$apellido', '$correo', '$contrasena', '$idEstado', $idRol)";
  $result = mysqli_query($conn, $query);
  var_dump($query);
  if(!$result) {
    die("Query Failed.");
  }
  if($_SESSION['rol'] == 'superadmin'){     
    header("location: superAdmin.php");
} else {           
    header("location: admin.php");
}; 
}

if (isset($_POST['save_artist'])){
  $nombre = addslashes($_POST['nombre']);
  $imagen = $_POST['imagen'];
  $idEstado = $_POST['idEstado'];

  // Agregar imágen
  $carpeta = "files/images/artistas/".basename($_FILES['imagen']['name']);
  $carpetaAdmin = "../../images/artistas/".basename($_FILES['imagen']['name']);
  $imagen = $_FILES['imagen']['name'];
  move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaAdmin);

  $query = "INSERT INTO artistas(nombre, imagen, idEstado) VALUES('$nombre', '$carpeta', '$idEstado')";
  $result = mysqli_query($conn, $query);
  var_dump($query);
  if(!$result) {
    die("Query Failed.");
  }
  if($_SESSION['rol'] == 'superadmin'){     
    header("location: superAdmin.php");
} else {           
    header("location: admin.php");
}; 
}

?>