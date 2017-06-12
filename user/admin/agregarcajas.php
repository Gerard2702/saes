<?php
session_start();
$iduser = $_SESSION['iduser'];

$totalneto=0;

include "../../config/conexion.php";
$conn = new Conexion();
$conn->conectar();
$query2 = "SELECT facturas.numfactura,facturas.fecha,clientes.cliente,cajas.idcaja,cajas.caja,cajas.contrato FROM cajas
INNER JOIN facturas on facturas.idfactura=cajas.idfactura INNER JOIN clientes on facturas.idcliente=clientes.idcliente where cajas.iduser='$iduser' and cajas.estado='0' ";
$resp2  = $conn->query($query2);
$num2   = mysqli_num_rows($resp2);
$conn->desconectar();
if($num2>0){
$caja=$resp2->fetch_assoc();
$idcaja = $caja['idcaja'];
$_SESSION['idcaja']=$idcaja;
$conn->conectar();
$conn->query("SET NAMES 'utf8'");
$sqlproductos = "SELECT productos.keyproducto,productos.partida,productos.producto,productos.precio,productos.estado,detalle_caja.idcaja,detalle_caja.cantidad,detalle_caja.peso,detalle_caja.total from detalle_caja inner join productos on productos.idproducto=detalle_caja.idproducto inner join cajas on cajas.idcaja=detalle_caja.idcaja where detalle_caja.idcaja='$idcaja'";
$rsproductos = $conn->query($sqlproductos);
$numproductos = mysqli_num_rows($rsproductos);
$conn->desconectar();
?>

<div class="panel panel-inverse" data-sortable-id="form-stuff-3">
    <div class="panel-heading">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-success btn-xs">Opciones</button>
            <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Modiciar Datos de la Caja</a></li>
                <li class="divider"></li>
                <li><a href="#">Agregar Productos</a></li>
            </ul>
        </div>
        <h3 class="panel-title">DATOS DE CAJA <?php echo $caja['caja'];?></h3>
    </div>
    <div class="panel-body">
        <fieldset>
            <div class="col-md-12">
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        <strong>N° Factura <?php echo $caja['numfactura'];?></strong><br/>
                        <strong>N° Caja: </strong><?php echo $caja['caja'];?>
                    </address>
                </div>
                <div class="invoice-to">
                    <address class="m-t-5 m-b-5">
                        <strong>Cliente: </strong><?php echo $caja['cliente'];?><br />
                        <strong>N° Contrato: </strong><?php echo $caja['contrato'];?>
                    </address>
                </div>
                <div class="invoice-date">
                    <div class="date m-t-5">fecha: <?php echo $caja['fecha'];?>
                        
                    </div>
                </div>
            </div>
            <br>
            </div>
            <div class="col-md-12">
                <form action="" method="POST" id="agregarproductoform">
                    <fieldset>
                        
                        <div class="col-md-10">
                           <div class="form-group">
                                <input type="text" class="form-control input-sm" id="nombreproducto" placeholder="Buscar Producto" required="" autofocus="" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success m-r-5 input-sm">Buscar Producto</button>
                            </div>
                        </div> 
                        
                    </fieldset>
                </form>
            </div>
            <div class="col-md-12">
            <div id="contenidoproductos">
                <span>Listado de productos agregados</span>
                <!-- Inicio tabla de productos agregados -->
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
                        <?php if($numproductos>0){ ?>
                        <?php while($product = mysqli_fetch_array($rsproductos,MYSQLI_ASSOC)){?>
                            <tr>
                                <td><?php echo $product['partida'];?></td>
                                <td><?php echo $product['producto'];?></td>
                                <td><?php echo $product['cantidad'];?></td>
                                <td><?php echo $product['precio'];?></td>
                                <td><?php echo $product['estado'];?></td>
                                <td><?php echo $product['estado'];?></td>
                                <td class="text-right">$ <?php echo $product['total']; $totalneto+=$product['total'];?></td>
                            </tr>
                        <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="alert alert-warning fade in m-b-15">
                                    <strong>No se han agregado productos!</strong></div> 
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
                    <button type="button" class="btn btn-sm btn-success m-r-5">Completar Caja</button>
                </div> 
            </div>  
            </div>
   
        </fieldset>
    </div>
</div>

<?php }
else{ ?>
<!-- Inicio del panel agregar cajas -->
<div class="panel panel-inverse" data-sortable-id="form-stuff-3">
    <div class="panel-heading">
        <h3 class="panel-title">Ingresar Caja</h3>
    </div>
    <div class="alert alert-danger fade in" style="display: none" id="error-factura">
        <i class="fa fa-check fa-2x pull-left"></i>
        <p><strong>Error!</strong> No Existe el numero de Factura Ingresado.</p>
        <p>Si tiene problema, pongase en contacto con el administrador.</p>
    </div>
    <div class="panel-body">
        <form action="" method="POST" id="agregarcajasform">
            <fieldset>
                <legend>Datos de la Caja</legend>
                <div class="col-md-6">
                <div class="form-group">
                    <label >Fecha</label>
                    <input type="date" class="form-control" id="fechacaja" placeholder="Ingrese una fecha" required="">
                </div>
                <div id="numfacturacaja" class="form-group">
                    <label >Numero de Factura</label>
                    <input type="number" class="form-control" id="numfactura" placeholder="Numero de Factura" required="">
                </div>
                <div class="form-group">
                    <label >Numero de Caja</label>
                    <input type="number" class="form-control" id="numcaja" placeholder="Numero de Caja" required="">
                </div>
                <div class="form-group">
                    <label >Numero de Contrato</label>
                    <input type="number" class="form-control" id="numcontrato" placeholder="Numero de Contrato"  required="">
                </div>
                <button type="submit" class="btn btn-sm btn-success m-r-5">Crear Caja</button>
                <!--<button type="submit" class="btn btn-sm btn-default">Cancel</button>--> 
                </div>
                
            </fieldset>
        </form>
    </div>
</div>
<!-- Fin del panel agregar cajas -->
<?php }

?>

<script src="../../assets/js/admin.js"></script>
<script>
    $(document).ready(function() {
        $('#clientes').select2({});
        $('#numfactura').focus();
        $('#nombreproducto').focus();
        $('#fechacaja').datepicker({ dateFormat: 'yy-mm-dd' }).datepicker("setDate", new Date());
    });

    /*$('#producmodal').on('shown.bs.modal', function() {
      $('#nombreproducto').focus();
    });*/
</script>

