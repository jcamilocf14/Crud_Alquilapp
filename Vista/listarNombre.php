<?php
require_once('../Controlador/controladorNombre.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Nombres</title>
</head>
<body>
    <a href="../controlador/controladorNombre.php?vista=registrarNombre.html"> <strong>Registrar</strong> </a>
    <h1 align="center">Nombres</h1>
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
                foreach($listaNombre as $Nombre){
                    echo "<tr>";
                    echo "<td>".$Nombre['idNombre']."</td>";
                    echo "<td>".$Nombre['nombre']."</td>";
                    echo "<td>$".number_format($Nombre['precio'],2,",",".")."</td>";
                    echo "<td>
                <form id='frmNombre$Nombre[idNombre]' method = 'POST' action = '../controlador/controladorNombre.php'>
                    <input type ='hidden' name='idNombre' value=".$Nombre['idNombre']." />                    
                    <button type= 'submit' name= 'Editar'>Editar</button>
                    <input type='hidden' name= 'Eliminar'/>
                    <button type='button' onclick='validarEliminacion($Nombre[idNombre])' name='Eliminar'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
            
        </tbody>
    </table>
    <script>
        function validarEliminacion(idNombre){
            if(confirm('¿Realmente desea eliminar?')){
                //document.frmNombre.submit();
                document.getElementById('frmNombre'+idNombre).submit();
            }
        }

    </script>
</body>
</html>