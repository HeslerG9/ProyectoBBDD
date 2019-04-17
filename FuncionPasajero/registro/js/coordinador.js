$(document).ready(function() {
    $("#op3").attr("class", "nav-link active");

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
    
    //una vez se selecciona una carrera se buscan los docentes asignados en dicha carrera
    $("#seleccion-carrera").change(function() {
        if ($("#seleccion-carrera").val() == "") {
            $("#seleccion-docente").html(
                `<option value=""></option>`
            );
            alert("seleccione una opcion");
        } else {
            var parametro=`carrera=${$("#seleccion-carrera").val()}`;
            console.log(parametro);
            $.ajax({
                url: "php/docentes.php",
                method:"POST",
                data: parametro,
                dataType: "json",
                success: function(respuesta) {
                    console.log(respuesta);
                    //console.log(respuesta["total"]);
                    $("#seleccion-docente").html(
                        `<option value=""></option>`
                    );
                    for (var i = 0; i < respuesta["total"]; i++) {
                        $("#seleccion-docente").append(
                            `<option value="${respuesta[i].n_empleado}">${respuesta[i].nombre}</option>`
                        );
                    }
                },
                error: function(error) {
                    console.log("No hay registros");
                    $("#seleccion-docente").html(
                        `<option value=""></option>`
                    );
                    alert("No hay docentes disponibles para esta carrera.");
                }
            });
        }
    });
});



(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    //console.log("tamos mal :c");
                    form.classList.add('was-validated');
                } else {
                    //console.log("tamos bien");
                    var parametros = $("#formulario-coordinador").serialize();
                    console.log(parametros);
                    $.ajax({
                        url: "php/registrar.php?opcion=3",
                        method: "POST",
                        dataType: "text",
                        data: parametros,
                        success: function (respuesta) {
                            limpiar();
                            alert("Se asignó el coordinador correctamente.");
                            console.log(respuesta);
                        },
                        error: function (error) {
                            console.log(error);
                            limpiar();
                            alert("No se pudo asignar el coordinador");
                        }
                    });

                }
                
            }, false);
        });
    }, false);
})();

$("#formulario-coordinador").submit(function () {
    return false;
});


function limpiar() {
    $("#seleccion-carrera").val("");
    $("#seleccion-docente").val("");
    $("#formulario-coordinador").removeClass('was-validated');
}