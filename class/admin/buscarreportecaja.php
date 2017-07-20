		<?php 
			session_start();
			$iduser = $_SESSION['iduser'];
			include("../../config/conexion.php");
			$totalneto=0;
			$count3=0;
			$conn = new Conexion();
			$conn->conectar();
			$conn->query("SET NAMES 'utf8'");

			$numfacturas = $_POST['dato1'];
			$numcontrato = $_POST['dato2'];
			$numcaja = $_POST['dato3'];

		    $sqlexp = "SELECT facturas.numfactura,facturas.fecha,cajas.caja,cajas.contrato,detalle_caja.cantidad,detalle_caja.total,productos.producto,productos.partida, productos.precio,productos.estado, clientes.cliente FROM detalle_caja INNER JOIN productos ON productos.idproducto=detalle_caja.idproducto INNER JOIN cajas ON cajas.idcaja=detalle_caja.idcaja INNER JOIN facturas ON facturas.idfactura=cajas.idfactura INNER JOIN clientes ON clientes.idcliente=facturas.idcliente  WHERE cajas.caja='$numcaja' AND cajas.contrato='$numcontrato' AND facturas.numfactura='$numfacturas' AND cajas.estado='0'";
		    $rs3 = $conn->query($sqlexp);
			$count3 = mysqli_num_rows($rs3);
			$informacion = $rs3->fetch_assoc();
		    $conn->desconectar();
		?>

				<div> 
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