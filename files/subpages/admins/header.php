<?php session_start();

if(isset($_POST['closesession'])){
    session_destroy();
    header('location: ../../formularios/admin_superadmin_login.php');  
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MusicStore </title>
    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7045981063.js" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="superAdmin.php">Bandeja de administrador</a>
        <form class="form-inline" action="header.php" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="no funcional" aria-label="Search">
            <a class="btn btn-outline-success my-2 my-sm-0" type="input" href="#">Search</a>
            <a class="btn btn-outline-success my-2 my-sm-0" type="input" target="blank" href="../../../index.php">User view</a>                 
            <a class="btn btn-outline-success my-2 my-sm-0" type="input" target="blank" href="../../../index.php"> <?php echo $_SESSION['rol']?></a>
            <input class="btn btn-outline-success my-2 my-sm-0"  type="submit" value="cerrar sesion" name="closesession">
        </form>
    </nav>    
</header>
