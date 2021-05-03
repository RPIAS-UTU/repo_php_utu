<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .borde {
            border: 1px solid;

        }
    </style>


    <title>Document</title>
</head>

<body>

    
    <table>

        <tr class="borde">
            <!-- Fila -->
            <th class="borde">I x 10</th> <!-- Columna Encabezado -->
            <th class="borde">I x 20</th> <!-- Columna Encabezado -->
            <th class="borde">I x 30</th> <!-- Columna Encabezado -->
            <th class="borde">I x 40</th> <!-- Columna Encabezado -->
        </tr>
        <!-- Fila 1 -->

        <?php

        for ($i = 0; $i < 250; $i++) {

            echo "<tr>"; // Fila
            echo '<th class="borde">' . ($i * 10) . "</th>";
            echo '<th class="borde">' . ($i * 20) . "</th>";
            echo '<th class="borde">' . ($i * 30) . "</th>";
            echo '<th class="borde">' . ($i * 40) . "</th>";
            echo "</tr>";
        }

        ?>
    </table>
    <br>


</body>

</html>