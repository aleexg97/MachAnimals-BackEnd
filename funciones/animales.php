<?php

    function agregarAnimal($nombre,$raza,$tipo,$edad,$caracteristicas,$descripcion,$imagen,$nombre_centro){

        include("conectarBD.php");

        $consulta1 = 'SELECT * FROM Animales Where nombre = "'.$nombre.'" AND raza = "'.$raza.'" AND edad = '.$edad.';';

        $result1 = mysqli_query($conect,$consulta1);

        if($result1 -> num_rows >0){
            //echo("<br>Este animal ya existe");
        }
        else{
            $consulta = 'INSERT INTO Animales(nombre,raza,tipo,edad,caracteristicas,descripcion,imagen,nombre_centro) VALUES("'.$nombre.'","'.$raza.'","'.$tipo.'",'.$edad.',"'.$caracteristicas.'","'.$descripcion.'","'.$imagen.'","'.$nombre_centro.'");';

            $result = mysqli_query($conect,$consulta);
            if($result = 1){
                //echo("El animal se ha creado correctamente");
                print_r(1);
            }
            else{
                //echo("MAL");
            }
            //echo("<br>El animal se ha creado correctamente".$result);
        }   
    }



    function eliminarAnimal($id_animal){

        include("conectarBD.php");

        $nm = "";
        $tipo = "";

        //Extraemos el nombre segun su id y lo guardamos en la variable declarada fuera
        $consulta1 = 'SELECT * FROM Animales WHERE id_animal = '.$id_animal.';';
        $result2 = mysqli_query($conect,$consulta1);

        //Si el resultado me debuelve flias es que hay un usuario con ese id sino else
        if($result2 -> num_rows > 0){

            while($lista = mysqli_fetch_assoc($result2)){
                extract($lista);
                $nm = $nombre;
                $tipo = $tipo;
            }
    
            //Hacemos la query para eliminar el usuario seún su id
            $consulta = 'DELETE FROM Animales WHERE id_animal = '.$id_animal.';';
    
            $result = mysqli_query($conect,$consulta);
            
            //echo("<br>El ".$tipo." ".$nm." se ha eliminado correctamente");
            print_r(1);
        }
        else{
            //echo("<br>Ya no existe este animal");
        }
    }



    function actualizarAnimal($id_animal,$nombre,$raza,$tipo,$edad,$caracteristicas,$descripcion,$nombre_centro){
        include("conectarBD.php");

        $consulta = 'UPDATE Animales SET nombre = "'.$nombre.'",raza = "'.$raza.'",tipo = "'.$tipo.'",edad = '.$edad.',caracteristicas = "'.$caracteristicas.'", descripcion = "'.$descripcion.'",nombre_centro = "'.$nombre_centro.'" WHERE id_animal = '.$id_animal.';';

        $result = mysqli_query($conect,$consulta);

        if($result = 1){
            //echo("<br>Se ha actualizado correctamente");
            print_r(1);
        }
        else{
            //echo("<br>No se ha podido actualizar");
        }
    }


    function seleccionarAnimales(){
        
        include("conectarBD.php");
        
        $consulta = 'SELECT * FROM Animales;';

        $result = mysqli_query($conect,$consulta);

        $data = array();
        
        while($lista = mysqli_fetch_assoc($result)){

            $data[] = $lista;

            /*extract($lista);

            echo($id_animal."<br>");
            echo($nombre."<br>");
            echo($raza."<br>");
            echo($tipo."<br>");
            echo($edad."<br>");
            echo($caracteristicas."<br>");
            echo($descripcion."<br>");
            echo($nombre_centro."<br>");*/
        }

        $datajson = json_encode($data);

            print_r($datajson);
    }
?>