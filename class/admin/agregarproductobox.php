<?php
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");

	if(isset($_POST['id'])){
	  $id =	$_POST['id'];
	  $producto = $_POST['producto'];
	  $partida = $_POST['partida'];
	  $estado = $_POST['estado'];
	  $precio = $_POST['precio'];
	  $cantidad = $_POST['cantidad'];
	  $misproductos[]= array('id' => $id ,'producto'=>$producto,'partida'=>$partida,'estado'=>$estado,'precio'=>$precio,'cantidad'=>$cantidad);
	}

	if(isset($misproductos)) {
	  $_SESSION['productos']=$misproductos;
	  $cantidadproductos=0;
	  for($i=0;$i<count($misproductos);$i++){   
	  if($misproductos[$i]!=NULL){ 
	    $cantidadproductos++;
	  }
	  }
	$_SESSION['cantidadproductos']=$cantidadproductos;
	}

?>