<?php

    function agregarUsuario($nombre,$apellidos,$edad,$telefono,$correo){

        include("conectarBD.php");

        $consulta1 = 'SELECT * FROM Usuarios Where nombre = "'.$nombre.'" AND telefono = '.$telefono.';';

        $result1 = mysqli_query($conect,$consulta1);

        if($result1 -> num_rows >0){
            //echo("<br>Este usuario ya existe");
        }
        else{
            $consulta = 'INSERT IGNORE INTO Usuarios(nombre,apellidos,edad,telefono,correo) VALUES("'.$nombre.'","'.$apellidos.'",'.$edad.','.$telefono.',"'.$correo.'");';

            $result = mysqli_query($conect,$consulta);
            //echo("<br>El usuario se ha creado correctamente".$result);
            print_r(1);
        }   
    }


    function eliminarUsuario($id_user){

        include("conectarBD.php");

        $nm = "";

        //Extraemos el nombre segun su id y lo guardamos en la variable declarada fuera
        $consulta1 = 'SELECT * FROM Usuarios WHERE id_user = '.$id_user.';';
        $result2 = mysqli_query($conect,$consulta1);

        //Si el resultado me debuelve flias es que hay un usuario con ese id sino else
        if($result2 -> num_rows > 0){

            while($lista = mysqli_fetch_assoc($result2)){
                extract($lista);
                $nm = $nombre;
            }
    
            //Hacemos la query para eliminar el usuario seún su id
            $consulta = 'DELETE FROM Usuarios WHERE id_user = '.$id_user.';';
    
            $result = mysqli_query($conect,$consulta);
            
            //echo("<br>El usuario ".$nm." se ha eliminado correctamente");
            print_r(1);
        }
        else{
            //echo("<br>Ya no existe ese usuario");
        }
    }



    function actualizarUsuario($id_user,$nombre,$apellidos,$edad,$telefono,$correo){
        include("conectarBD.php");

        $consulta = 'UPDATE Usuarios SET nombre = "'.$nombre.'",apellidos = "'.$apellidos.'",edad = '.$edad.',telefono = '.$telefono.',correo = "'.$correo.'" WHERE id_user = '.$id_user.';';

        $result = mysqli_query($conect,$consulta);

        if($result = 1){
            //echo("<br>Se ha actualizado correctamente");
            print_r(1);
        }
        else{
            //echo("<br>No se ha podido actualizar");
        }
    }


    function seleccionarUsuarios(){
        
        include("conectarBD.php");
        
        $consulta = 'SELECT * FROM Usuarios;';

        $result = mysqli_query($conect,$consulta);
        
        $data = array(); //Creamos un array fuera del bucle para que no se repitan los datos al entrar en el while

        while($lista = mysqli_fetch_assoc($result)){

            $data[] = $lista;       //Va añadiendo los usuarios 

            //$encrypted_data = base64_encode($json_data);

            /*extract($lista);

            echo($id_user."<br>");
            echo($nombre."<br>");
            echo($apellidos."<br>");
            echo($edad."<br>");
            echo($telefono."<br>");
            echo($correo."<br>");*/

        }

        $jsondata = json_encode($data);

            print_r($jsondata);
    }
?>