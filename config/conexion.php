<?php
class Conexion
{
	private $servidor = "localhost";
	private $usuario = "root";
	private $password = "";
	private $database = "saes";
	private $conn;
	public $respuesta;
	//ABRIR LA CONEXION CON LA BASE DE DATOS
	public function conectar(){
		try{
		$this->conn = new mysqli($this->servidor,$this->usuario,$this->password,$this->database);
		}
		catch (Exception $e){
			echo "ERROR DE CONEXION CON BASE DE DATOS: $e";
		}
		return $this->conn;
	}
	//LLAMAR CONSULTAS
	public function query($query){
		try{
		$this->respuesta=$this->conn->query($query);
		return $this->respuesta;
		}
		catch (Exception $e){
			echo "ERROR al ejecutar query: $e";
		}
	}
	//LLAMAR PARA INSERT, DELETE, UPDATE
	public function insert_delete_update($query){
		try{
		$this->respuesta=$this->conn->query($query);
		return $this->respuesta;
		}
		catch (Exception $e){
			echo "ERROR de ejecucion".$e->getMessage;
		}
	}
	//DESCONECTAR DE BASE DE DATOS
	public function desconectar(){
		try{
		$this->conn->close();
		}
		catch (Exception $e){
			echo "ERROR al desconectar: $e";
		}
	}
}
?>