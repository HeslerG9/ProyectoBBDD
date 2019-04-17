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
//aeropuertos
$("#seleccion-pais-origen").change(function(){
    var parametros="pais="+$("#seleccion-pais-origen").val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/aeropuerto.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-aeropuerto-origen").html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-aeropuerto-origen").append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});
$("#seleccion-pais-destino").change(function(){
    var parametros="pais="+$("#seleccion-pais-destino").val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/aeropuerto.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-aeropuerto-destino").html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-aeropuerto-destino").append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});
//terminales
$("#seleccion-aeropuerto-origen").change(function(){
    var parametros="aeropuerto="+$("#seleccion-aeropuerto-origen").val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/terminal.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-terminal-origen").html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-terminal-origen").append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});
$("#seleccion-aeropuerto-destino").change(function(){
    var parametros="aeropuerto="+$("#seleccion-aeropuerto-destino").val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/terminal.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-terminal-destino").html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-terminal-destino").append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});
//puertas
$("#seleccion-terminal-origen").change(function(){
    var parametros="terminal="+$("#seleccion-terminal-origen").val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/puerta.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-puerta-origen").html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-puerta-origen").append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});
$("#seleccion-terminal-destino").change(function(){
    var parametros="terminal="+$("#seleccion-terminal-destino").val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/puerta.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-puerta-destino").html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-puerta-destino").append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});
//aviones
$.ajax({
    url: "registro/php/aviones.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-avion").append(
                `<option value="${respuesta[i].id}">${respuesta[i].nombre} capacidad:${respuesta[i].capacidad}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});
//clase
$.ajax({
    url: "registro/php/clase.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-clase").append(
                `<option value="${respuesta[i].id}">${respuesta[i].nombre} maletas:${respuesta[i].maleta}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});
//pilotos
$.ajax({
    url: "registro/php/pilotos.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#seleccion-piloto").append(
                `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});

//ESCALAS
$("#numero-escala").change(function(){
    var num_escala=$("#numero-escala").val();
    $("#escalas").html(
        ``
    );
    for (var i = 0; i < num_escala; i++) {
        $("#escalas").append(
            `<p>Escala ${i+1}</p>`
        );
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
                    console.log("tamos mal :c");
                } else {
                    /* console.log("tamos bien"); */
                    var parametros = $("#formulario-vuelo").serialize();
                    console.log(parametros);

                    $.ajax({
                        url: "registro/php/registrarVuelo.php?opcion=1",
                        method: "POST",
                        dataType: "json",
                        data: parametros,
                        success: function (respuesta) {
                            /* alert("se registró"); */
                            alert(respuesta.Mensaje1+', '+respuesta.Mensaje2);
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

$("#formulario-vuelo").submit(function () {
    return false;
});

function limpiar() {
    $("#primer-nombre").val("");
    $("#segundo-nombre").val("");
    $("#primer-apellido").val("");
    $("#segundo-apellido").val("");
    /* $("#fecha-nacimiento").val(""); */
    $("#direccion").val("");
    $("#numero-cuenta").val("");
    $("#pais").val("");
    $("#numero-identidad").val("");
    $("#email").val("");

    $("#formulario-vuelo").removeClass('was-validated');

}