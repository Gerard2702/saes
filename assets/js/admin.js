$("#nuevafactura").submit(function(event){ 
        event.preventDefault(); 
        var fecha = $("#fechafactura").val();
        var cliente = $("#clientes").val();
  		$.ajax({
                type:"POST",
                url: "../../class/admin/agregarfactura.php",
                dataType:"text",
                data:{
                    fecha:fecha,
                    cliente:cliente,
                }
        }).done(function(data) {
            $('#contenido').load('../../user/admin/crearcaja.php');	
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




$("#detallefactura").click(function(event){  
        $('#contenido').load('../../user/admin/crearcaja.php');
 });

$("#agregarcaja").click(function(event){ 
	$('#agregarcajadiv').addClass("active");
	$('#detallefacturadiv').removeClass("active");
 });
