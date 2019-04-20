//llenar las opciones de las carreras con la base de datos
//paises

$.ajax({
    url: "registro/php/asientos.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-Asiento").append(
                `<option value="${respuesta[i].id}">${respuesta[i].numeroasiento}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});
/* var parametros="idvuelo"=$("#alv").html(); */