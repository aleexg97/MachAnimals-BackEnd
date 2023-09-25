<?php

    //echo("Bienvenido");

    //USUARIOS

    //Importamos el php donde estan las funciones de los usuarios
    include("funciones/usuarios.php");

    //Recogeríamos la información que nos llega por POST
    //A parte de la información que ha introducido el usuario , según que botón le hayas dado será eliminar , agregar , etc...
    
    $variable = "";


    switch ($variable) {
        case 'agregarUsuario':
            //Función para agregar un usuario
            agregarUsuario("Alex","Garcia Guerrero",25,977263745,"alex@gmail.com");
            break;
        
        case 'eliminarUsuario' :
            eliminarUsuario(18);
            break;
        
        case 'actualizarUsuario' :
            actualizarUsuario(19,"Pepe","Almeida Jofris",30,822615276,"pepe@gmail.com");
            break;

        case 'seleccionarUsuario' :
            seleccionarUsuarios();
                break;
        default:

            break;
    }

    //CENTROS

    include("funciones/centros.php");

    $variable2 = "";
    
    switch ($variable2) {
        case 'agregarCentro':
            agregarCentro("Protectora","C/Avenida 13",46557887,"protec@gmail.com");
            break;
        
        case 'eliminarCentro' :
            eliminarCentro("rescatD'animals");
            break;
        
        case 'actualizarCentro' :
            actualizarCentro("ProtectoraCanina","C/SAnt Felip 76",922781984,"protec@gmail.com");
            break;

        case 'seleccionarCentros' :
            seleccionarCentros();
                break;
        default:

            break;
    }


    //Animales

    include("funciones/animales.php");

    //Creamos una variable ruta donde guardaremos la ruta de la imagen
    $ruta = "";

    //Si recibimos lo que hemos mandadno en el sumbit del formulario llamado enviar entrara en el if [TODO BIENE DE html.php]
    if(isset($_REQUEST['enviar'])){

        include("conectarBD.php");

        //Guardamos el campo de la foto y nombre del formulario
        $nombre_imagen = $_FILES['foto']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        
        //Indicamos la carpeta donde queremos que se guarden las IMG'S
        $carpeta = 'img';

        //Indicamos la ruta completa (la carpeta + / + el nombre de la imagen)
        $ruta = $carpeta.'/'.$nombre_imagen;

        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
    }

    $variable2 = "seleccionarAnimales";
    
    switch ($variable2) {
        case 'agregarAnimal':
            agregarAnimal("KIRA","scotex","Perro",10,"amable,gruñon,casero","es un perro que nos lo encontramos en la calle hace 1 semana",$ruta,"Protectora");
            break;
        
        case 'eliminarAnimal' :
            eliminarAnimal(40);
            break;
        
        case 'actualizarAnimal' :
            actualizarAnimal(41,"Firulais","pastor aleman","Perro",12,"amable,gruñon,casero","es un perro que nos lo encontramos en la calle hace 1 semana","Protectora");
            break;

        case 'seleccionarAnimales' :
            seleccionarAnimales();
                break;
        default:

            break;
    }

?>
