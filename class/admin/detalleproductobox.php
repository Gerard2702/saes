<?php 
session_start();
$idcaja = $_SESSION['idcaja'];
include("../../config/conexion.php");
$conn = new Conexion();
$conn->conectar();
$conn->query("SET NAMES 'utf8'");

$idproducto = $_POST['idproducto'];

$sql = "SELECT * from productos where idproducto='".$idproducto."'";
$rs = $conn->query($sql);

$conn->desconectar();

if(mysqli_num_rows($rs)>0){
$producto = $rs->fetch_assoc();
?>
<form action="" method="POST" id="agregarproductobox">
    <fieldset>
        <div class="col-md-6">
        <div class="form-group">
            <label >Codigo de Producto</label>
            <input type="hidden" class="form-control" id="idproductobox" required="" value="<?php echo $producto['idproducto']?>">
            <input type="hidden" class="form-control" id="idcajabox" required="" value="<?php echo $idcaja;?>">
            <input type="text" class="form-control" id="keyproductobox" required="" value="<?php echo $producto['keyproducto']?>" disabled>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label >N° Partida</label>
            <input type="text" class="form-control" id="numpartidabox" required="" value="<?php echo $producto['partida']?>" disabled>
        </div>
        </div>
		<div class="col-md-6">
        <div class="form-group">
            <label >Producto</label>
            <input type="text" class="form-control" id="nomproductobox" required="" value="<?php echo $producto['producto']?>" disabled>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label >Estado</label>
            <input type="text" class="form-control" id="estadoproductobox" required="" value="<?php echo $producto['estado']?>" disabled>
        </div>
        </div>
        <div class="col-md-6">
        <div id="cantidadproducto" class="form-group">
            <label >Precio</label>
            <input type="text" class="form-control" id="precioproductobox" required="" autofocus="true" value="<?php echo $producto['precio']?>" disabled>
        </div>
        </div>
        <div class="col-md-6">
        <div id="cantidadproducto" class="form-group">
            <label >Cantidad</label>
            <input type="number" class="form-control" id="cantidadproductobox" placeholder="Cantidad" required="" autofocus="true">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label >Peso</label>
            <input type="number" class="form-control" id="pesoproductobox" placeholder="Peso" >
        </div>
        </div>
        <div class="col-md-12">
        	<button type="submit" class="btn btn-sm btn-success m-r-5">Agregar Producto</button>
        </div>
    </fieldset>
</form>	
<?php
}
else{
	echo "no hay productos";
}
?>
<script>
	$('#cantidadproductobox').focus();
</script>
<script src="../../assets/js/admin.js"></script>