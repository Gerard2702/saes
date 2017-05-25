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

$("#detallefactura").click(function(event){  
        $('#contenido').load('../../user/admin/crearcaja.php');
 });

$("#agregarcaja").click(function(event){ 
	$('#agregarcajadiv').addClass("active");
	$('#detallefacturadiv').removeClass("active");
 });