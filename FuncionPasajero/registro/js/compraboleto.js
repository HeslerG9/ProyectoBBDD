//llenar las opciones de las carreras con la base de datos
//paises
var parametros="idvuelo="+$("#idvuelo").html();
$.ajax({
    data:parametros,
    method:"POST",
    url: "registro/php/asientos.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-Asiento").append(
                `<option value="${respuesta[i].id}"><p>#${respuesta[i].numeroasiento}-${respuesta[i].ubicacion}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});
/* var parametros="idvuelo"=$("#alv").html(); */