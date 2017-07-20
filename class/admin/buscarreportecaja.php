		<?php 
			session_start();
			$iduser = $_SESSION['iduser'];
			include("../../config/conexion.php");
			$totalneto=0;
<<<<<<< HEAD
			$count3=0;
=======
<<<<<<< HEAD
			$count3=0;
=======
			$count=0;
			$count1=0;
			$count2=0;
			$count3=0;
			$count4=0;
>>>>>>> origin/master
>>>>>>> origin/master
			$conn = new Conexion();
			$conn->conectar();
			$conn->query("SET NAMES 'utf8'");

			$numfacturas = $_POST['dato1'];
			$numcontrato = $_POST['dato2'];
			$numcaja = $_POST['dato3'];

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
		    $sqlexp = "SELECT facturas.numfactura,facturas.fecha,cajas.caja,cajas.contrato,detalle_caja.cantidad,detalle_caja.total,productos.producto,productos.partida, productos.precio,productos.estado, clientes.cliente FROM detalle_caja INNER JOIN productos ON productos.idproducto=detalle_caja.idproducto INNER JOIN cajas ON cajas.idcaja=detalle_caja.idcaja INNER JOIN facturas ON facturas.idfactura=cajas.idfactura INNER JOIN clientes ON clientes.idcliente=facturas.idcliente  WHERE cajas.caja='$numcaja' AND cajas.contrato='$numcontrato' AND facturas.numfactura='$numfacturas' AND cajas.estado='0'";
		    $rs3 = $conn->query($sqlexp);
			$count3 = mysqli_num_rows($rs3);
			$informacion = $rs3->fetch_assoc();
<<<<<<< HEAD
=======
=======
			$sql = "SELECT idfactura, idcliente, fecha  FROM facturas WHERE numfactura = '$numfacturas'";
		    $rs5 = $conn->query($sql);
		    $count = mysqli_num_rows($rs5);
		    if ($count > 0) {
		    	while ($row = mysqli_fetch_array($rs5,MYSQLI_ASSOC)) {
		    		$facturaid = $row['idfactura'];
		    		$clienteid = $row['idcliente'];
		    		$fechafactura = $row['fecha'];
		    	}	

		    	$sql2 = "SELECT idcaja FROM cajas WHERE idfactura = '$facturaid' AND caja = '$numcaja' AND contrato = '$numcontrato' AND estado='0'";
			    $rs4 = $conn->query($sql2);
			    $count2 = mysqli_num_rows($rs4);
			    if ($count2 > 0) {
			    	while ($row2 = mysqli_fetch_array($rs4,MYSQLI_ASSOC)) {
			    		$idcajas = $row2['idcaja'];
			    	}	

			    	$sql3 = "SELECT * FROM detalle_caja WHERE idcaja = '$idcajas'";
				    $rs3 = $conn->query($sql3);
				    $count3 = mysqli_num_rows($rs3);	    	
			    }

			    $sql4 = "SELECT cliente FROM clientes WHERE idcliente = '$	z'";
			    $rs2 = $conn->query($sql4);
			    $count4 = mysqli_num_rows($rs2);
			    if ($count4 > 0) {
			    	while ($row3 = mysqli_fetch_array($rs2,MYSQLI_ASSOC)) {
			    		$clientenombre = $row3['cliente'];
			    	}		    	
			    }
		    }
>>>>>>> origin/master
>>>>>>> origin/master
		    $conn->desconectar();
		?>

				<div> 
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
				<br>
                    <div class="invoice-header">
		                <div class="invoice-from">
		                    <address class="m-t-5 m-b-5">
		                        <strong>N° Factura <?php echo $informacion['numfactura'];?></strong><br/>
		                        <strong>N° Caja: </strong><?php echo $informacion['caja'];?>
		                    </address>
		                </div>
		                <div class="invoice-to">
		                    <address class="m-t-5 m-b-5">
		                        <strong>Cliente: </strong><?php echo $informacion['cliente'];?><br />
		                        <strong>N° Contrato: </strong><?php echo $informacion['contrato'];?>
		                    </address>
		                </div>
		                <div class="invoice-date">
		                    <div class="date m-t-5">fecha: <?php echo $informacion['fecha'];?>
		                        
		                    </div>
		                </div>
		            </div>
<<<<<<< HEAD
=======
=======
                    <br><span><strong>Listado de productos agregados</strong></span></br>
>>>>>>> origin/master
>>>>>>> origin/master
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="col-md-1">N° Partida</th>
                                    <th class="col-md-6">Producto</th>
                                    <th class="col-md-1">Cantidad</th>
                                    <th class="col-md-1">Precio</th>
                                    <th class="col-md-1">Nuevo</th>
                                    <th class="col-md-1">Usado</th>                                                      
                                    <th class="col-md-1">Valor</th>
                                </tr>
                            </thead>                       
                            <tbody>
                            <?php if($count3>0){ ?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
                            <?php while($product = mysqli_fetch_array($rs3,MYSQLI_ASSOC)){                           	
                            ?>
                                <tr>
                                    <td><?php echo $product['partida'];?></td>
                                    <td><?php echo $product['producto'];?></td>
                                    <td><?php echo $product['cantidad'];?></td>
                                    <td><?php echo $product['precio'];?></td>
                                    <?php if (strcmp($product['estado'], "NUEVO") == 0) {?>
										   	<td><?php echo $product['estado'];?></td>
                                    		<td></td> 
										<?php } else {?>
											<td></td>
										    <td><?php echo $product['estado'];?></td>
<<<<<<< HEAD
=======
=======
                            <?php while($product = mysqli_fetch_array($rs3,MYSQLI_ASSOC)){
                            	$conn->conectar();
                            	$varidprod = $product['idproducto'];
                            	$sql4 = "SELECT * FROM productos WHERE idproducto = '$varidprod'";
                            	$rs2 = $conn->query($sql4);
                            	$conn->desconectar();
                            	$product2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC);                            	
                            ?>
                                <tr>
                                    <td><?php echo $product2['partida'];?></td>
                                    <td><?php echo $product2['producto'];?></td>
                                    <td><?php echo $product['cantidad'];?></td>
                                    <td><?php echo $product2['precio'];?></td>
                                    <?php if (strcmp($product2['estado'], "NUEVO") == 0) {?>
										   	<td><?php echo $product2['estado'];?></td>
                                    		<td></td> 
										<?php } else {?>
											<td></td>
										    <td><?php echo $product2['estado'];?></td>
>>>>>>> origin/master
>>>>>>> origin/master
											<?php }
										?>
                                    	                                   	
                                    <td class="text-right">$ <?php echo $product['total']; $totalneto+=$product['total'];?></td>
                                </tr>
                            <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="alert alert-warning fade in m-b-15">
                                        <strong>No Existe Reporte!</strong></div> 
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot class="thead-inverse" style="background-color: #F0F3F4;">
                                <tr>
                                    <th colspan="6" class="text-center">Total</th>
                                    <th class="text-right">$ <?php echo $totalneto;?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Fin de la tabla -->
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-sm btn-success m-r-5">Imprimir Reporte</button>
                    </div> 
		        </div>  				