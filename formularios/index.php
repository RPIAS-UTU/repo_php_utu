<html>

<body>

    <form>

        <label for="txt_nombre">Nombre</label>
        <input type="text" name="txt_nombre">

        <br>
        <br>

        <label for="txt_edad">Edad</label>
        <input type="number" name="txt_edad">

        <br>
        <br>

        <label for="txt_fecha_nac">Fecha nacimiento</label>
        <input type="date" name="txt_fecha_nac">

        <br><br>

        <label for="cbo_marca">Choose a car:</label>
        <select name="cbo_marca" id="cbo_marca">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi" selected>Audi</option>
        </select>

        <br><br>

        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>

        <br><br>

        <input type="checkbox" name="chk_1" value="">  <label>Este es mi primer checkbox</label>
        <br><br>
        <input type="checkbox" name="chk_2" value="second_checkbox"> <label for="cbox2">Este es mi segundo checkbox</label>

        <br><br>
        <input type="submit">

        <br> <br> <br> <br> <br>

        <?php
       
        // Analiza el $_REQUEST de la pagina no el FORM
        var_dump($_GET);

        echo '<br><br>';

        print_r($_REQUEST);


         /*


        $nombre = $_REQUEST['txt_nombre'];

        if($nombre == "Agustin" || $nombre == "Ivan" ){
            echo "<br><br>BIENVENIDO " . $nombre;
        }

        */

        /*
        $edad = 54;
        var_dump($edad);
        */
        ?>


    </form>


</body>

</html>