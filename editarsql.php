<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'escuela');
    $mysqli->set_charset("utf8");
    $query = $mysqli->query("UPDATE datos SET Nombres='".$_POST['nombres'].
        "', Apellidos='".$_POST['apellidos'].
        "', Direccion='".$_POST['direccion'].
        "', Telefono='".$_POST['telefono'].
        "', EMail='".$_POST['email'].
        "' WHERE id_Alumno = '".$_POST['idalumno']."'"
    );
?>