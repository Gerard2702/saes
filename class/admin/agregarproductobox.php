<?php
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");


	$idcaja = $_POST['idcaja'];
	$idproducto = $_POST['idproducto'];
	$precioproducto = $_POST['precioproducto'];
	$cantidadproducto = $_POST['cantidadproducto'];
	//echo $fecha.$cliente;
	$total = $precioproducto*$cantidadproducto;

	$sqlnumfactura = "INSERT INTO detalle_caja(idcaja,idproducto,cantidad,total) VALUES ('".$idcaja."','".$idproducto."','".$cantidadproducto."','".$total."')";
	$rs = $conn->insert_delete_update($sqlnumfactura);
	$num = mysqli_num_rows($rs);
	
	/*if($num>0){
		$factura = $rsnumfactura->fetch_assoc();
		$idfactura = $factura['idfactura']; 
		$sql = "INSERT INTO cajas(idfactura,caja,contrato,iduser,estado) VALUES ('".$idfactura."','".$numcaja."','".$numcontrato."','".$iduser."',0);";
		$rs = $conn->insert_delete_update($sql);
		echo $rs;		
	}
	else{
		echo "false";	
	}*/
	$conn->desconectar();


?>