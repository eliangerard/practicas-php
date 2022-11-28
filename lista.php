<html>
<head>
    <title>BDD PW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <header><h1>Bases de Datos</h1></header>
        <div id="paginas">
            <a href="lista.php">Lista</a>
            <a href="altas.php">Altas</a>
            <a href="bajas.php">Bajas</a>
            <a href="cambios.php">Cambios</a>
        </div>
    </nav>
    <div id="content">
    <hr>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>E-Mail</th>
            </tr>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'escuela');
                $mysqli->set_charset("utf8");
                $query = $mysqli->query("SELECT * FROM datos");
                while($dat = $query->fetch_object()){
                    echo "<tr><td class='idAlumno'>".$dat->id_Alumno."</td>
                        <td>".$dat->Nombres."</td>
                        <td>".$dat->Apellidos."</td>
                        <td>".$dat->Direccion."</td>
                        <td>".$dat->Telefono."</td>
                        <td>".$dat->EMail."</td>
                    </tr>";
                }
            ?>
        </table>
    </section>
    </div>
</body>
</html>