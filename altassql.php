<?php
    $mysqli = new mysqli('localhost', 'root', '', 'escuela'); 
    /*conección con la base de datos*/
    $mysqli->set_charset("utf8"); 
    /*codificación de los caracteres*/
    $query = $mysqli->query("INSERT INTO datos (id_Alumno, Nombres, Apellidos, Direccion, Telefono, EMail) VALUES (NULL, '".$_POST['nombres']."', '".$_POST['apellidos']."', '".$_POST['direccion']."', '".$_POST['telefono']."', '".$_POST['email']."');");
    /*codigo en sql para agegar datos a los campos de una tabla*/
    header("Location: lista.php");
    /*función para direccionar a otra página dentro de la misma carpeta*/
?>