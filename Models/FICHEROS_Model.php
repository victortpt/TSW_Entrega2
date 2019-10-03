<?php

class FICHEROS_Model{

    var $id; 
    var $nombre;
    var $mime; 
    var $fecha; 
    var $padre; 
    var $autor; 

    //Constructor de la clase
    function __construct($id, $nombre, $mime, $fecha, $padre, $autor){
        $this->id = $id; 
        $this->nombre = $nombre; 
        $this->mime= $mime; 
        $this->fecha = $fecha; 
        $this->padre = $padre; 
        $this->autor = $autor; 

        include_once '../Models/Access_DB.php'; //Incluye la función de acceso a la Base de Datos
        $this->mysqli = ConnectDB(); //Conecta con la BD y guarda el manejador en un atributo de la clase
    } //Fin del constructor



    //Recupera todos los atributos de una tupla a partir de su clave
   function RellenaDatos(){
        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena el resultado de la consulta sql 
        $result; //almacena el valor de la variable resultado

        //Sentencia SQL de búsqueda de la tupla
        if($this->padre == "NULL"){
            $sql = "SELECT *
                FROM `FICHERO`
                WHERE (`autor` = '" . $this->autor . "' AND `padre` IS NULL
            )";
        }else{
            $sql = "SELECT *
                FROM `FICHERO`
                WHERE (`autor` = '" . $this->autor . "' AND `padre` = '" . $this->padre . "'
            )";
        
        }

        $resultado = $this->mysqli->query($sql);
        if (!$resultado){ //Si la busqueda no da resultado (la tupla no está en la BD)
            return 'tupla inexistente';

        }else{ //Si la búsqueda da resultado
            $result = $resultado;
            return $result; //Devuelve la tupla resultado

        }
    } 
    
}

?>
