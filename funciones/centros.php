<?php

    function agregarCentro($nombre_centro,$ubicacion,$telefono,$correo){

        include("conectarBD.php");

        $consulta1 = 'SELECT * FROM Centros Where nombre_centro = "'.$nombre_centro.'" AND telefono = '.$telefono.' AND correo = "'.$correo.'";';

        $result1 = mysqli_query($conect,$consulta1);

        if($result1 -> num_rows >0){
            //echo("<br>Este centro ya existe");
        }
        else{
            $consulta = 'INSERT INTO Centros(nombre_centro,ubicacion,telefono,correo) VALUES("'.$nombre_centro.'","'.$ubicacion.'",'.$telefono.',"'.$correo.'");';

            $result = mysqli_query($conect,$consulta);
            if($result = 1){
                //echo("El centro se ha creado correctamente");
                print_r(1);
            }
            else{
                //echo("MAL");
            }
            //echo("<br>El animal se ha creado correctamente".$result);
        }   
    }


    function eliminarCentro($nombre_centro){

        include("conectarBD.php");

        $nm = "";

        //Extraemos el nombre segun su id y lo guardamos en la variable declarada fuera
        $consulta1 = 'SELECT * FROM Centros WHERE nombre_centro = "'.$nombre_centro.'";';
        $result2 = mysqli_query($conect,$consulta1);

        //Si el resultado me debuelve flias es que hay un usuario con ese id sino else
        if($result2 -> num_rows > 0){

            while($lista = mysqli_fetch_assoc($result2)){
                extract($lista);
                $nm = $nombre_centro;
            }
    
            //Hacemos la query para eliminar el usuario seún su id
            $consulta = 'DELETE FROM Centros WHERE nombre_centro = "'.$nombre_centro.'";';
    
            $result = mysqli_query($conect,$consulta);
            
            //echo("<br>El centro ".$nm." se ha eliminado correctamente");
            print_r(1);
        }
        else{
            //echo("<br>Ya no existe ese centro");
        }
    }



    function actualizarCentro($nombre_centro,$ubicacion,$telefono,$correo){
        include("conectarBD.php");

        $consulta = 'UPDATE Centros SET nombre_centro = "'.$nombre_centro.'",ubicacion = "'.$ubicacion.'",telefono = '.$telefono.' WHERE nombre_centro = "'.$nombre_centro.'";';

        $result = mysqli_query($conect,$consulta);

        if($result = 1){
            //echo("<br>Se ha actualizado correctamente");
            print_r(1);
        }
        else{
            //echo("<br>No se ha podido actualizar");
        }
    }


    function seleccionarCentros(){
        
        include("conectarBD.php");
        
        $consulta = 'SELECT * FROM Centros;';

        $result = mysqli_query($conect,$consulta);

        $data = array();
        
        while($lista = mysqli_fetch_assoc($result)){

            $data[] = $lista;

            //extract($lista);

            //echo($nombre_centro."<br>");
            //echo($ubicacion."<br>");
            //echo($telefono."<br>");
            //echo($correo."<br>");

        }

        $jsondata = json_encode($data);

            print_r($jsondata);
    }
?>