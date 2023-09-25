<?php

    function agregarDeseo($id_user,$id_animal){

        include("../conectarBD.php");

        $consulta = 'INSERT INTO Deseos(id_user,id_animal) VALUES('.$id_user.','.$id_animal.');';
    
        $resultado = mysqli_query($conect,$consulta);
        echo($resultado);

    }

    $id_user = 1;
    $id_animal = 1;

    agregarDeseo($id_user,$id_animal);

?>