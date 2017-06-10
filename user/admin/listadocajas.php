<?php
session_start();
include "../../config/conexion.php";
$conn = new Conexion();
$conn->conectar();
$conn->query("SET NAMES 'utf8'");
$conn->conectar();
$idfactura = $_SESSION['idfactura'];

$querycajas="SELECT cajas.idcaja,cajas.idfactura,cajas.contrato,SUM(detalle_caja.total) as total from cajas inner join detalle_caja on cajas.idcaja=detalle_caja.idcaja where cajas.idfactura='".$idfactura."' group by detalle_caja.idcaja ";
$resp3  = $conn->query($querycajas);
$rowcajas = $resp3;
$num3   = mysqli_num_rows($resp3);
    //$cajas = $rowcajas->fetch_assoc();
$conn->desconectar();
?> 
<div class="table-responsive">
    <table class="table table-hover table-condensed ">
        <thead class="thead-inverse">
            <tr>
                <th>N° Caja</th>
                <th>N° Factura</th>
                <th>N° Contrato</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        
        <tbody>
        <?php if($num3>0){ ?>
        <?php while($box = mysqli_fetch_array($resp3,MYSQLI_ASSOC)){?>
            <tr>
                <td><?php echo $box['idcaja'];?></td>
                <td><?php echo $box['idfactura'];?></td>
                <td><?php echo $box['contrato'];?></td>
                <td class="text-right">$ <?php echo $box['total'];?></td>
                <td>
                    <a class="btn btn-default btn-icon btn-circle btn-sm">
                    <i class="fa fa-expand"></i>
                    </a>
                    <a class="btn btn-default btn-icon btn-circle btn-sm">
                    <i class="fa fa-cog"></i>
                    </a>
                    <a class="btn btn-default btn-icon btn-circle btn-sm">
                    <i class="fa fa-times"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5" class="text-center">
                    <div class="alert alert-warning fade in m-b-15">
                    <strong>No se han agregado cajas!</strong></div> 
                </td>
            </tr>
        <?php } ?>
        </tbody>      
    </table>
</div>