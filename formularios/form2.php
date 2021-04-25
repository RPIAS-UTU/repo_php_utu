<html>
<body>
<form id="form1" method="POST">
        <input type="text" name="nombre" pattern="[a-zA-Z]" required>
        <input type="submit" id="btn_enviar">
        <br>
 <?php   
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    echo '<br>Llega algo por POST';
       $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
 ?>
        <br>
        <?php if (isset($_REQUEST['nombre'])) : ?>
            <p>¿De verdad te llamas
                <?php echo $_REQUEST['nombre']; ?>?
                Qué nombre más bonito.</p>
        <?php endif; ?>
    </form>
</body>
</html>


