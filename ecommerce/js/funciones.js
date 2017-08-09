$(document).ready(function(){
	$("#carritoCompra").click(function(){
		if($("#contenidoCarrito").css('display') == 'none'){
			$("#contenidoCarrito").css('display','block');
		}else{
			$("#contenidoCarrito").css('display','none');
		}
	});

});


function agregarACarrito(id){

	var idJuego = id;
	var cantidad= $("#divJuego"+idJuego+" .panel-footer .cantidad").val();
	realizaProceso(idJuego,cantidad);


}

function realizaProceso(idJuego, cantidad){
        var parametros = {
                "idJuego" : idJuego,
                "cantidad" : cantidad
        };
        $.ajax({
                data:  parametros,
                url:   '../php/generacionCarrito.php',
                type:  'post',
                // beforeSend: function () {
                //         $("#resultado").html("Procesando, espere por favor...");
                // },
                success:  function (response) {
                    if(response){
                        $("#contenidoCarrito table tbody").empty();

                       $.each(JSON.parse(response), function(index, value){
                            var elemento = '<tr><td>'+value.nombreJuego+'</td><td>'+value.cantidad+'</td>'+
                                                '<td>'+(value.cantidad * value.precio)+'</td>'+
                                                '<td><button type="button" class="close" aria-label="Close">'+
                                               '<span aria-hidden="true">&times;</span></button></td></tr>   ';
                            $("#contenidoCarrito table tbody").append(elemento);
                       });                            
                       
                    }
                    
                }
        });
}