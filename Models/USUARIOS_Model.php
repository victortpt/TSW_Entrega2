<!--
Documento php que contiene el código php que permite realizar consultas en la base de datos y poder modificar o consultar la tabla USUARIOS
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php
class USUARIOS_Model {

	var $login;
	var $password;
	var $nombre;
	var $apellidos;
	var $email;
	var $uso;
	var $mysqli;

//Constructor de la clase
//

function __construct($login,$password,$nombre,$apellidos,$email,$uso){
	$this->login = $login;
	$this->password = $password;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;
	$this->uso = $uso;

	include_once '../Models/Access_DB.php';
	$this->mysqli = ConnectDB();
}



//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function __destruct()
{

}

function login(){

	$sql = "SELECT *
			FROM USUARIO
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

//
function Register(){

		$sql = "select * from USUARIO where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){
			
		$sql = "INSERT INTO USUARIO (
			login,
			password,
			nombre,
			apellidos,
			email,
			uso
			) 
				VALUES (
					'$this->login',
					'$this->password',
					'$this->nombre',
					'$this->apellidos',
					'$this->email',
					'$this->uso'
					)";
			
		if (!$this->mysqli->query($sql)) {
			return 'No se ha podido resgistrar';
		}
		else{
			return 'Registrado con éxito'; //operacion de insertado correcta
		}	

	}

	
}//fin de clase

?> 