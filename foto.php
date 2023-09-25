<?php
    include("conectarBD.php");

    if(isset($_REQUEST['enviar'])){

        $nombre_imagen = $_FILES['foto']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        
        $carpeta = 'img';

        $ruta = $carpeta.'/'.$nombre_imagen;

        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

        $query = 'INSERT INTO Imagen (ruta) VALUES ("'.$ruta.'") ;';

        $resultado = mysqli_query($conect,$query);


    }
    
/*
TUTORIAL SUbIR IMAGEN Este html iría en otro archivo php 

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HOLA</h1>
    <form action="foto.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="foto" id="foto">
        <button type="submit" id="enviar" name="enviar">ENVIAR</button>

    </form>
</body>
</html>

*/
?>