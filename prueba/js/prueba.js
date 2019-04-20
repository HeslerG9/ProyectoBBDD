
$("#btn-presione").click(function(){
    //var parametros="contenido="+$("#contenido").html();
    window.location.href = "otra.php?contenido="+$("#contenido").html();
    /* console.log(parametros);
    $.ajax({
        url: "ajax/prueba.php",
        method: "POST",
        dataType: "json",
        data: parametros,
        success: function (respuesta) {
            alert(respuesta.mensaje);
            console.log(respuesta.mensaje);
            window.location.href = "otra.php?contenido="+respuesta.mensaje;
        },
        error: function (error) {
            console.log(error);
            alert(error);
        }
    });  */
});