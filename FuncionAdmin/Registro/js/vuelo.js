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
    if(num_escala<=5 && num_escala>=0){
        $("#escalas").html(
            ``
        );
        for (var i = 0; i < num_escala; i++) {
            $("#escalas").append(
                `<div id="escala-${i+1}" class="col-md-12 mb-3 border">
                    <p>Escala ${i+1}:</p>
                    <div class="col-md-12 mb-3">
                        <label for="pais-escala">Pais Escala:</label>
                        <select onchange="llenaraeropuertoEscala(${i+1})" class="form-control" name="pais-escala-${i+1}" id="seleccion-pais-escala-${i+1}" required>
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback">
                            Se requiere un Pais Escala válido.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="aeropuerto-escala">Aeropuerto escala:</label>
                        <select onchange="llenarterminalEscala(${i+1})" class="form-control" name="aeropuerto-escala-${i+1}" id="seleccion-aeropuerto-escala-${i+1}" required>
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback">
                            Se requiere un aeropuerto escala válido.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="terminal-escala">Terminal escala:</label>
                        <select onchange="llenarpuertaEscala(${i+1})" class="form-control" name="terminal-escala-${i+1}" id="seleccion-terminal-escala-${i+1}" required>
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback">
                            Se requiere un terminal escala válido.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="puerta-escala">Puerta escala:</label>
                        <select class="form-control" name="puerta-escala-${i+1}" id="seleccion-puerta-escala-${i+1}" required>
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback">
                            Se requiere un puerta escala válido.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="primer-nombre">Fecha-hora llegada:</label>
                        <input type="datetime" class="form-control" name="fecha-hora-llegada-escala-${i+1}" id="fecha-hora-llegada-escala-${i+1}"
                            placeholder="1999-01-08 04:05:06" required>
                        <div class="invalid-feedback">
                            Se requiere un fecha y hora llegada válido.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="primer-nombre">Fecha y hora de salida:</label>
                        <input type="datetime" class="form-control" name="fecha-hora-salida-escala-${i+1}" id="fecha-hora-salida-escala-${i+1}"
                            placeholder="1999-01-08 04:05:06" required>
                        <div class="invalid-feedback">
                            Se requiere un fecha y hora salida válido.
                        </div>
                    </div>

                </div>`
            );

            llenarEscala(num_escala);
        }
    }else{
        $("#escalas").html(
            `<p class='text-danger'>Solo se permiten de 0 a 5 escalas.</p>`
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
                            alert(respuesta.Mensaje1+', '+respuesta.Mensaje2+', '+respuesta.Mensaje3);
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

function llenarEscala(cant_escala) {
    $.ajax({
        url: "registro/php/pais.php",
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            for (var i = 0; i < respuesta.total; i++) {
                for(var j=1;j<=cant_escala;j++){
                    $("#seleccion-pais-escala-"+j).append(
                        `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                    );
                }
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function llenaraeropuertoEscala(escala){
    var parametros="pais="+$("#seleccion-pais-escala-"+escala).val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/aeropuerto.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-aeropuerto-escala-"+escala).html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-aeropuerto-escala-"+escala).append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function llenarterminalEscala(escala){
    var parametros="aeropuerto="+$("#seleccion-aeropuerto-escala-"+escala).val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/terminal.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-terminal-escala-"+escala).html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-terminal-escala-"+escala).append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function llenarpuertaEscala(escala){
    var parametros="terminal="+$("#seleccion-terminal-escala-"+escala).val();
    //alert(parametros);
    $.ajax({
        url: "registro/php/puerta.php",
        method: "POST",
        data:parametros,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
            $("#seleccion-puerta-escala-"+escala).html(
                `<option value=""></option>`
            );
            for (var i = 0; i < respuesta.total; i++) {
                $("#seleccion-puerta-escala-"+escala).append(
                    `<option value="${respuesta[i].id}">${respuesta[i].nombre}</option>`
                );
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}