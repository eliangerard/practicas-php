<html>
    <head>
        <title>Arreglo</title>
    </head>
    <body>
        <h1>Arreglo</h1>
        <form action="practica5.php" method="POST">
            <label>Ingresa tu arreglo separando por ',' cada elemento:</label><br>
            <input type="text" name="array" value="<?php echo $_POST['array'] ?>">
            <input type="submit">
        </form>
        <table border="1">
            <?php
            if($_POST) {
                $arreglo = explode(",", $_POST["array"]);
                echo "<tr><td>#</td><td>Elemento</td></tr>";
                for($i=0; $i<count($arreglo); $i+=1) {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$arreglo[$i]."</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>