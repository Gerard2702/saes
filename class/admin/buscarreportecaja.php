		<?php 
			session_start();
			$iduser = $_SESSION['iduser'];
			include("../../config/conexion.php");
			$totalneto=0;
			$count=0;
			$count1=0;
			$count2=0;
			$count3=0;
			$count4=0;
			$conn = new Conexion();
			$conn->conectar();
			$conn->query("SET NAMES 'utf8'");

			$numfacturas = $_POST['dato1'];
			$numcontrato = $_POST['dato2'];
			$numcaja = $_POST['dato3'];

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
		    $conn->desconectar();
		?>

				<div> 
                    <br><span><strong>Listado de productos agregados</strong></span></br>
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