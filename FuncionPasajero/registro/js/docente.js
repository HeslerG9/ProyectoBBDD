//llenar las opciones de las carreras con la base de datos
$.ajax({
    url: "php/carreras.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-carrera").append(
                `<option value="${respuesta[i].carrera}">${respuesta[i].nombre}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});


// Example starter JavaScript for disabling form submissions if there are invalid fields
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
                    //console.log("tamos mal :c");
                } else {
                    //console.log("tamos bien");
                    var parametros = $("#formulario-docente").serialize();
                    console.log(parametros);

                    $.ajax({
                        url: "php/registrar.php?opcion=2",
                        method: "POST",
                        dataType: "text",
                        data: parametros,
                        success: function (respuesta) {
                            limpiar();
                            alert("registrado"); 
                            console.log(respuesta);
                        },
                        error: function (error) {
                            console.log(error);
                            limpiar();
                            alert("error al registrar datos"); 
                        
                        }
                    });
                }
                
            }, false);
        });
    }, false);
})();

$("#formulario-docente").submit(function () {
    return false;
});

function limpiar() {
    $("#primer-nombre").val("");
    $("#segundo-nombre").val("");
    $("#primer-apellido").val("");
    $("#segundo-apellido").val("");
    $("#fecha-nacimiento").val("");
    $("#numero-cuenta").val("");
    $("#nivel-academico").val("");
    $("#contraseña").val("");
    $("#seleccion-carrera").val("");
    $("#contrato").val("");
    $("#numero-identidad").val("");
    $("#email").val("");

    $("#formulario-docente").removeClass('was-validated');
}