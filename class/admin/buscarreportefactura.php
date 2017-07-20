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

		    $sqlexp = "SELECT facturas.numfactura, facturas.fecha, clientes.cliente, detalle_caja.cantidad, detalle_caja.total, productos.producto, productos.partida, productos.precio, productos.estado FROM detalle_caja INNER JOIN productos ON productos.idproducto=detalle_caja.idproducto INNER JOIN cajas ON cajas.idcaja=detalle_caja.idcaja INNER JOIN facturas ON facturas.idfactura=cajas.idfactura INNER JOIN clientes ON clientes.idcliente=facturas.idcliente WHERE facturas.numfactura='$numfacturas' AND cajas.estado='0'";
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
		                        <strong>Encomienda N°: </strong><h7><?php echo $informacion['numfactura'];?></h7><br/>
                                <strong>Carta de Porte: </strong><br/>
		                    </address>
		                </div>
		                <div class="invoice-to">
		                    <address class="m-t-5 m-b-5">
		                        <strong>Cliente: </strong><h7><?php echo $informacion['cliente'];?></h7><br />
		                        <strong>N° Bultos: </strong><br />
		                    </address>
		                </div>
		                <div class="invoice-date">
		                    <div class="date m-t-5">
                            <strong>Fecha: </strong><h7><?php echo $informacion['fecha'];?>	</h7>	                        
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