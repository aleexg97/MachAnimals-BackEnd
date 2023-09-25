<?php
    //echo("HOLA ALEX");

    $servername = "localhost";
    $username = "root";
    $password = "";

    $databaseName = "alex";

    //Conectamos a la BD
    $conect = mysqli_connect($servername,$username,$password);

    //Creamos nueva BD
    $query0 = 'CREATE DATABASE IF NOT EXISTS '.$databaseName.';';
    $c0 = mysqli_query($conect,$query0);
    //echo("<br>Crear BD".$c0);

    //Usamos la BD que queremos utilizar
    $query1 = 'USE '.$databaseName.';';

        //Hacemos la consulta mysql
        $c1 = mysqli_query($conect,$query1);
        //echo("<br>USE".$c1);


    //Creamos tabla Usuarios
    $query2 = 'CREATE TABLE IF NOT EXISTS Usuarios (
        id_user int primary key auto_increment,
        nombre varchar(255),
        apellidos varchar(255),
        edad int,
        telefono int,
        correo varchar(255)
    );';

        //Hacemos la consulta mysql
        $c2 = mysqli_query($conect,$query2);
            //echo("<br>Crear tabla Usuarios".$c2."<br>");


        //Creamos usuario Admin
        //Para que no se cree un usuario admin cada vez que se actualiza esta página vamos a :

            //Seleccionar todo lo que haya en la tabla Usuarios
            $query3 = 'SELECT * FROM Usuarios WHERE nombre = "admin";';

            $c3 = mysqli_query($conect,$query3);

            //Si la query nos devuelve mas de una columna , significa que ya esta creado, sino creará el usuario administrador
            if($c3 -> num_rows > 0){
                //echo("results");
            }
            else{
                //echo("0 results");
                $query2_2 = 'INSERT INTO Usuarios(nombre,apellidos,edad,telefono,correo) VALUES("admin","sdasa",1,988796481,"admin@gmail.com");';
                        
                $c2_2 = mysqli_query($conect,$query2_2);
                    //echo($c2_2);
            }
    


    //creamos la tabla Centros
    $consulta1 = 'CREATE TABLE IF NOT EXISTS Centros(
        nombre_centro varchar(255) primary key,
        ubicacion varchar(255),
        telefono int,
        correo varchar(255)
    );';

    $result1 = mysqli_query($conect,$consulta1);
    //echo("<br>Crear tabla Centros".$result1."<br>");


    //Creamos tabla Animales
    $consulta2 = 'CREATE TABLE IF NOT EXISTS Animales(
        id_animal int primary key auto_increment,
        nombre varchar(255),
        raza varchar(255),
        tipo varchar(255),
        edad int,
        caracteristicas varchar(255),
        descripcion varchar(255),
        imagen varchar(255),
        nombre_centro varchar(255),
        FOREIGN KEY (nombre_centro) REFERENCES Centros(nombre_centro)
    );';

    $result2 = mysqli_query($conect,$consulta2);
    //echo("<br>Crear tabla Animales".$result2."<br>");


    //Creamos tabla de Deseos
    $consulta3 = 'CREATE TABLE IF NOT EXISTS Deseos(
        id_user int,
        id_animal int,
        FOREIGN KEY (id_user) REFERENCES Usuarios(id_user),
        FOREIGN KEY (id_animal) REFERENCES Animales(id_animal)
    );';
    
    $result3 = mysqli_query($conect,$consulta3);



?>