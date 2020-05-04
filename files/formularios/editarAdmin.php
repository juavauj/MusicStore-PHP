<?php include('../subpages/admins/header.php'); ?>
<?php
require(__DIR__.'/../../control/usuariosControl.php');
$idUsuario= $_GET['id'];//1; //$_GET['idAlbum'];  id obtenido desde SuperAdmin
$dataAdmin=listarAdmin($idUsuario); // funcion de AlbumesControl

?>


<body>
    
    <div class="container p-4">
    <div class="row">
        <div class="col-md-6  mx-auto">
            <div class="card card-body border border-info">
                <form method="POST" action="../../control/usuariosControl.php?accion=editarAdmin">
                    <div class="form-group">
                        <label for="nombreIn" class="text-info">Nombre</label>                                            
                        <input type="text" name="nombre" class="form-control" id="nombreIn" value="<?php echo htmlspecialchars($dataAdmin['nombre']);?>" >
                        <input type="hidden" name="idUsuario" value="<?php echo $dataAdmin['idUsuario'];?>">
                    </div>
                    <div class="form-group" >
                        <label for="apellidoIn" class="text-info">Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellidoIn" value="<?php echo htmlspecialchars($dataAdmin['apellido']);?>" >
                    </div>
                    <div class="form-group">
                        <label for="correoIn" class="text-info">Correo</label>
                        <input type="email" name="correo" id="correoIn"   class="form-control"value="<?php echo htmlspecialchars($dataAdmin['correo']);?>" >
                    </div>
                   
                    <label for="passwordIn" class="text-info"> Contraseña </label>
                    <div class="form-row col-md-12">
                            <div class="form-group col-md-11 ">                                
                                <input type="password" name="contrasena" class="form-control" id="passwordIn" value="<?php echo htmlspecialchars($dataAdmin['contrasena']);?>" >
                            </div>
                            <div class="form-group col md-1 mt-2">                                
                                <i id="pass-status" class="fa fa-eye" aria-hidden="true" ></i>
                            </div>                           
                    </div>

                    <div class="form-group ">
                            <label for="estadoIn" class="text-info">Estado</label>
                            <div class="rad-btn-contenedor">
                                <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataAdmin['idEstado'];?>">
                            </div>
                        </div>  
                        
                    <div class="form-row">   
                    <label for="rolSelect" class="col-md-6 text-info mt-1">Selecciona el Rol</label>                          
                        <div class="form-group col md-12">                            
                            <select name="rol" class="col-md-12 btn btn-secondary dropdown-toggle" id="rolSelect">
                                <option value="<?php echo $dataAdmin['idRol'];?>"></option>
                            </select>
                        </div>
                    </div>  

                    <button  type="submit" class="btn btn-info btn-block" name="update">
                        Guardar cambios
                    </button>       
     
                   </form>
                </div>               
            </div>
        </div>
    </div>
</div>









<?php include("../subpages/admins/footer.php")?>
    <script src="../subpages/scripts/editarAdmin.js"></script>
</body>