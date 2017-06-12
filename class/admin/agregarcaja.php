<?php
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");


	$fechacaja = $_POST['fechacaja'];
	$numfactura = $_POST['numfactura'];
	$numcaja = $_POST['numcaja'];
	$numcontrato = $_POST['numcontrato'];
	//echo $fecha.$cliente;

	$sqlnumfactura = "SELECT * FROM facturas WHERE numfactura='".$numfactura."'";
	$rsnumfactura = $conn->query($sqlnumfactura);
	$num = mysqli_num_rows($rsnumfactura);
	
	if($num>0){
		$factura = $rsnumfactura->fetch_assoc();
		$idfactura = $factura['idfactura']; 
		$sql = "INSERT INTO cajas(idfactura,caja,contrato,iduser,estado) VALUES ('".$idfactura."','".$numcaja."','".$numcontrato."','".$iduser."',0);";
		$rs = $conn->insert_delete_update($sql);
		echo $rs;		
	}
	else{
		echo "false";	
	}
	$conn->desconectar();
?>