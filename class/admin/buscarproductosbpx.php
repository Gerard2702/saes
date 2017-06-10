<?php 
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");

	$nombreproducto = $_POST['producto'];

	$sql = "SELECT * from productos where producto like '%".$nombreproducto."%'";
    $rs = $conn->insert_delete_update($sql);

    $conn->desconectar();

    if(mysqli_num_rows($rs)>0){?>
    		<div class='table-responsive'>
			    <table class='table table-hover table-condensed'>
			        <thead class='thead-inverse'>
			            <tr>
			                <th class="col-md-1">Partida</th>
			                <th class="col-md-8">Producto</th>
			                <th class="col-md-1">Estado</th>
			                <th class="col-md-1">Precio</th>
			                <th class="col-md-1">Agregar</th>
			            </tr>
			        </thead>
			        
			        <tbody>
			        <?php while($productos = mysqli_fetch_array($rs,MYSQLI_ASSOC)){ ?>
			            <tr>
			                <td><?php echo $productos['partida'] ?></td>
			                <td><?php echo $productos['producto'] ?></td>
			                <td><?php echo $productos['estado'] ?></td>
			               	<td><?php echo $productos['precio'] ?></td>
							<td><button type='submit' class='btn btn-sm btn-success m-r-5' onclick="agregar(<?php echo $productos['idproducto'];?>)">Agregar</button></td>
			            </tr>
			        <?php } ?>
			        </tbody>      
			    </table>
			</div>
	<?php
    }
    else{
    	echo "no hay productos";
    }
	?>