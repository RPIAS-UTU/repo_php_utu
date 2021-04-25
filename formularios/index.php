<html>

<body>
    <form>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <br>
        <label for="edad">Edad</label>
        <input type="number" name="edad">
        <input type="submit">
        <br>
        <?php

        // Analiza el $_REQUEST de la pagina no el FORM
        var_dump($_REQUEST);

        /*
        $edad = 54;
        var_dump($edad);
        */
        ?>
    </form>
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

        switch ($_SERVER['REQUEST_METHOD']){

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



</body>

</html>