<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <select name="" id="">

        <?php

        $planetas[] = 'Marte';  // 0
        $planetas[] = 'Tierra'; //  1
        $planetas[] = 'Venus'; // 2
        $planetas[] = 'Saturno'; // 3
        $planetas[] = 'Urano'; // 4
        $planetas[] = 'Neptuo'; // 5
        foreach ($planetas as $p) {
            echo "<OPTION>" . $p . "</OPTION>";
        }

        ?>

    </select>

</body>

</html>