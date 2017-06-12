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
/*
$query2 = "SELECT fac.idfactura,cli.cliente,fac.fecha,fac.iduser from facturas fac inner join clientes cli on cli.idcliente=fac.idcliente where fac.estado=0 and fac.iduser='$iduser '";
$resp2  = $conn->query($query2);
$num2   = mysqli_num_rows($resp2);*/
$conn->desconectar();
?>
<!-- Inicio del panel si no hay factura creada -->
<div class="panel panel-inverse" data-sortable-id="form-stuff-3">
    <div class="panel-heading">
        <h3 class="panel-title">CREAR NUEVA FACTURA</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" id="nuevafactura">
            <fieldset>
                <legend>Datos de la factura</legend>
                <div class="col-md-6">
                <div class="form-group">
                    <label >Fecha</label>
                    <input type="date" class="form-control" id="fechafactura" placeholder="Ingrese una fecha" required="">
                </div>
                <div class="form-group">
                    <label >Numero de Factura</label>
                    <input type="number" class="form-control" id="numfactura" placeholder="Numero de Factura"  required="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cliente</label>
                    <select class="form-control" id="clientes" required="">
                    <option> -- Seleccione un Cliente -- </option>
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

<script src="../../assets/js/admin.js"></script>
<script>
    $(document).ready(function() {
        $('#clientes').select2({});
        $('#numfactura').focus();
        $('#fechafactura').datepicker({ dateFormat: 'yy-mm-dd' }).datepicker("setDate", new Date());
    });
</script>
