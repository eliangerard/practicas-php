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
                <th></th>
            </tr>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'escuela');
                $mysqli->set_charset("utf8");
                $query = $mysqli->query("SELECT * FROM datos");
                while($dat = $query->fetch_object()){
                    echo '<tr><td class="idAlumno">'.$dat->id_Alumno.'</td>
                        <td>'.$dat->Nombres.'</td>
                        <td>'.$dat->Apellidos.'</td>
                        <td>'.$dat->Direccion.'</td>
                        <td>'.$dat->Telefono.'</td>
                        <td>'.$dat->EMail.'</td>
                        <td><svg class="tableIcon" onclick="eliminar('.$dat->id_Alumno.')" id= data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>cross-symbol</title><path class="cls-1" d="M61.44,0A61.44,61.44,0,1,1,0,61.44,61.44,61.44,0,0,1,61.44,0ZM74.58,36.8c1.74-1.77,2.83-3.18,5-1l7,7.13c2.29,2.26,2.17,3.58,0,5.69L73.33,61.83,86.08,74.58c1.77,1.74,3.18,2.83,1,5l-7.13,7c-2.26,2.29-3.58,2.17-5.68,0L61.44,73.72,48.63,86.53c-2.1,2.15-3.42,2.27-5.68,0l-7.13-7c-2.2-2.15-.79-3.24,1-5L49.55,61.83,36.35,48.64c-2.15-2.11-2.27-3.43,0-5.69l7-7.13c2.15-2.2,3.24-.79,5,1L61.44,49.94,74.58,36.8Z"/></svg></td>
                    </tr>';
                }
            ?>
        </table>
    </section>
    </div>
</body>
<script>
    const eliminar = async (id) => {
        await fetch(`./eliminar.php?id=${id}`);
        location.reload(true);
    }
</script>
</html>