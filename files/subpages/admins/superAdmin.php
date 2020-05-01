<?php include("header.php")?>
<!-- <?php include("db.php")?> -->

<?php
/* if (isset($conn)){
    echo "DB is connected";
} */
?>
<body>


<h1 class='py-5 text-center'>Bienvenido Super Admin</h1>

        <!--    formularios Albumes -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-12 px-5">
            <h3 class='pb-3'>Albumes actuales</h3>
            <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>imagen</th>
                        <th>precio</th>
                        <th>fecha</th>
                        <th>stockF</th>
                        <th>idEstado</th>
                        <th>idGenero</th>
                        <th>idArtista</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                 <tbody>
              <?php
                    $query = "SELECT * FROM albumes";
                    $result_users = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_users)){ ?>
                        <tr>
                           <td><?php echo $row['nombre'] ?></td>                 
                           <td><img src="<?php echo "../../../" . $row['imagen']?>" alt="noimage" height="100px"></td>
                           <td><?php echo $row['precio'] ?></td>                           
                           <td><?php echo $row['fecha'] ?></td> 
                           <td><?php echo $row['stockFisico'] ?></td> 
                           <td><?php echo $row['idEstado'] ?></td> 
                           <td><?php echo $row['idGenero'] ?></td> 
                           <td><?php echo $row['idArtista'] ?></td> 
                            <td>
                                <a href="formularios/editarAlbum.php?id=<?php echo $row['id']?>" class="btn btn-secondary" > <i class="fas fa-edit"></i> </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" > <i class="fas fa-user-times"></i> </a>                          
                                <a href="disable_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" > <i class="fas fa-user-times"></i> </a>                          
                            </td>
                        </tr> 
                    <?php } ?>          
                </tbody> 
            </table>
        </div>
		</div>
		<div class="col-md-12 px-5">
        <h2 class="pb-2" name="addalbum"> Anadir nuevo album</h2>
        <form action="agregaralbum.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre album" name="nombre" >
            <input type="text" class="form-control" placeholder="imagen" name="imagen" >
            <input type="text" class="form-control" placeholder="precio" name="precio" >
            <input type="text" class="form-control" placeholder="fecha" name="fecha" >
            <input type="text" class="form-control" placeholder="stockFisico" name="stockFisico" >
            <input type="text" class="form-control" placeholder="idEstado"  name="idEstado" >
            <input type="text" class="form-control" placeholder="idGenero" name="idGenero" >
            <input type="text" class="form-control" placeholder="idArtista" name="idArtista" >
        </div>
            <input type="submit" class="btn btn-success btn-block" name="save_album" value="Save Album"></input>
        </form>
		</div>
	</div>
</div>

<hr>

        <!-- formularios canciones -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-12 px-5">
            <h3 class='pb-3'>Canciones</h3>
                <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>idCancion</th>
                            <th>nombre</th>
                            <th>idArtista</th>
                            <th>idAlbum</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM canciones";
                        $result_users = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_users)){ ?>
                            <tr>
                            <td><?php echo $row['idCancion'] ?></td> 
                            <td><?php echo $row['nombre'] ?></td> 
                            <td><?php echo $row['idArtista'] ?></td> 
                            <td><?php echo $row['idAlbum'] ?></td>                             
                            <td>
                                <a href="formularios/editarAlbum.php?id=<?php echo $row['id']?>" class="btn btn-secondary" > <i class="fas fa-edit"></i> </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" > <i class="fas fa-user-times"></i> </a>                          
                                <a href="disable_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" > <i class="fas fa-user-times"></i> </a>                          
                            </td>                            
                            </tr> 
                        <?php } ?>                   
                    </tbody>
                </table>
            </div>
		</div>
		<div class="col-md-12 px-5">
        <h2 class="pb-2" name="addalbum"> Anadir Cancion nueva </h2>
        <form action="agregaralbum.php" method="POST"> 
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre Cancion" name="nombre" >
                    <input type="number" class="form-control" placeholder="idArtista" name="idArtista" >
                    <input type="number" class="form-control" placeholder="idAlbum" name="idAlbum" >
                </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_song" value="Save song"></input>
                </div>                
            </form>
		</div>
	</div>
</div>

        <!-- formularios generos -->
<hr>
 <div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-6 px-5">
            <h3 class='pb-3'>Generos Actuales</h3>
                <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>idGenero</th>
                            <th>Genero</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                        $query = "SELECT * FROM generos";
                        $result_users = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_users)){ ?>
                            <tr>
                            <td><?php echo $row['idGenero'] ?></td> 
                            <td><?php echo $row['genero'] ?></td> 
                            <td>
                                <a href="formularios/editarAlbum.php?id=<?php echo $row['id']?>" class="btn btn-secondary" > <i class="fas fa-edit"></i> </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" > <i class="fas fa-user-times"></i> </a>                          
                                <a href="disable_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" > <i class="fas fa-user-times"></i> </a>                          
                            </td>
                            </tr> 
                        <?php } ?>                   
                    </tbody>
                </table>
            </div>
		</div>
		<div class="col-md-6">
        <h3 class='pb-3'>Añadir nuevo genero</h3>
        <form method="POST" action="agregaralbum.php"> 
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre genero" name="genero">
                </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_genre" value="Save genre"></input>
                </div>                
            </form>
		</div>
	</div>
</div>
 <hr>

        

        <!-- zona de admins  -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-12 px-5">
            <h2 class="pb-2" name="addalbum"> Administradores actuales </h2>
            <div class="col-md-12 px-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>idUsuario</th>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>correo</th>
                        <th>idEstado</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                    $query = "SELECT * FROM usuarios WHERE idrol = '2'";
                    
                    $result_users = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_users)){ ?>
                        <tr>
                           <td><?php echo $row['idUsuario'] ?></td> 
                           <td><?php echo $row['nombre'] ?></td> 
                           <td><?php echo $row['apellido'] ?></td> 
                           <td><?php echo $row['correo'] ?></td> 
                           <td><?php echo $row['idEstado'] ?></td> 
                           <td>
                           <a href="delete.php?id=<?php echo $row['idUsuario']?>&tabla=usuarios"><i class="fas fa-trash-alt"></i> </a>             
                                
                            </td>
                        </tr> 
                    <?php } ?>                  
                </tbody>
            </table>
        </div>
		</div>
		<div class="col-md-12 px-5">
        <h2 class="pb-2" name="addalbum"> Anadir Administrador nuevo </h2>
        <form action="agregaralbum.php" method="POST">  <!-- defaul el rol debe ser 2 o 3 -->
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" >
                    <input type="text" class="form-control" name="apellido" placeholder="apellido" >
                    <input type="text" class="form-control" name="correo" placeholder="correo" >
                    <input type="password" class="form-control" name="contrasena" placeholder="contrasena" >
                    <input type="number" class="form-control" name="idEstado" placeholder="idEstado" >
                </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_admin" value="Save admin"></input>
                </div>                
            </form>
		</div>
	</div>
</div>
<hr>

<?php include("footer.php")?>
</body>

</html>