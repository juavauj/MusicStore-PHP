<?php 
      
      $mysqli = new mysqli('localhost', 'root', '', 'musicstore');

      /* comprobar la conexión */
      if ($mysqli->connect_errno) {
          printf("Conexión fallida: %s\n", $mysqli->connect_error);
          exit();
      } else {
          echo "is working";
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
      
        
      } elseif (isset($_GET['id2'])) {
        
        $id = $_GET['id2'];
        $tabla = $_GET['tabla2'];

        $query = "DELETE FROM $tabla WHERE idGenero=$id";
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }
        header("location: superAdmin.php");                    
        
        }elseif (isset($_GET['id3'])) {
        
            $id = $_GET['id3'];
            $tabla = $_GET['tabla3'];
    
            $query = "DELETE FROM $tabla WHERE idCancion=$id";
            $result = mysqli_query($mysqli, $query);
            var_dump($query);
            if(!$result){
                die("Query Failed");
            }
            header("location: superAdmin.php");                    
      } elseif (isset($_GET['id4'])) {
        
        $id = $_GET['id4'];
        $tabla = $_GET['tabla4'];

        $query = "DELETE FROM $tabla WHERE nombre=$id";
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }
        header("location: superAdmin.php");                    
  }
      
      


?>
