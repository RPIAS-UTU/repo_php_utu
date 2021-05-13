<html>

<body>

    <form method="POST">

        <label for="txt_nombre">Nombre</label>
        <input type="text" name="txt_nombre">
        <br>
        <br>
        <label for="txt_edad">Edad</label>
        <input type="number" name="txt_edad">
        <br><br>

        <label for="cbo_marcas">Seleccionar marca:</label>
        <select name="cbo_marcas" id="cars">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes" selected>Mercedes</option>
            <option value="audi">Audi</option>
        </select>

        <br><br>

        <input type="radio" name="rdo_genero" value="masculino">
        <label for="rdo_genero">Masculino</label><br>
        <input type="radio" name="rdo_genero" value="femenino">
        <label for="rdo_genero">Femenino</label><br>
        <input type="radio" name="rdo_genero" value="otro">
        <label for="rdo_genero">Otro</label>

        <br><br>

        <?php

            // Características de los Signos de Zodíaco
            // 1 | Caracter hermoso de Escorpio
            // 2 | Engreidos
            // 3 | tal cosa
            // 4 | tal otra cosa

            for ($i=1; $i < 6; $i++) {

                echo '<input type="checkbox" name="chk_caracteristica_'. $i .'" value="'. $i .'">';
                echo '<label for="chk_caracteristica_'. $i .'"> ' . $i . ': Este es el checkbox ' . $i . '</label><br>';

            }


        ?>

        <!-- <input type="checkbox" name="chk_valor1" value="1">
        <label for="chk_combo1"> 1: Este es mi primer checkbox</label>
        <br>
        <input type="checkbox" name="chk_valor2" value="2">
        <label for="chk_combo1"> 2: Este es mi segundo checkbox</label> -->
        <br> <br>
        <input type="submit">
    </form>

    <br> <br> <br> <br> <br>

    <?php

   const NOMBRE_A_EVALUAR_1 = "Agustin";
   const NOMBRE_A_EVALUAR_2 = "Ivan";
   const MAYORIA_EDAD = 18;

    // Analiza el $_REQUEST de la pagina no el FORM
    //var_dump($_REQUEST);


//
    $nombre = isset($_REQUEST['txt_nombre']) ? $_REQUEST['txt_nombre'] : '';
//
    if($nombre != ''){

        if($nombre == NOMBRE_A_EVALUAR_1 || $nombre == NOMBRE_A_EVALUAR_2 ){
            echo "<br><br>BIENVENIDO " . $nombre;
        }else{
    
            echo "<br><br>ACCESO DENEGADO !!!";
        }

    }

    /*
        $edad = 54;
        var_dump($edad);
        */
    ?>




    <!--
    <br> <br>

    <form id="form1" method="POST">

        <input type="text" name="nom">
        <input type="submit" id="btn_enviar">
        <br>

        <?php

        echo "<br><br>LLEGO :: " . $_SERVER['REQUEST_METHOD'];
        echo "<br><br>";

        if (isset($_REQUEST['nom']))
            echo "recibido: " . $_REQUEST['nom'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            echo '<br><br>Llegó algo por POST';

        switch ($_SERVER['REQUEST_METHOD']) {

            case 'GET':
                echo '<br><br>Llegó algo por : ' . $_SERVER['REQUEST_METHOD'];
                break;

            case 'POST':
                echo '<br><br>Llegó algo por : ' . $_SERVER['REQUEST_METHOD'];
                break;

            case 'PUT':
                echo '<br><br>Llegó algo por : ' . $_SERVER['REQUEST_METHOD'];
                break;

            case 'DELETE':
                echo '<br><br>Llegó algo por : ' . $_SERVER['REQUEST_METHOD'];
                break;
        }


        ?>

        <br>

        <?php if (isset($_REQUEST['nom'])) : ?>
            <p>¿De verdad te llamas
                <?php echo $_REQUEST['nom']; ?>?
                Qué nombre más bonito.</p>
        <?php endif; ?>





    </form>
        -->


</body>

</html>