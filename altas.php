<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Altas</title>
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
        <form action="altassql.php" method="POST">
            <table>
                <tr>
                    <td class="tableTitle">Nombres</td>
                    <td><input class="inpText"name="nombres"></td>
                </tr>
                <tr>
                    <td class="tableTitle">Apellidos</td>
                    <td><input class="inpText"name="apellidos"></td>
                </tr>
                <tr>
                    <td class="tableTitle">Dirección</td>
                    <td><input class="inpText"name="direccion"></td>
                </tr>
                <tr>
                    <td class="tableTitle">Teléfono</td>
                    <td><input class="inpText"name="telefono"></td>
                </tr>
                <tr>
                    <td class="tableTitle">E-Mail</td>
                    <td><input class="inpText"name="email"></td>
                </tr>
                <tr>
                    <td class="tableTitle"><input class="button" type="submit"></td>
                    <td><input class="button" type="reset"></td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>