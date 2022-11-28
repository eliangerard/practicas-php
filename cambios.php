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
                        <td><input class="inpText" name="input'.$dat->id_Alumno.'" type="text" id="nombres'.$dat->id_Alumno.'" value="'.$dat->Nombres.'" disabled></td>
                        <td><input class="inpText" name="input'.$dat->id_Alumno.'" type="text" id="apellidos'.$dat->id_Alumno.'" value="'.$dat->Apellidos.'" disabled></td>
                        <td><input class="inpText" name="input'.$dat->id_Alumno.'" type="text" id="direccion'.$dat->id_Alumno.'" value="'.$dat->Direccion.'" disabled></td>
                        <td><input class="inpText" name="input'.$dat->id_Alumno.'" type="text" id="telefono'.$dat->id_Alumno.'" value="'.$dat->Telefono.'" disabled></td>
                        <td><input class="inpText" name="input'.$dat->id_Alumno.'" type="text" id="email'.$dat->id_Alumno.'" value="'.$dat->EMail.'" disabled></td>
                        <td id="'.$dat->id_Alumno.'" onclick="editar(id)"><svg class="tableIcon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M895.856847 313.16299l-78.107152 78.107152L632.709534 206.228687l78.069657-78.107152c26.508929-26.508929 53.017859 0 53.017859 0l132.059798 132.022303C895.856847 260.145131 922.365776 286.654061 895.856847 313.16299zM116.361413 907.654465l224.336162-39.37099L155.246261 682.832162 116.361413 907.654465zM181.262584 657.661414l185.06602 185.06602 423.00897-423.00897L604.271554 234.652444 181.262584 657.661414z"  /></svg></td>
                    </tr>';
                }
            ?>
        </table>
    </section>
    </div>
</body>
<script>
    const editSVG = '<svg class="tableIcon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M895.856847 313.16299l-78.107152 78.107152L632.709534 206.228687l78.069657-78.107152c26.508929-26.508929 53.017859 0 53.017859 0l132.059798 132.022303C895.856847 260.145131 922.365776 286.654061 895.856847 313.16299zM116.361413 907.654465l224.336162-39.37099L155.246261 682.832162 116.361413 907.654465zM181.262584 657.661414l185.06602 185.06602 423.00897-423.00897L604.271554 234.652444 181.262584 657.661414z"  /></svg>';
    const confirmSVG = '<svg class="tableIcon" viewBox="0 0 17.837 17.837" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"/></svg>';
    
    let lastSVG;
    let lastValues = new Array();
    let lastElements;
    let editing = -1;

    const editar = async (id) => {
        const inputs = document.getElementsByTagName('input');
        const elementInputs = document.getElementsByName('input'+id);
        const svg = document.getElementById(id);
        
        //Significa que voy a guardar los cambios
        if(editing == id){
            Array.from(inputs).forEach(input => input.disabled = true);
            editing = -1;
            svg.innerHTML = editSVG;
            
            let formdata = new FormData();
            formdata.append("idalumno", id);
            formdata.append("nombres", elementInputs[0].value);
            formdata.append("apellidos", elementInputs[1].value);
            formdata.append("direccion", elementInputs[2].value);
            formdata.append("telefono", elementInputs[3].value);
            formdata.append("email", elementInputs[4].value);

            await fetch(`./editarsql.php`, {method: "POST", body: formdata});
            location.reload(true);
        //Significa que no estaba editando ninguno y voy a editar este
        } else if(editing < 0){
            Array.from(inputs).forEach(input => input.disabled = true);
            lastValues = new Array();
            elementInputs.forEach((input, i) => { 
                input.disabled = false;
                lastValues.push(input.value);
            });
            editing = id;
            svg.innerHTML = confirmSVG;
            lastSVG = svg;
            //Guardo los valores por si se cancela la edición
            //Guardo los inputs para que, en caso de cancelarse, se puedan reestablecer
            lastElements = elementInputs;

        //Significa que ya estaba editando uno antes de este
        } else if(confirm('Está editando otro registro, ¿Desea continuar sin guardar?')) {
            lastSVG.innerHTML = editSVG;
            lastElements.forEach( (last, i) => last.value = lastValues[i]);
            editing = -1;
            editar(id);
        }
    }
</script>
</html>