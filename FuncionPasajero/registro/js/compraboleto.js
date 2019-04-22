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
(function () {
    'use strict';

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                    console.log("tamos mal :c");
                } else {
                    /* console.log("tamos bien"); */
                    var parametros = $("#formulario-compraboleto").serialize();
                    /* var parametros="idvuelo="+$("#idvuelo").html(); */
                    parametros+=parametros+"&idvuelo="+$("#idvuelo").html();
                    console.log(parametros);

                    $.ajax({
                        url: "registro/php/comprarboleto.php?opcion=1",
                        method: "POST",
                        dataType: "json",
                        data: parametros,
                        success: function (respuesta) {
                            /* alert("se registró"); */
                            alert(respuesta.Mensaje1+'. Total pagado: '+respuesta.Mensaje2);
                            limpiar();
                            console.log(respuesta);
                        },
                        error: function (error) {
                            console.log(error);
                            alert("error al registrar");
                            limpiar();
                        }
                    });
                }
                
            }, false);
        });
    }, false);
})();

$("#formulario-compraboleto").submit(function () {
    return false;
});

function limpiar() {
    $("#seleccion-Asiento").val("");
    $("#maletas").val("");


    $("#formulario-compraboleto").removeClass('was-validated');

}