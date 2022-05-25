<?php
//APLICACIONES TRANSACCIONALES 
//CRUD : CREATE=crear / READ=leer / UPDATE=modificar / DELET=eliminar

require_once('conexion.php');//Incluir el archivo conexión
class crudetiqueta{
    public function __construct(){
    }

    //Método para consultar todas las categorías
    //de la base de datos.
    public function listaretiqueta(){ //READ

      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query('SELECT * FROM etiquetas ORDER BY id_etiqueta ASC ');
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetchAll());//Retornar el resultado de la consulta
    }

    public function registraretiqueta($etiqueta){//UPDATE
      $mensaje = ""; //Declarar una variable llamada mensaje
      //Establecer una conexion a base de datos
      $baseDatos = Conexion::conectar();
      //Preparar una conexion a sql
      //e_ indica que es un dato de entrada
        $sql = $baseDatos->prepare('INSERT INTO
        etiqueta(idetiqueta,nombre)
        VALUES(:e_idetiqueta,:e_nombre) 
        ');
        //e: = dato de entrada (versatil, pero se le deve de colocar los atributos para no generar confuciones en el futuro) / se define la tabla y sus atributos

        //las siguientes lineas capturan los valores de los atributos del objeto
        //del objeto etiqueta ('e_idetiqueta' se almacena lo que hay en $etiqueta->getidetiqueta) y ()
        $sql->bindValue('e_idetiqueta', $etiqueta->getidetiqueta());
        $sql->bindValue('e_nombre', $etiqueta->getnombre());

       



        try{ 
          $sql->execute(); //esto se ejecuta si todo sale bien 
          $mensaje = "Registro exitoso";

        }catch(Exeption $excepcion){
          //se usa para capturar ecepciones ecepciones son : id iguales, base de datos mal nombrada etc
          //exepciones que no se pueden controlar
          $mensaje = "Problemas en el registro";
          
          //echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
        }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
        return $mensaje;
    }
    public function buscaretiqueta($etiqueta){ //READ

      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query("SELECT * FROM etiqueta WHERE idetiqueta=".$etiqueta->getidetiqueta());
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetch());//Retornar el resultado de la consulta
    }

    
    public function actualizaretiqueta($etiqueta){//UPDATE

      $baseDatos = Conexion::conectar();

        $sql = $baseDatos->prepare('UPDATE FROM
        etiqueta SET nombre =:e_nombre WHERE idetiqueta=:e_idetiqueta');
        //e: = dato de entrada (versatil, pero se le deve de colocar los atributos para no generar confuciones en el futuro) / se define la tabla y sus atributos
        //las siguientes lineas capturan los valores de los atributos del objeto
        //del objeto etiqueta ('e_idetiqueta' se almacena lo que hay en $etiqueta->getidetiqueta) y ()
        
        $sql->bindValue('e_idetiqueta', $etiqueta->getidetiqueta());
        $sql->bindValue('e_nombre', $etiqueta->getnombre());

       



        try{ 
          $sql->execute(); //esto se ejecuta si todo sale bien 
          echo "Actualizacion exitosa";

        }catch(Exeption $excepcion){
          //se usa para capturar ecepciones ecepciones son : id iguales, base de datos mal nombrada etc
          //exepciones que no se pueden controlar

          echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
        }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
      }

      public function eliminaretiqueta($etiqueta){//UPDATE
        //Establecer la conexion a la base de datos
        //var_dump($etiqueta);
        $baseDatos = Conexion::conectar();
        //Preparar la sentencia sql
        //e_ indica que es un dato de entrada
          $sql = $baseDatos->prepare('DELETE FROM
          etiqueta WHERE idetiqueta=:e_idetiqueta');
          //las siguientes lineas capturan los valores de los atributos del objeto
          //del objeto etiqueta ('e_idetiqueta' se almacena lo que hay en $etiqueta->getidetiqueta) y ()
          $sql->bindValue('e_idetiqueta', $etiqueta->getidetiqueta());
          try{ //capturar excdpciones de la base de datos
            //Ejecutar la consola
            $sql->execute(); //esto se ejecuta si todo sale bien 
            echo "Eliminacion exitosa";
           }
  
           catch(Exception $excepcion){//Exception: Excepcion o un error
            echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
            echo "Problemas en la eliminacion";
            }
  
          Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
      }
    }     
?>