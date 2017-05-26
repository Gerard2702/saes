<?php
session_start();
$iduser = $_SESSION['iduser'];
include "../../config/conexion.php";
$conn = new Conexion();
$conn->conectar();
$conn->query("SET NAMES 'utf8'");
$query = "SELECT * FROM clientes order by cliente";
$resp  = $conn->query($query);
$num   = mysqli_num_rows($resp);

$query2 = "SELECT fac.idfactura,cli.cliente,fac.fecha,fac.iduser from facturas fac inner join clientes cli on cli.idcliente=fac.idcliente where fac.estado=0 and fac.iduser='$iduser '";
$resp2  = $conn->query($query2);
$num2   = mysqli_num_rows($resp2);
$conn->desconectar();

if($num2>0){
    $conn->conectar();
    $factura=$resp2->fetch_assoc();
    $querycajas="SELECT cajas.idcaja,cajas.idfactura,cajas.contrato,SUM(detalle_caja.total) as total from cajas inner join detalle_caja on cajas.idcaja=detalle_caja.idcaja where cajas.idfactura='".$factura['idfactura']."' group by detalle_caja.idcaja ";
    $resp3  = $conn->query($querycajas);
    $rowcajas = $resp3;
    $num3   = mysqli_num_rows($resp3);
    //$cajas = $rowcajas->fetch_assoc();
    $conn->desconectar();
?>
<!-- Inicio panel con navbar -->
<ul class="nav nav-tabs nav-tabs-inverse">
    <li id="detallefacturadiv" class="active"><a href="#default-tab-1"  data-toggle="tab">Detalle de la Factura</a></li>
    <li id="agregarcajadiv" class=""><a href="#default-tab-2"  data-toggle="tab">Agregar Caja</a></li>

</ul>
<!-- Inicio contenido del panel --> 
<div class="tab-content">
    <!-- Inicio panel de detalle de facturas -->
    <div class="tab-pane fade active in" id="default-tab-1">
        <fieldset>
            <legend>Información de Factura N°<?php echo $factura['idfactura']?></legend>
            <div class="col-md-12">
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        <strong>N° Factura <?php echo $factura['idfactura']?></strong>
                    </address>
                </div>
                <div class="invoice-to">
                    <address class="m-t-5 m-b-5">
                        <strong>Cliente</strong><br />
                        <?php echo $factura['cliente']?>
                    </address>
                </div>
                <div class="invoice-date">
                    <div class="date m-t-5"><?php echo $factura['fecha']?></div>
                </div>
            </div>
            </div>
            <br>
            <legend>Cajas Agregadas</legend>
            <a class="btn btn-success btn-sm" id="agregarcaja" href="#default-tab-2" data-toggle="tab"><i class="fa fa-plus"></i> Agregar Caja</a>
            <br><br>
            <span>Listado de Cajas agregadas</span>
            <!-- Inicio tabla de cajas de la factura -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N° Caja</th>
                            <th>N° Factura</th>
                            <th>N° Contrato</th>
                            <th>Total</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php if($num3>0){ ?>
                    <tbody>
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
                        <tr>
                    <?php } ?>
                    </tbody>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-warning fade in m-b-15">
                                <strong>No se han agregado cajas!</strong></div> 
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- Fin de la tabla -->
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-sm btn-success m-r-5">Completar Factura</button>
            </div>         
        </fieldset>
    </div>
    <!-- Fin del panel detalle de factura -->
    <!-- Inicio del panel agregar caja -->
    <div class="tab-pane fade " id="default-tab-2">
        
    </div>
    <!-- Fin del panel agregar caja -->
</div>
<?php    
}
else{
?>
<!-- Inicio del panel si no hay factura creada -->
<div class="panel panel-inverse" data-sortable-id="form-stuff-3">
    <div class="panel-heading">
        <h3 class="panel-title">Crear Nueva Factura</h3>
    </div>
    <div class="alert alert-info fade in">
        <i class="fa fa-info-circle fa-2x pull-left"></i>
        <p><strong>No tiene Factura creada!</strong>.<br> Creé una nueva factura para agregar nuevas cajas.</p>
    </div>
    <div class="panel-body">
        <form action="" method="POST" id="nuevafactura">
            <fieldset>
                <legend>Datos de la factura</legend>
                <div class="col-md-6">
                   <div class="form-group">
                    <label >Fecha</label>
                    <input type="text" class="form-control" id="fechafactura" placeholder="Ingrese una fecha" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cliente</label>
                    <select class="form-control" id="clientes">
                    <option disabled selected value> -- Seleccione un Cliente -- </option>
                     <?php if ($num > 0) {
                            while ($clientes = mysqli_fetch_array($resp, MYSQLI_ASSOC)) {?>
                                <option value="<?php echo $clientes['idcliente']; ?>"><?php echo $clientes['cliente']; ?></option>
                      <?php }}?>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-success m-r-5">Crear Factura</button>
                <!--<button type="submit" class="btn btn-sm btn-default">Cancel</button>--> 
                </div>
                
            </fieldset>
        </form>
    </div>
</div>
<!-- Fin del panel si no hay factura -->
<?php
}
?>
<script src="../../assets/js/admin.js"></script>
<script>
    $(document).ready(function() {
        $('#clientes').select2({});
        $('#fechafactura').datepicker({ dateFormat: 'yy-mm-dd' }).datepicker("setDate", new Date());
    });
</script>