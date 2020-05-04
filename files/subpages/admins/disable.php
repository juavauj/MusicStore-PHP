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
        $estado = $_GET['estado'];

        if($estado == 'activo'){
            $query = "UPDATE $tabla SET idEstado = '2' WHERE idUsuario = $id";
        } else {
            $query = "UPDATE $tabla SET idEstado = '1' WHERE idUsuario = $id";
        }
        
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }

        if($session['rol'] == 'superadmin'){     
            header("location: superAdmin.php");
        } else {           
            header("location: admin.php");
        }; 
      
        
      } elseif (isset($_GET['id2'])) {
        
            $id = $_GET['id2'];
            $tabla = $_GET['tabla2'];
            $estado = $_GET['estado'];
    
            if($estado == 'activo'){
                $query = "UPDATE $tabla SET idEstado = '2' WHERE idGenero = $id";
            } else {
                $query = "UPDATE $tabla SET idEstado = '1' WHERE idGenero = $id";
            }
            
            $result = mysqli_query($mysqli, $query);
            var_dump($query);
            if(!$result){
                die("Query Failed");
            }
            if($session['rol'] == 'superadmin'){     
                header("location: superAdmin.php");
            } else {           
                header("location: admin.php");
            }; 

      } elseif (isset($_GET['id3'])) {
        
        $id = $_GET['id3'];
        $tabla = $_GET['tabla3'];
        $estado = $_GET['estado'];

        if($estado == 'activo'){
            $query = "UPDATE $tabla SET idEstado = '2' WHERE idCancion = $id";
        } else {
            $query = "UPDATE $tabla SET idEstado = '1' WHERE idCancion = $id";
        }
        
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }
        if($session['rol'] == 'superadmin'){     
            header("location: superAdmin.php");
        } else {           
            header("location: admin.php");
        }; 

     } elseif (isset($_GET['id4'])) {
        
        $id = $_GET['id4'];
        $tabla = $_GET['tabla4'];
        $estado = $_GET['estado'];

        if($estado == 'activo'){
            $query = "UPDATE $tabla SET idEstado = '2' WHERE idAlbum = $id";
        } else {
            $query = "UPDATE $tabla SET idEstado = '1' WHERE idAlbum = $id";
        }
        
        $result = mysqli_query($mysqli, $query);
        var_dump($query);
        if(!$result){
            die("Query Failed");
        }
        if($session['rol'] == 'superadmin'){     
            header("location: superAdmin.php");
        } else {           
            header("location: admin.php");
        }; 
  } elseif (isset($_GET['id5'])) {
        
    $id = $_GET['id5'];
    $tabla = $_GET['tabla5'];
    $estado = $_GET['estado'];

    if($estado == 'activo'){
        $query = "UPDATE $tabla SET idEstado = '2' WHERE idArtista = $id";
    } else {
        $query = "UPDATE $tabla SET idEstado = '1' WHERE idArtista = $id";
    }
    
    $result = mysqli_query($mysqli, $query);
    var_dump($query);
    if(!$result){
        die("Query Failed");
    }
    if($session['rol'] == 'superadmin'){     
        header("location: superAdmin.php");
    } else {           
        header("location: admin.php");
    }; 
}
?>