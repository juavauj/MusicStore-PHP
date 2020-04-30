<?php include("header.php")?>
<link rel="stylesheet" href="..styles/admin.css">
<body>


<h1 class='px-5 py-5'>Bienvenido Super Admin</h1>
 <!--    formularios Albumes -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-6 px-5">
            <h3 class='pb-3'>Albumes actuales</h3>
            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>imagen</th>
                        <th>precio</th>
                        <th>stockF</th>
                        <th>stockD</th>
                        <th>idEstado</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  <?php
                    $query = "SELECT * FROM users";
                    $result_users = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_users)){ ?>
                        <tr>
                           <td><?php echo $row['surname'] ?></td> 
                        </tr> 
                    <?php } ?>    -->                 
                </tbody>
            </table>
        </div>
		</div>
		<div class="col-md-6">
        <h2> Anadir nuevo album</h2>
        <form>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre album" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="imagen" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="precio" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="descripcion" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="fecha" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="stockFisico" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="idEstado" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="idGenero" aria-describedby="emailHelp">
            <input type="text" class="form-control" placeholder="idArtista" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
		</div>
	</div>
</div>

<hr>

<!-- formularios canciones -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-6 px-5">
            <h3 class='pb-3'>Canciones</h3>
                <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>idGenero</th>
                            <th>Genero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  <?php
                        $query = "SELECT * FROM users";
                        $result_users = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_users)){ ?>
                            <tr>
                            <td><?php echo $row['surname'] ?></td> 
                            </tr> 
                        <?php } ?>    -->                 
                    </tbody>
                </table>
            </div>
		</div>
		<div class="col-md-6">
        <form> Anadir nuevo genero
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre genero" aria-describedby="emailHelp">
                </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>                
            </form>
		</div>
	</div>
</div>
 <hr>

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
                        </tr>
                    </thead>
                    <tbody>
                        <!--  <?php
                        $query = "SELECT * FROM users";
                        $result_users = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_users)){ ?>
                            <tr>
                            <td><?php echo $row['surname'] ?></td> 
                            </tr> 
                        <?php } ?>    -->                 
                    </tbody>
                </table>
            </div>
		</div>
		<div class="col-md-6">
        <form> Anadir nuevo genero
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre genero" aria-describedby="emailHelp">
                </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>                
            </form>
		</div>
	</div>
</div>
 <hr>

        

        <!-- zona de admins  -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-6 px-5">
            <h3 class='pb-3'>Admins actuales</h3>
            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>correo</th>
                        <th>contrasena</th>
                        <th>idRol</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  <?php
                    $query = "SELECT * FROM users";
                    $result_users = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_users)){ ?>
                        <tr>
                           <td><?php echo $row['surname'] ?></td> 
                        </tr> 
                    <?php } ?>    -->                 
                </tbody>
            </table>
        </div>
		</div>
		<div class="col-md-6">
        <form> <h4>Crear un admin nuevo</h4> <!-- defaul el rol debe ser 2 o 3 -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="nombre" aria-describedby="emailHelp">
                    <input type="text" class="form-control" placeholder="apellido" aria-describedby="emailHelp">
                    <input type="text" class="form-control" placeholder="correo" aria-describedby="emailHelp">
                    <input type="text" class="form-control" placeholder="contrasena" aria-describedby="emailHelp">
                    <input type="text" class="form-control" placeholder="idRol" aria-describedby="emailHelp">
                </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>                
            </form>
		</div>
	</div>
</div>
<hr>

<?php include("footer.php")?>
</body>

</html>