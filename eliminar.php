<?php
    $id = $_GET['id'];
    $mysqli = new mysqli('localhost', 'root', '', 'escuela');
    $mysqli->set_charset("utf8");
    $query = $mysqli->query("DELETE FROM datos WHERE id_Alumno='".$id."'");
    header("location: bajas.php");
?>