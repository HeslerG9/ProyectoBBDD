//llenar las opciones de las carreras con la base de datos
//paises
$.ajax({
    url: "registro/php/pais.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-pais-origen").append(
                `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
            );
            $("#seleccion-pais-destino").append(
                `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});

$("#seleccion-pais-origen").change(function(){
    var parametros="pais="+$("#seleccion-pais-origen").val();
    //alert(parametros);
/* Lista de vuelos */
$.ajax({
    url:"registro/php/vuelos.php",
    method: "POST",
    data:parametros,
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i=0;i<respuesta.total;i++){
            $("#tabla_vuelo").append(
                 ` <tr>
                 <th>${respuesta[i].id}</span></th>
                 <th>${respuesta[i].cantidadescala}</th>
                 <th>${respuesta[i].horafechasalida}</th>
                 <th>${respuesta[i].horafechallegada}</th>
                 <th>${respuesta[i].nombre}</th>
                 <th>${respuesta[i].avion_idavion}</th>
                 <th>${respuesta[i].tipoclase_idtipoclase}</th>
                 <th><button type="button" onclick="comprar_boleto(${respuesta[i].id})">Comprar boleto</button></th>            
             </tr>`
            );
        }

    },
    error:function(error){
        console.error(error);
    }
});

});

function comprar_boleto(idvuelo){
    window.location.href = "CompraBoleto.php?idvuelo="+idvuelo;
}