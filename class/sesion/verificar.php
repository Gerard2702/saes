<?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
	$token = $_SESSION['val'];
    if(!isset($usuario) && $token!='true'){
        header("Location: index.php");
    }   
?>