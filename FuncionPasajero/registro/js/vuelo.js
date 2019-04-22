//llenar las opciones de las carreras con la base de datos
//paises
$.ajax({
    url: "registro/php/pais.php",
    dataType: "json",
    success: function (respuesta) {
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
    error: function (error) {
        console.log(error);
    }
});


$("#btn-buscar").click(function () {
    var parametros = "paiso=" + $("#seleccion-pais-origen").val()+"&paisd="+$("#seleccion-pais-destino").val();
    //alert(parametros);
    /* Lista de vuelos */
    $.ajax({
        url: "registro/php/vuelos.php",
        method: "POST",
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#tabla_vuelo").html(``);
            for (var i = 0; i < respuesta.total; i++) {
                $("#tabla_vuelo").append(
                    `<tr>
                        <th>${respuesta[i].paiso}</span></th>
                        <th>${respuesta[i].paisd}</th>
                        <th>${respuesta[i].ao}</th>
                        <th>${respuesta[i].ad}</th>
                        <th>${respuesta[i].cantidadescala}</th>
                        <th>${respuesta[i].fo}</th>
                        <th>${respuesta[i].fd}</th>
                        <th>${respuesta[i].tc}</th>
                        <th>${respuesta[i].precio}</th>
                        <th><button type="button" onclick="comprar_boleto(${respuesta[i].id})">Comprar boleto</button></th>            
                    </tr>`
                );
            }

        },
        error: function (error) {
            console.error(error);
        }
    });
});

function comprar_boleto(idvuelo) {
    window.location.href = "CompraBoleto.php?idvuelo=" + idvuelo;
}