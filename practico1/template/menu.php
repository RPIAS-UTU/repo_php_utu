<?php // https://www.php.net/manual/es/function.include-once.php ?>

<?php 

include "constantes.php"; 
echo RUTA_RAIZ;

?>


<nav>
  <ol>
    <li> <a href="<?php echo RUTA_RAIZ; ?>practico1/index.php">Inicio</a>  </li>
    <li> <a href="<?php echo RUTA_RAIZ; ?>practico1/ejercicios/ejercicio1.php">Ejercicio 1</a>  </li>
    <li> <a href="<?php echo RUTA_RAIZ; ?>practico1/ejercicios/ejercicio2.php">Ejercicio 2</a>  </li>
  </ol>

</nav>