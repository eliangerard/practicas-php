<html>
    <head>
        <title>Condicion IF</title>
    </head>
    <body>
        <h1>Condicional IF</h1>
        <form action="practica3.php" method="POST">
            <input type="text" name="a">
            <input type="text" name="b">
            <input type="submit" value="evaluar">
        </form>
        <?php
            if($_POST){
                $a = $_POST['a'];
                $b = $_POST['b'];
                echo "Valor de a: ".$a." y el valor de b: ".$b."<br>";
                if($a<$b) {
                    echo "a es menor que b";
                }
                else {
                    echo "a no es menor que b";
                }
            }
        ?>
    </body>
</html>