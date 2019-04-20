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