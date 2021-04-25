<!DOCTYPE html>
<html>

<head>
    <title>Ejemplo</title>
  <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
-->
    <link href="css/estilos.css" rel="stylesheet">

</head>

<body>


    <h1>

        <table>

        <tr class="bordes">
            <!-- Fila -->
            <th class="bordes">I x 10</th> <!-- Columna Encabezado -->
            <th class="bordes">I x 20</th> <!-- Columna Encabezado -->
            <th class="bordes">I x 30</th> <!-- Columna Encabezado -->
            <th class="bordes">I x 40</th> <!-- Columna Encabezado -->
            <th class="bordes">I x 50</th> <!-- Columna Encabezado -->
            
        </tr>

            <?php
            for ($i = 1; $i < 125; $i++) {
                echo "<tr>"; // FILAS
                echo '<td class="bordes">' . ($i * 10) . "</td>"; // COL 1
                echo '<td class="bordes">' . ($i * 20) . "</td>"; // COL 2
                echo '<td class="bordes">' . ($i * 30) . "</td>"; // COL 3
                echo '<td class="bordes">' . ($i * 40) . "</td>"; // COL 3
                echo '<td class="bordes">' . ($i * 50) . "</td>"; // COL 3
                echo "</tr>";
            }
            ?>

        </table>
        <br>

        <?php
        echo "¡Hola, soy un script de PHP!";
        ?>

        <br>

        <?php
        echo "¡Hola, soy un script de PHP 2!";
        ?>

    </h1>

    
    <div class="container ancho bordes">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Edad</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la edad - Solo números">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fecha Nacimiento</label>
            <input type="Date" class="form-control" id="exampleFormControlInput1" placeholder="Fecha nacimiento">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>


</body>

</html>