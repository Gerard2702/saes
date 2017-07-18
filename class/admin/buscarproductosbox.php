<?php 
	session_start();
	$iduser = $_SESSION['iduser'];
	include("../../config/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$conn->query("SET NAMES 'utf8'");
	$nombreproducto = $_POST['producto'];
	$sql = "SELECT * from productos where producto like '%".$nombreproducto."%'";
    $rs = $conn->query($sql);
    $conn->desconectar();
    if(mysqli_num_rows($rs)>0){?>
    		<div class='table-responsive'>
			    <table class='table table-hover table-condensed'>
			        <thead class='thead-inverse'>
			            <tr>
			                <th class="col-md-1">Partida</th>
			                <th class="col-md-9">Producto</th>
			                <th class="col-md-1">Estado</th>
			                <th class="col-md-1">Precio</th>
			            </tr>
			        </thead>			        
			        <tbody>
			        <?php while($productos = mysqli_fetch_array($rs,MYSQLI_ASSOC)){ ?>
			            <tr onclick="agregar(<?php echo $productos['idproducto'];?>)">
			                <td ><?php echo $productos['partida'] ?></td>
			                <td><?php echo $productos['producto'] ?></td>
			                <td><?php echo $productos['estado'] ?></td>
			               	<td><?php echo $productos['precio'] ?></td>
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
	<!-- #modal-without-animation -->
<div class="modal" id="producmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Detalle Producto</h4>
            </div>
            <div class="modal-body">
                <div id="resulproductos">
                    
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- #modal-message -->
<script src="../../assets/js/admin.js"></script>
