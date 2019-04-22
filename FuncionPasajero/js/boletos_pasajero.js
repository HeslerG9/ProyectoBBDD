var parametros='idpasajero='+$("#idpasajero").html();

$.ajax({
    data:parametros,
    method:"POST",
    url: "ajax/boletos.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);

        if (respuesta.total>0){
            $("#tabla_info_boleto").removeClass("d-none");
            for (var i=0;i<respuesta.total;i++){
                $("#tabla_boleto").append(
                    ` <tr>
                        <th>${respuesta[i].fecha}</span></th>
                        <th>${respuesta[i].precio}</th>
                        <th>${respuesta[i].paiso}</th>
                        <th>${respuesta[i].paisd}</th>
                        <th>${respuesta[i].salida}</th>
                        <th>${respuesta[i].llegada}</th>
                    </tr>`
                );
            }
            $("#mensaje-no-registro").addClass("d-none");
        }else{
            $("#mensaje-no-registro").removeClass("d-none");
            $("#tabla_info_boleto").addClass("d-none");
        }
    },
    error: function(error) {
        console.log(error);
    }
});