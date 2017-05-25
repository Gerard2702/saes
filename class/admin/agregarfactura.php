<?php
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");


	$fecha = $_POST['fecha'];
	$cliente = $_POST['cliente'];
	//echo $fecha.$cliente;

	$sql = "INSERT INTO facturas(idcliente,fecha,iduser,estado) values ('$cliente','$fecha','$iduser','0')";
    $rs = $conn->insert_delete_update($sql);
    $conn->desconectar();

?>