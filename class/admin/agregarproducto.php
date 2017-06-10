<?php
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");


	$nombre = $_POST['nombre'];
	$partida = $_POST['partida'];
	$estado = $_POST['estado'];
	$precio = $_POST['precio'];
	                      
	$sql="INSERT INTO productos (producto,partida,precio,estado) values('".$nombre."','".$partida."','".$precio."','".$estado."');";
    $rs = $conn->insert_delete_update($sql);
    $conn->desconectar();
?>