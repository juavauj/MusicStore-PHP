<?php include('../subpages/admins/header.php'); ?>

<?php
require(__DIR__.'/../../control/albumesControl.php');
$idAlbum= $_GET['id'];//1; //$_GET['idAlbum'];  id obtenido desde SuperAdmin
    $dataAlbum=listarAlbum($idAlbum); // funcion de AlbumesControl

?>


<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="../../control/albumesControl.php?accion=editarAlbum" enctype="multipart/form-data">
                    <input type="hidden" name="idAlbum" value="<?php echo $dataAlbum['idAlbum'];?>">
                    <label for="nombreIn">Nombre</label>
                    <div class="form-group">                        
                        <input type="text" name="nombre" id="nombreIn" value="<?php echo htmlspecialchars($dataAlbum['nombre']);?>">          
                        
                    </div>
                    <label for="imagenIn">Imagen</label>
                    <div class="form-group">
                                                                        
                        <input type="file" class="form-control-file" name="imagen" id="imagenIn">         
                        <input type="hidden" name="imagen" value="<?php echo $dataAlbum['imagen'];?>">
                    </div>
                    <label for="precioIn">Precio</label>
                    <div class="form-group">
                        
                         <input type="number" step="any" name="precio" id="precioIn" value="<?php echo $dataAlbum['precio'];?>">
                    </div>
                    <label for="descripcionIn">Descripcion</label>
                    <div class="form-group">
                        
                        <textarea name="descripcion" id="descripcionIn" rows="4" cols="40" ><?php echo htmlspecialchars($dataAlbum['descripcion']);?></textarea>
                    </div>
                    <label for="fechaIn">Fecha</label>
                    <div class="form-group">
                        
                        <input type="date" name="fecha" id="fechaIn" value="<?php echo $dataAlbum['fecha'];?>">

                    </div>
                    <label for="stockIn">Stock Fisico</label>
                    <div class="form-group">
                        
                        <input type="number" name="stock" id="stockIn" value="<?php echo $dataAlbum['stockFisico'];?>">

                    </div>
                    <label for="estadoIn">Estado</label>
                    <div class="form-group">
                        
                        <div class="rad-btn-contenedor">

                            <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataAlbum['idEstado'];?>">


                         </div>

                    </div>
                    <label for="generoSelect">Genero</label>
                    <div class="form-group">
                        
                        <select name="genero" id="generoSelect">
                            <option value="<?php echo $dataAlbum['idGenero'];?>"></option>

                        </select>
                    </div>


                    <label for="artistaSelect">Artista</label>
                    <div class="form-group">
                        
                        <select name="artista" id="artistaSelect">
                            <option value="<?php echo $dataAlbum['idArtista'];?>"></option>

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
    <script src="../subpages/scripts/editarAlbum.js"></script>
</body>
</html>