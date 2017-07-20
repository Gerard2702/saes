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
$conn->desconectar();
?>

<div class="panel panel-inverse" data-sortable-id="form-stuff-3">
    <div class="panel-heading">
        <h3 class="panel-title">REPORTE FACTURA</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" id="reporte-factura">
            <fieldset>
            <div class="col-md-4">
                <div class="form-group" >
                    <label >Numero de Factura</label>
                    <input type="number" class="form-control" id="factura" min="0"  required />
                </div>
            </div>
            <div class="col-md-12">
                 <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success m-r-5 input-sm">Buscar </button>
                </div>
            </div>             
            </fieldset>
        </form>
    </div>
</div>
           
<div class="panel panel-inverse" data-sortable-id="form-stuff-3" id="probando">
    <div class="panel-heading">
        <h3 class="panel-title">DATOS REPORTE</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12" id="report"></div>
    </div>
</div>


<script src="../../assets/js/admin.js"></script>  
<script>
    $('#probando').hide();
</script>   