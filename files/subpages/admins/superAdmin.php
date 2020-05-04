<?php include("header.php")?>
<!-- <?php include("db.php")?> -->

<?php
/* if (isset($conn)){
    echo "DB is connected";
} */
?>
<body>
<h1 class='py-4 text-center'>Bienvenido Super Admin</h1>
<!-- zona de albumes  -->
<h3 class='px-5'>ALBUMES  <button type="button" class="btn btn-info" onclick="showAlbum()"><i class="fas fa-record-vinyl" style="font-size: 1.7em"></i></button> </h3>
<div class="container-fluid py-5" id="albumes" style="display:none">
	<div class="row">
		<div class="col-md-12">           
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>ALBUM</th>
                                <th>CARATULA</th>
                                <th>PRECIO</th>
                                <th>LANZAMIENTO</th>
                                <th>STOCK</th>
                                <th>ESTADO</th>
                                <th>GENERO</th>
                                <th>ARTISTA</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                            $query = "SELECT albumes.idAlbum, albumes.nombre,  albumes.imagen, albumes.precio, albumes.fecha, albumes.stockFisico, estados.estado, generos.genero, artistas.nombre as artista
                            FROM (((albumes
                            INNER JOIN estados ON albumes.idEstado = estados.idEstado)
                            INNER JOIN generos ON albumes.idGenero = generos.idGenero)
                            INNER JOIN artistas ON albumes.idArtista = artistas.idArtista) order by albumes.idAlbum;";
                            $result_users = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_users)){ ?>
                                <tr>
                                <td><?php echo $row['idAlbum'] ?></td>                 
                                <td><?php echo $row['nombre'] ?></td>                 
                                <td><img src="<?php echo "../../../" . $row['imagen']?>" alt="noimage" height="80px"></td>
                                <td><?php echo $row['precio'] ?></td>                                                                             
                                <td><?php echo $row['fecha'] ?></td> 
                                <td><?php echo $row['stockFisico'] ?></td> 
                                <td><?php echo $row['estado'] ?></td> 
                                <td><?php echo $row['genero'] ?></td> 
                                <td><?php echo $row['artista'] ?></td> 
                                    <td>
                                        <a href="delete.php?id4=<?php echo $row['idAlbum']?>&tabla4=albumes" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a> 
                                        <a href="disable.php?id4=<?php echo $row['idAlbum']?>&tabla4=albumes&estado=<?php echo $row['estado'] ?>" class="btn btn-warning"><i class="fas fa-microphone-slash"></i></a>                          
                                        <a href="../../formularios/editarAlbum.php?id=<?php echo $row['idAlbum']?>" class="btn btn-dark"><i class="fas fa-edit"></i> </a> 
                                    </td>
                                </tr> 
                            <?php } ?>          
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
        
		<div class="col-md-12 px-5">
        <h2 class="pb-2" name="addalbum"> Anadir nuevo album</h2>

        <form action="agregaralbum.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="inputEmail4">Nombre del Album</label>
                <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group col-md-4">
                <label for="inputPassword4">Caratula</label>
                <input type="file" class="form-control-file" name="imagen"/>
            <!-- opcional por si no funciona el de arriba   <input type="text" class="form-control" placeholder="imagen" name="imagen" > -->
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputAddress">Leyenda</label>
                    <input type="text" class="form-control"  name="descripcion">
                </div>
                <div class="form-group col md-4">
                    <label for="inputAddress2">Precio</label>
                    <input type="number" class="form-control"  name="precio">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputCity">Lanzamiento</label>
                <input type="text" class="form-control" placeholder="Año-Mes-Dia" name="fecha">
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">Stock</label>
                <input type="number" class="form-control"  name="stockFisico">
                </div>
                <div class="form-group col-md-4">
                <label for="inputZip">Estado</label>
                <input type="number" class="form-control" placeholder="1 habilitar 2 desabilitar" name="idEstado">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Genero</label>
                    <input type="number" class="form-control"  name="idGenero" placeholder="Ref de # en Generos">
                </div>
                <div class="form-group col md-6">
                    <label for="inputAddress2">Artista(s)</label>
                    <input type="number" class="form-control"  name="idArtista" placeholder="Ref de # en Artistas">
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_album" value="Crear album nuevo"></input>
            </form>                    
		</div>
	</div>
</div>
<hr>
<!-- zona de artistas  -->
<h3 class='px-5'> ARTISTAS <button type="button" class="btn btn-info" onclick="showArtista()"><i class="fas fa-vr-cardboard" style="font-size: 1.7em"></i></button> </h3>
<div>
    <div class="container-fluid py-5" id="artistas" style="display:none">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>ARTISTA</th>
                                    <th>FOTO</th>
                                    <th>ESTADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT artistas.idArtista, artistas.nombre, artistas.imagen, estados.estado 
                                FROM artistas 
                                INNER JOIN estados ON artistas.idEstado = estados.idEstado order by artistas.idArtista";
                                $result_users = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result_users)){ ?>
                                    <tr>
                                    <td><?php echo $row['idArtista'] ?></td> 
                                    <td><?php echo $row['nombre'] ?></td> 
                                    <td><img src="<?php echo "../../../" . $row['imagen']?>" alt="noimage" height="80px"></td> 
                                    <td><?php echo $row['estado'] ?></td> 
                                    <td>
                                        <a href="delete.php?id5=<?php echo $row['idArtista']?>&tabla5=artistas" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>  
                                        <a href="disable.php?id5=<?php echo $row['idArtista']?>&tabla5=artistas&estado=<?php echo $row['estado'] ?>" class="btn btn-warning"><i class="fas fa-microphone-slash"></i></a>  
                                        <a href="../../formularios/editarArtista.php?id=<?php echo $row['idArtista']?>" class="btn btn-dark"><i class="fas fa-edit"></i> </a> 
                                    </td>
                                    </tr> 
                                <?php } ?>                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class='pb-3'>Añadir nuevo artista</h3>
                <form method="POST" action="agregaralbum.php" enctype="multipart/form-data"> 
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress"> Nombre </label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group col md-12">
                                <label for="inputAddress2">Estado</label>
                                <input type="number" class="form-control"  name="idEstado" placeholder="1 habilitado 2 desabilitado">
                            </div>
                            <div class="form-group col md-12">
                                <label for="inputAddress2">Foto</label>
                                <input type="file" class="form-control-file" name="imagen">
                            </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_artist" value="Crear Artista nuevo"></input>                                  
                </form>
            </div>
        </div>
	</div>
</div>
<hr>
<!-- zona de Canciones  -->
<h3 class='px-5'> CANCIONES <button type="button" class="btn btn-info" onclick="showCancion()"><i class="fas fa-guitar" style="font-size: 1.7em"></i></button> </h3>
        <!-- formularios canciones -->
<div class="container-fluid py-5" id="canciones" style="display:none">
	<div class="row">
		<div class="col-md-12">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>CANCION</th>
                                <th>ARTISTA</th>
                                <th>ALBUM</th>
                                <th>ESTADO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT canciones.idCancion, canciones.nombre,  artistas.nombre as artista, albumes.nombre as album, estados.estado
                            FROM (((canciones
                            INNER JOIN artistas ON canciones.idArtista = artistas.idArtista)
                            INNER JOIN albumes ON canciones.idAlbum = albumes.idAlbum)
                            INNER JOIN estados ON canciones.idEstado = estados.idEstado) order by canciones.idCancion";
                            $result_users = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_users)){ ?>
                                <tr>
                                    <td><?php echo $row['idCancion'] ?></td> 
                                    <td><?php echo $row['nombre'] ?></td> 
                                    <td><?php echo $row['artista'] ?></td> 
                                    <td><?php echo $row['album'] ?></td>                             
                                    <td><?php echo $row['estado'] ?></td>                             
                                    <td>
                                        <a href="delete.php?id3=<?php echo $row['idCancion']?>&tabla3=canciones" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a> 
                                        <a href="disable.php?id3=<?php echo $row['idCancion']?>&tabla3=canciones&estado=<?php echo $row['estado'] ?>" class="btn btn-warning"><i class="fas fa-microphone-slash"></i></a>  
                                        <a href="../../formularios/editarCancion.php?id=<?php echo $row['idCancion']?>" class="btn btn-dark"><i class="fas fa-edit"></i> </a> 
                                    </td>                            
                                </tr> 
                            <?php } ?>                   
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
            <div class="col-md-12 px-5">
                <h2 class="pb-2" name="addalbum"> Anadir Cancion nueva </h2>
                <form action="agregaralbum.php" method="POST"> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Cancion</label>
                            <input type="text" class="form-control"  name="nombre">
                        </div>
                        <div class="form-group col md-6">
                            <label for="inputAddress2">Artista</label>
                            <input type="number" class="form-control"  name="idArtista" placeholder="#referencia de Artistas">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Album</label>
                            <input type="number" class="form-control"  name="idAlbum" placeholder="#referencia de Albumes">
                        </div>
                        <div class="form-group col md-6">
                            <label for="inputAddress2">Estado</label>
                            <input type="number" class="form-control"  name="idEstado" placeholder="1 habilitado 2 desabilitado">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_song" value="Crear Cancion nueva"></input>
                </form>
            </div>                  
		</div>
	</div>
        <!-- formularios generos -->
<hr>
<!-- zona de generos  -->
<h3 class='px-5'> GENEROS <button type="button" class="btn btn-info" onclick="showGenero()"><i class="fas fa-photo-video" style="font-size: 1.7em"></i></button> </h3>
<div>
    <div class="container-fluid py-5" id="generos" style="display: none">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>GENERO</th>
                                    <th>ESTADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT generos.idGenero, generos.genero, estados.estado
                                FROM generos
                                INNER JOIN estados ON generos.idEstado = estados.idEstado order by generos.idGenero";
                                $result_users = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result_users)){ ?>
                                    <tr>
                                    <td><?php echo $row['idGenero'] ?></td> 
                                    <td><?php echo $row['genero'] ?></td> 
                                    <td><?php echo $row['estado'] ?></td> 
                                    <td>
                                        <a href="delete.php?id2=<?php echo $row['idGenero']?>&tabla2=generos" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>  
                                        <a href="disable.php?id2=<?php echo $row['idGenero']?>&tabla2=generos&estado=<?php echo $row['estado'] ?>" class="btn btn-warning"><i class="fas fa-microphone-slash"></i></a>  
                                        <a href="../../formularios/editarGenero.php?id=<?php echo $row['idGenero']?>" class="btn btn-dark"><i class="fas fa-edit"></i> </a> 
                                    </td>
                                    </tr> 
                                <?php } ?>                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class='pb-3'>Añadir nuevo genero</h3>
                <form method="POST" action="agregaralbum.php"> 
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress"> Genero </label>
                                <input type="text" class="form-control" name="genero">
                            </div>
                            <div class="form-group col md-12">
                                <label for="inputAddress2">Estado</label>
                                <input type="number" class="form-control"  name="idEstado" placeholder="1 habilitado 2 desabilitado">
                            </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_genre" value="Crear Genero nuevo"></input>                                  
                </form>
            </div>
        </div>
	</div>
</div>
 <hr>
  <!-- zona de admins  -->
 <h3 class='px-5'> ADMINS <button type="button" class="btn btn-info" onclick="showAdmin()"><i class="fas fa-user-shield" style="font-size: 1.7em"></i></button> </h3>      
<div class="container-fluid py-5" id="admins" style="display: none">
	<div class="row">
		<div class="col-md-12">
            <h2 class="pb-2"> Administradores actuales </h2>
            <div class="col-md-12 px-5">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>EMAIL</th>
                                <th>ESTADO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT usuarios.idUsuario, usuarios.nombre, usuarios.apellido, usuarios.correo, estados.estado 
                            FROM usuarios 
                            INNER JOIN estados ON usuarios.idEstado = estados.idEstado WHERE idrol = '2' order by usuarios.idUsuario";
                            
                            $result_users = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_users)){ ?>
                                <tr>
                                    <td><?php echo $row['idUsuario'] ?></td> 
                                    <td><?php echo $row['nombre'] ?></td> 
                                    <td><?php echo $row['apellido'] ?></td> 
                                    <td><?php echo $row['correo'] ?></td> 
                                    <td><?php echo $row['estado'] ?></td> 
                                    <td>
                                        <a href="delete.php?id=<?php echo $row['idUsuario']?>&tabla=usuarios" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>             
                                        <a href="disable.php?id=<?php echo $row['idUsuario']?>&tabla=usuarios&estado=<?php echo $row['estado'] ?>" class="btn btn-warning"><i class="fas fa-microphone-slash"></i></a>             
                                        <a href="../../formularios/editarAdmin.php?id=<?php echo $row['idUsuario']?>" class="btn btn-dark"><i class="fas fa-user-edit"></i> </a>                       
                                    </td>
                                </tr> 
                            <?php } ?>                  
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
		<div class="col-md-12 px-5">
            <h2 class="pb-2" name="addalbum"> Anadir Administrador nuevo </h2>
            <form action="agregaralbum.php" method="POST">  <!-- defaul el rol debe ser 2 o 3 -->
                <div class="form-group">
                    <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputAddress"> Nombre </label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group col md-4">
                                <label for="inputAddress2">Apellido</label>
                                <input type="text" class="form-control"  name="apellido">
                            </div>
                            <div class="form-group col md-4">
                                <label for="inputAddress2">Estado</label>
                                <input type="number" class="form-control"  name="idEstado" placeholder="1 habilitado 2 desabilitado">
                            </div>
                    </div>  
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress"> Correo electronico </label>
                                <input type="text" class="form-control" name="correo">
                            </div>
                            <div class="form-group col md-6">
                                <label for="inputAddress2">Contraseña</label>
                                <input type="password" class="form-control"  name="contrasena">
                            </div>                           
                    </div>                              
                </div>
            <input type="submit" class="btn btn-success btn-block" name="save_admin" value="Crear Administrador nuevo"></input>                               
            </form>
        </div> 
    </div>
</div>
<hr>
<?php include("footer.php")?>
</body>
</html>