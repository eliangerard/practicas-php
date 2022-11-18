<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de dos números en PHP</title>
</head>
<body>
    <h2>Suma de dos números en PHP</h2>
    <?php
        $num1 = "";
        $num2 = "";
        if($_POST) {
            $num1 = $_POST['numero1'];
            $num2 = $_POST['numero2'];
        }
    ?>
    <form action="sumar.php" method="POST">
        <input type="number" name="numero1" value="<?php echo $num1; ?>">
        <input type="number" name="numero2" value="<?php echo $num2; ?>">
        <input type="submit" value="sumar">
    </form>
    <?php
        if($_POST) {
            $res = $num1 + $num2;
            echo "El resultado de la suma ".$num1." y de ".$num2." es: ".$res;
        }
    ?>
</body>
</html>