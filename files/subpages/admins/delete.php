<?php 
      
      $mysqli = new mysqli('localhost', 'root', '', 'musicstore');

      /* comprobar la conexión */
      if ($mysqli->connect_errno) {
          printf("Conexión fallida: %s\n", $mysqli->connect_error);
          exit();
      } else {

      }
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $tabla = $_GET['tabla'];

        $query = "DELETE FROM $tabla WHERE idUsuario=$id";
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }
      
        header("location: superAdmin.php");
      }
      
      if (isset($_GET['id2'])) {
        $id = $_GET['id'];
        $tabla = $_GET['tabla'];

        $query = "DELETE FROM $tabla WHERE idUsuario=$id";
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }
      
        header("location: superAdmin.php");
      }

      


?>
