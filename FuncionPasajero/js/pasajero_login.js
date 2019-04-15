$('#cerrar_sesion').click(function(){
    $.ajax({
        url: "ajax/cerrar-sesion.php",
        dataType: "text",
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta=="1"){
                window.location.href = "../Landingpage/index.php";
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});