<?php
    if($_POST){
        $num1 = $_POST['numero1'];
        $num2 = $_POST['numero2'];
        $suma = $num1 + $num2;
        echo "La suma de ".$num1." y ".$num2." es ".$suma;
    }
?>