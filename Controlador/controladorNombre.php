<?php

require_once('../Modelo/Nombre.php');//Incluir el modelo Nombre
require_once('../Modelo/crudNombre.php');//Incluir el CRUD.
class controladorNombre{
    //Crear el constructor
      
    public function __construct(){
       //$Nombre = new Nombre(); //Instanciar un objeto Nombre
       //$crudNombre = new crudNombre();//Instanciar crudNombre
    }

    public function listarNombre(){ //READ
       //Llamar el método listarNombre del crudNombre.
       $crudNombre = new crudNombre ();//Instanciar crudNombre
       $listaNombre  = $crudNombre ->listarNombre();//Listado de Nombres
       return $listaNombre;
    }

      //recive los valores del formulario, crea un objeto y envia la peticion al CRUD
      public function registrarNombre($e_nombre){
         //instanciacion del objeto
         $Nombre = new Nombre();//crear un objeto de tipo Nombre
         // $categora->setid('');          //asignar el valor del formulario
         $Nombre->setnombre($e_nombre);//setear es agregar valores a un objeto de una Nombre

         //SOLICITAR AL MODELO QUE REALIZE LA INSERCION
         $crudNombre = new crudNombre();
         $mensaje = $crudNombre->registrarNombre($Nombre);
         echo "
         //Imprimir el mensaje del resultado de la insercion con js
         
         <script>
          alert('$mensaje');
          document.location.href = '../vista/listarNombre.php';
         </script>
         ";
      }

      public function buscarNombre($e_idNombre){
         $Nombre = new Nombre();
         $Nombre->setidNombre($e_idNombre);//Setear valores

         $crudNombre = new crudNombre(); //Definir un objeto de la clase crudNombre
         $datosNombre = $crudNombre->buscarNombre($Nombre);//Llamar el metodo del crud

        // var_dump($datosNombre);
        $Nombre->setnombre($datosNombre['nombre']);
        return $Nombre;
      }

      public function actualizarNombre($e_idNombre,$e_nombre){
        //instanciacion del objeto
        $Nombre = new Nombre();//crear un objeto de tipo Nombre
        $Nombre->setidNombre($e_idNombre);          //asignar el valor del formulario
        $Nombre->setnombre($e_nombre);//setear es agregar valores a un objeto de una Nombre

        //SOLICITAR AL MODELO QUE REALIZE LA INSERCION
        $crudNombre = new crudNombre();
        $crudNombre->actualizarNombre($Nombre); 

      }

      public function eliminarNombre($e_idNombre,){
         //instanciacion del objeto
         $Nombre = new Nombre();//crear un objeto de tipo Nombre
         $Nombre->setidNombre($e_idNombre);          //asignar el valor del formulario
         $Nombre->setnombre('');//setear es agregar valores a un objeto de una Nombre
 
         //SOLICITAR AL MODELO QUE REALICE LA ELIMINACION
         $crudNombre = new crudNombre();
         $crudNombre->eliminarNombre($Nombre);  
       }
      public function desplegarvista($pagina){
         //Redireccionar hacia la una vista
         header("Location:../Vista/".$pagina);
      }
      
   
}

//Probar el Controlador
$controladorNombre = new controladorNombre();
$listaNombre = $controladorNombre->listarNombre();//Verificar si se devuelven datos


//verificar la accion a realizar 
if (isset($_POST['Registrar'])){ //isset confirma si una variable existe
   echo "Registrando";
   $e_nombre = $_POST['nombre'];
   $controladorNombre->registrarNombre($e_nombre);
}
else if(isset($_POST['Editar'])){
   $e_idNombre = $_POST['idNombre']; //Recibir variable del formulario
  // echo $e_idNombre;
  $controladorNombre->desplegarVista("editarNombre.php?idNombre=$e_idNombre");
}
else if(isset($_REQUEST['Actualizar'])){
   $e_idNombre = $_REQUEST['idNombre'];
   $e_nombre = $_REQUEST['nombre'];

   $controladorNombre->actualizarNombre($e_idNombre,$e_nombre);

}
else if(isset($_REQUEST['Eliminar'])){
   $e_idNombre = $_REQUEST['idNombre'];

   $controladorNombre->eliminarNombre($e_idNombre);
   
}

else if(isset($_REQUEST['vista'])){
   $controladorNombre->desplegarvista($_REQUEST['vista']);
}

//Probar en el navegador

//Probar la creación de objetos
//crear o instanciar 1 objeto de la clase Nombre.


/*
$Nombre1 = new Nombre();

var_dump($Nombre1);
$Nombre1->setid($_POST['id']);
$Nombre1->setnombre($_POST['nombre']);
//var_dump($Nombre1);
echo "<br>";
echo "El id de la Nombre es: ".$Nombre1->getid();
echo "<br>";
echo "El nombre de la Nombre es: ".$Nombre1->getnombre();

*/
?>