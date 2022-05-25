<?php

require_once('../Modelo/Etiqueta.php');//Incluir el modelo Etiqueta
//require_once('../Modelo/crudEtiqueta.php');//Incluir el CRUD.
class controladorEtiqueta{
    //Crear el constructor
      
    public function __construct(){
       //$Etiqueta = new Etiqueta(); //Instanciar un objeto Etiqueta
       //$crudEtiqueta = new crudEtiqueta();//Instanciar crudEtiqueta
    }

    public function listarEtiqueta(){ //READ
       //Llamar el método listarEtiqueta del crudEtiqueta.
       $crudEtiqueta = new crudEtiqueta();//Instanciar crudEtiqueta
       $listaEtiqueta = $crudEtiqueta->listarEtiqueta();//Listado de Etiquetas
       return $listaEtiqueta;
    }

      //recive los valores del formulario, crea un objeto y envia la peticion al CRUD
      public function registrarEtiqueta($e_nombre){
         //instanciacion del objeto
         $Etiqueta = new Etiqueta();//crear un objeto de tipo Etiqueta
         // $categora->setid('');          //asignar el valor del formulario
         $Etiqueta->setnombre($e_nombre);//setear es agregar valores a un objeto de una Etiqueta

         //SOLICITAR AL MODELO QUE REALIZE LA INSERCION
         $crudEtiqueta = new crudEtiqueta();
         $mensaje = $crudEtiqueta->registrarEtiqueta($Etiqueta);
         echo "
         //Imprimir el mensaje del resultado de la insercion con js
         
         <script>
          alert('$mensaje');
          document.location.href = '../vista/listarEtiqueta.php';
         </script>
         ";
      }

      public function buscarEtiqueta($e_idEtiqueta){
         $Etiqueta = new Etiqueta();
         $Etiqueta->setidEtiqueta($e_idEtiqueta);//Setear valores

         $crudEtiqueta = new crudEtiqueta(); //Definir un objeto de la clase crudEtiqueta
         $datosEtiqueta = $crudEtiqueta->buscarEtiqueta($Etiqueta);//Llamar el metodo del crud

        // var_dump($datosEtiqueta);
        $Etiqueta->setnombre($datosEtiqueta['nombre']);
        return $Etiqueta;
      }

      public function actualizarEtiqueta($e_id_etiqueta,$e_nombre){
        //instanciacion del objeto
        $Etiqueta = new Etiqueta();//crear un objeto de tipo Etiqueta
        $Etiqueta->setidEtiqueta($e_id_etiqueta);          //asignar el valor del formulario
        $Etiqueta->setnombre($e_nombre);//setear es agregar valores a un objeto de una Etiqueta

        //SOLICITAR AL MODELO QUE REALIZE LA INSERCION
        $crudEtiqueta = new crudEtiqueta();
        $crudEtiqueta->actualizarEtiqueta($Etiqueta); 

      }

      public function eliminarEtiqueta($e_id_etiqueta,){
         //instanciacion del objeto
         $Etiqueta = new Etiqueta();//crear un objeto de tipo Etiqueta
         $Etiqueta->setidEtiqueta($e_id_etiqueta);          //asignar el valor del formulario
         $Etiqueta->setnombre('');//setear es agregar valores a un objeto de una Etiqueta
 
         //SOLICITAR AL MODELO QUE REALICE LA ELIMINACION
         $crudEtiqueta = new crudEtiqueta();
         $crudEtiqueta->eliminarEtiqueta($Etiqueta);  
       }
      public function desplegarvista($pagina){
         //Redireccionar hacia la una vista
         header("Location:../Vista/".$pagina);
      }
      
   
}

//Probar el Controlador
$controladorEtiqueta = new controladorEtiqueta();
$listaEtiqueta = $controladorEtiqueta->listarEtiqueta();//Verificar si se devuelven datos


//verificar la accion a realizar 
if (isset($_POST['Registrar'])){ //isset confirma si una variable existe
   echo "Registrando";
   $e_nombre = $_POST['nombre'];
   $controladorEtiqueta->registrarEtiqueta($e_nombre);
}
else if(isset($_POST['Editar'])){
   $e_idEtiqueta = $_POST['idEtiqueta']; //Recibir variable del formulario
  // echo $e_idEtiqueta;
  $controladorEtiqueta->desplegarVista("editarEtiqueta.php?idEtiqueta=$e_id_etiqueta");
}
else if(isset($_REQUEST['Actualizar'])){
   $e_id_etiqueta = $_REQUEST['idEtiqueta'];
   $e_nombre = $_REQUEST['nombre'];

   $controladorEtiqueta->actualizarEtiqueta($e_idEtiqueta,$e_nombre);

}
else if(isset($_REQUEST['Eliminar'])){
   $e_idEtiqueta = $_REQUEST['idEtiqueta'];

   $controladorEtiqueta->eliminarEtiqueta($e_id_etiqueta);
   
}

else if(isset($_REQUEST['vista'])){
   $controladorEtiqueta->desplegarvista($_REQUEST['vista']);
}

//Probar en el navegador

//Probar la creación de objetos
//crear o instanciar 1 objeto de la clase Etiqueta.


/*
$Etiqueta1 = new Etiqueta();

var_dump($Etiqueta1);
$Etiqueta1->setid($_POST['id']);
$Etiqueta1->setnombre($_POST['nombre']);
//var_dump($Etiqueta1);
echo "<br>";
echo "El id de la Etiqueta es: ".$Etiqueta1->getid();
echo "<br>";
echo "El nombre de la Etiqueta es: ".$Etiqueta1->getnombre();

*/
?>