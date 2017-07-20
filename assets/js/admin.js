$("#nuevafactura").submit(function(event){ 
        event.preventDefault(); 
        var fecha = $("#fechafactura").val();
        var numfactura = $("#numfactura").val();
        var cliente = $("#clientes").val();
  		$.ajax({
                type:"POST",
                url: "../../class/admin/agregarfactura.php",
                dataType:"text",
                data:{
                    fecha:fecha,
                    numfactura:numfactura,
                    cliente:cliente,
                }
        }).done(function(data) {
            $('#contenido').load('../../user/admin/crearfactura.php');
        });
 });
$("#agregarcajasform").submit(function(event){ 
        event.preventDefault(); 
        var fechacaja = $("#fechacaja").val();
        var numfactura = $("#numfactura").val();
        var numcaja = $("#numcaja").val();
        var numcontrato = $("#numcontrato").val();
        $.ajax({
                type:"POST",
                url: "../../class/admin/agregarcaja.php",
                dataType:"text",
                data:{
                    fechacaja:fechacaja,
                    numfactura:numfactura,
                    numcaja:numcaja,
                    numcontrato:numcontrato,
                }
        }).done(function(data) {
            if(data=="false"){
                $('#error-factura').show();
                $('#numfacturacaja').addClass("has-error");
                $('#numfactura').focus();
            }
            else{
                $('#contenido').load('../../user/admin/agregarcajas.php');
            }
        });
 });
$("#nuevocliente2").submit(function(event){ 
        event.preventDefault(); 
        var nombre = $("#nombrecliente").val();
        var direccion = $("#direxcliente").val();
        var telefono =$("#phonecliente").val();
        var fax =$("#faxcliente").val();
        var email =$("#emailcliente").val();
        var web =$("#sitecliente").val();
        var otro =$("#otrocliente").val();
        $.ajax({
                type:"POST",
                url: "../../class/admin/agregarcliente.php",
                dataType:"text",
                data:{
                    nombre:nombre,
                    direccion:direccion,
                    telefono:telefono,
                    fax:fax,
                    email:email,
                    web:web,
                    otro:otro,
                }
        }).done(function(data) {

            $('#contenido').load('../../user/admin/nuevocliente.php'); 
        });
 });


$("#productonuevo").submit(function(event){ 
        event.preventDefault(); 
        var nombre = $("#nameproducto").val();
        var estado = $("#estado").val();
        var partida =$("#partida").val();
        var precio =$("#precio").val();
        
        $.ajax({
                type:"POST",
                url: "../../class/admin/agregarproducto.php",
                dataType:"text",
                data:{
                    nombre:nombre,
                    estado:estado,
                    partida:partida,
                    precio:precio,
                }
        }).done(function(data) {
            $('#contenido').load('../../user/admin/nuevoproducto.php'); 
        });
 });




$("#agregarproductoform").submit(function(event){ 
    event.preventDefault(); 
        var producto = $("#nombreproducto").val();
        $.ajax({
                type:"POST",
                url: "../../class/admin/buscarproductosbox.php",
                dataType:"text",
                data:{
                    producto:producto,
                }
        }).done(function(data) {
            $('#contenidoproductos').html(data);
        });   
 });

$("#reporte-caja").submit(function(event){ 
    event.preventDefault(); 
        var factura = $("#factura").val();
        var contrato = $("#contrato").val();
        var caja = $("#caja").val();
        $.ajax({
                type:"POST",
                url: "../../class/admin/buscarreportecaja.php",
                dataType:"text",
                data:{
                    dato1:factura,
                    dato2:contrato,
                    dato3:caja,
                }
        }).done(function(data) {
            $('#probando').show();
            $('#report').html(data);
        });   
 });



$('#reloadproductos').click(function(){
    $('#contenido').load('../../user/admin/agregarcajas.php');
});


function agregar(id)
{
    var idproducto = id;  
    $.ajax({
            type:"POST",
            url: "../../class/admin/detalleproductobox.php",
            dataType:"text",
            data:{
                idproducto:idproducto,
            }
    }).done(function(data) {
        $('#resulproductos').html(data);
    });
    $("#producmodal").modal();
}

$("#agregarproductobox").submit(function(event){ 
    event.preventDefault();
    var idcaja = $("#idcajabox").val(); 
    var idproducto = $("#idproductobox").val();
    var precioproducto = $("#precioproductobox").val();
    var cantidadproducto = $("#cantidadproductobox").val();
    $.ajax({
            type:"POST",
            url: "../../class/admin/agregarproductobox.php",
            dataType:"text",
            data:{
                idcaja:idcaja,
                idproducto:idproducto,
                precioproducto:precioproducto,
                cantidadproducto:cantidadproducto
            }
    }).done(function(data) {
        $('#contenido').load('../../user/admin/agregarcajas.php');
    });
    $('#producmodal').modal('hide'); 
 });
