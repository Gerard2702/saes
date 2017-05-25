<?php 
  try{
	$usuario = $_POST['user'];
	$contrasena1 = $_POST['pass'];
	$contrasena = md5($contrasena1);
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$query="SELECT * FROM users WHERE user='$usuario' AND pass='$contrasena'";
	$resp=$conn->query($query);
    if(mysqli_num_rows($resp)>0){
		$user=$resp->fetch_assoc(); 
		$conn->desconectar();
        session_start();
        $_SESSION['usuario'] = $user['user'];
        $_SESSION['iduser'] = $user['iduser'];
		$_SESSION['tipo'] = $user['user_type'];
		$_SESSION['nombreuser'] = $user['name'];
		$_SESSION['apellidouser'] = $user['lastname'];
        $_SESSION['val'] = "true";
		if($user['user_type']==1){
			header("Location:../../user/admin");
		}
	   exit();
	} 
	else{
	header("Location:../../?err=1");
	exit();
	}
  }
  catch(Exception $e){
  header("Location:../../?err=2");
  exit();
  }
?>