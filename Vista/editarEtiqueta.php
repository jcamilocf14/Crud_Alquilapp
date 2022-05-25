<?php

require_once('../Controlador/controladorEtiqueta.php');
$Etiqueta = $controladorEtiqueta->buscarEtiqueta($_REQUEST['idEtiqueta']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Controlador/controladorEtiqueta.php" method="POST">
        <label>Id:</label>
        <input type="number" name="idEtiqueta" id="idEtiqueta" value="<?php echo $Etiqueta->getidEtiqueta(); ?>"readonly />
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $Etiqueta->getnombre(); ?>" />
        <br>
        <button type="submit" name="Actualizar">Actualizar</button>
        
    </form>
</body>
</html>