 <?php include("../subpages/header.html")?> 

<?php
require(__DIR__.'/../../control/albumesControl.php');
$idAlbum= $_GET['id'];//1; //$_GET['idAlbum'];  id obtenido desde SuperAdmin
    $dataAlbum=listarAlbum($idAlbum); // funcion de AlbumesControl

?>


<body>
    

    <div class="editar-album">

        <form action="" method="post">

        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombreIn" value="<?php echo $dataAlbum['nombre'];?>">

        <div class="img-album-edit-contenedor">
        <picture></picture>
        <label for="">Imagen</label>
        <input type="text" name="" id="">
        </div>
        

        <label for="">Precio</label>
        <input type="number" step="any" name="" id="" value="<?php echo $dataAlbum['precio'];?>">

        <label for="">Descripcion</label>
        <textarea name="descripcion" id="" ><?php echo $dataAlbum['descripcion'];?></textarea>

        <label for="">Fecha</label>
        <input type="date" name="" id="" value="<?php echo $dataAlbum['fecha'];?>">

        <label for="">Stock Fisico</label>
        <input type="number" name="" id="" value="<?php echo $dataAlbum['stockFisico'];?>">

        <label for="">Estado</label>
        <div class="rad-btn-contenedor">

        <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataAlbum['idEstado'];?>">


        </div>

        <label for="generoSelect">Genero</label>
        <select name="genero" id="generoSelect">
            <option value="<?php echo $dataAlbum['idGenero'];?>"></option>

        </select>
        
        <input type="submit" value="Editar">
        
        
        </form>

        
    
    
    </div>

    


    <script src="../subpages/scripts/editarAlbum.js"></script>
</body>
</html>