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
                       console.log(response);
                }
        });
}