<?php

class CARPETAS_Model{

    var $uid; 
    var $nombre;
    var $padre; 
    var $fecha; 
    var $autor; 

    //Constructor de la clase
    function __construct($uid, $nombre, $padre, $fecha, $autor){
        $this->uid = $uid; 
        $this->nombre = $nombre; 
        $this->padre= $padre; 
        $this->fecha = $fecha; 
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
                FROM `CARPETA`
                WHERE (`autor` = '" . $this->autor . "' AND `padre` IS NULL
            )";
        }else{
            $sql = "SELECT *
                FROM `CARPETA`
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
