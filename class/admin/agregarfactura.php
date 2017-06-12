<?php
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");


	$fecha = $_POST['fecha'];
	$cliente = $_POST['cliente'];
	$numfactura = $_POST['numfactura'];
	//echo $fecha.$cliente;

	$sql = "INSERT INTO facturas(numfactura,idcliente,fecha,estado) values ('$numfactura','$cliente','$fecha','0')";
    $rs = $conn->insert_delete_update($sql);
    $conn->desconectar();

?>