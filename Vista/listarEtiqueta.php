<?php
require_once('../Controlador/controladorEtiqueta.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Etiquetas</title>
</head>
<body>
    <a href="../controlador/controladorEtiqueta.php?vista=registrarEtiqueta.html"> <strong>Registrar</strong> </a>
    <h1 align="center">Categorías</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listaEtiqueta as $Etiqueta){
                    echo "<tr>";
                    echo "<td>".$Etiqueta['idEtiqueta']."</td>";
                    echo "<td>".$Etiqueta['nombre']."</td>";
                    echo "<td>
                <form id='frmEtiqueta$Etiqueta[idEtiqueta]' method = 'POST' action = '../controlador/controladorEtiqueta.php'>
                    <input type ='hidden' name='idEtiqueta' value=".$Etiqueta['idEtiqueta']." />                    
                    <button type= 'submit' name= 'Editar'>Editar</button>
                    <input type='hidden' name= 'Eliminar'/>
                    <button type='button' onclick='validarEliminacion($Etiqueta[idEtiqueta])' name='Eliminar'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
            
        </tbody>
    </table>
    <script>
        function validarEliminacion(idEtiqueta){
            if(confirm('¿Realmente desea eliminar?')){
                //document.frmEtiqueta.submit();
                document.getElementById('frmEtiqueta'+idEtiqueta).submit();
            }
        }

    </script>
</body>
</html>