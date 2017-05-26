<?php
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");


	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	$web= $_POST['web'];
	$otro= $_POST['otro'];                        
 

	$sql = "INSERT INTO clientes (cliente,direccion,telefono,fax,otro,email,site) values('".$nombre."','".$direccion."','".$telefono."','".$fax."','".$otro."','".$email."','".$web."');";
    $rs = $conn->insert_delete_update($sql);
    $conn->desconectar();
?>