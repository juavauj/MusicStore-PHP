<?php include('../subpages/admins/header.php'); ?>
<?php
require(__DIR__.'/../../control/usuariosControl.php');
$idUsuario= $_GET['id'];//1; //$_GET['idAlbum'];  id obtenido desde SuperAdmin
$dataAdmin=listarAdmin($idUsuario); // funcion de AlbumesControl

?>


<body>
    
    <div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="../../control/usuariosControl.php?accion=editarAdmin">
                <label for="nombreIn">Nombre</label>
                    <div class="form-group">
                        
                        <input type="text" name="nombre" id="nombreIn" value="<?php echo $dataAdmin['nombre'];?>" >
                        <input type="hidden" name="idUsuario" value="<?php echo $dataAdmin['idUsuario'];?>">

                    </div>
                    <label for="apellidoIn">Apellido</label>
                    <div class="form-group">
                        
                        <input type="text" name="apellido" id="apellidoIn" value="<?php echo $dataAdmin['apellido'];?>" >

                    </div>
                    <label for="correoIn">Correo</label>
                    <div class="form-group">
                        
                        <input type="email" name="correo" id="correoIn" value="<?php echo $dataAdmin['correo'];?>" >

                    </div>

                    <label for="passwordIn">Contraseña</label>
                    <div class="form-group">
                        
                        <input type="password" name="contrasena" id="passwordIn" value="<?php echo $dataAdmin['contrasena'];?>" >
                        <i id="pass-status" class="fa fa-eye" aria-hidden="true" ></i>

                    </div>


                    <label for="estadoIn">Estado</label>
                    <div class="form-group">
                        
                        <div class="rad-btn-contenedor">

                            <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataAdmin['idEstado'];?>">


                         </div>

                    </div>
                    <label for="rolSelect">Rol</label>
                    <div class="form-group">
                        
                        <select name="rol" id="rolSelect">
                            <option value="<?php echo $dataAdmin['idRol'];?>"></option>

                        </select>
                    </div>
                
                    <button  type="submit" class="btn-success" name="update">
                        Editar
                    </button>
        
     
                </form>
            </div>
        </div>
    </div>
</div>









<?php include("../subpages/admins/footer.php")?>
    <script src="../subpages/scripts/editarAdmin.js"></script>
</body>