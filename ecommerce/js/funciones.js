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
                "cantidad" : cantidad,
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
                                                '<td><button type="button" class="close" aria-label="Close" onClick="eliminardeCarrito('+value.idJuego+')">'+
                                               '<span aria-hidden="true">&times;</span></button></td></tr>   ';
                            $("#contenidoCarrito table tbody").append(elemento);
                       });                            
                       
                    }
                    
                }
        });
}

function cerrarSesion(){
    $.ajax({
        url: '../php/salir.php',
        type: 'post',
        success: function(response){
            if(response){
                console.log("slir");
                window.location.href="../html/login.php";
            }
        }
    });
}

function pagarCarrito(){
    window.location.href = "../php/server.php";
}

function buscarjuego(juego){
    var juegonombre = juego;
    realizabuscar(juegonombre);
}

function realizabuscar(juegonombre){
    var parametros = {
                "nombre" : juegonombre
            };
        $.ajax({
                data:  parametros,
                url:   '../php/buscarjuego.php',
                type:  'post',
                success:  function (response) {
                    if(response){

                        $("#catalogo").empty();

                       $.each(JSON.parse(response), function(index, value){

                            var elemento =     '<div class="col-sm-4 panelJuego" id="divJuego'+value.idJuego+'">'+
                                                '<div class="panel panel-default">'+
                                                '<div class="panel-heading">'+value.nombreJuego+'</div>'+
                                                '<div class="panel-body">'+
                                               '<img data-toggle="modal" data-target="#myModal" src="'+value.url+'" alt="The Last Of Us" width="300" height="300"></img>'+
                                               '</div>'+
                                               '<div class="panel-footer">'+
                                               '<div class="row">'+
                                               '<div class="col-xs-5">Cantidad : <input type="number" class="form-control  cantidad" min="0" max="10" oninput="validity.valid||(value="");"></div>'+//ESTA LINEA DA ERROR AL TRATAR DE MANDAR AL CARRITO
                                               '<div class="col-xs-5">Precio: </br>'+value.precio+'</div>'+
                                               '<div class="col-xs-2"></br><span onclick="agregarACarrito('+value.idJuego+');" class="glyphicon glyphicon-shopping-cart"></span></div>'+
                                               '</div>'+
                                               '</div>'+
                                               '</div>'+
                                               '</div>'+
                                               '</div>';
                                                $("#catalogo").append(elemento);
                       });                            
                       
                    }
                    
                }
        });
}


function eliminardeCarrito(idJuego){//obtiene el id del producto en el carritp y lo envia al ajax 
  var id = idJuego;
  //console.log(id);
  eliminacarrito(id);
}


function eliminacarrito(id){
        var parametros = {
                "idJuego" : id,
               
        };
        $.ajax({
                data:  parametros,
                url:   '../php/eliminarcarrito.php', 
                type:  'post',
                // beforeSend: function () {
                //         $("#resultado").html("Procesando, espere por favor...");
                // },
                success:  function (response) {
                    //console.log(response);
                    if(response){
                        $("#contenidoCarrito table tbody").empty();

                       $.each(JSON.parse(response), function(index, value){
                            var elemento = '<tr><td>'+value.nombreJuego+'</td><td>'+value.cantidad+'</td>'+
                                                '<td>'+(value.cantidad * value.precio)+'</td>'+
                                                //'<td>'+value.subtotal+'</td>'+
                                                '<td><button type="button" class="close" aria-label="Close" onClick="eliminardeCarrito('+value.idJuego+')">'+
                                               '<span aria-hidden="true">&times;</span></button></td></tr>   ';
                            $("#contenidoCarrito table tbody").append(elemento);
                       });                            
                       
                    }
                    
                }
        });
}

function paginacion(numeroPagina){

        window.location.href = "../php/paginacion.php?numeroPagina="+numeroPagina;
        
}


