function actualizar() {
    $.ajax({
        url: "php/administrar.php?opcion=1",
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            if(respuesta.estadomatricula==1){
                $("#btn-estadomatricula").removeClass('btn-outline-success');
                $("#btn-estadomatricula").addClass('btn-outline-danger');
                $("#btn-estadomatricula").html("Desactivar matricula");
                $("#estadomatricula").html(
                    
                    "Activo"
                );
            }else{
                $("#btn-estadomatricula").removeClass('btn-outline-danger');
                $("#btn-estadomatricula").addClass('btn-outline-success');
                $("#btn-estadomatricula").html("Activar matricula");
                $("#estadomatricula").html(
                    "Desactivado"
                );
            }
            if(respuesta.estadosubirnotas==1){
                $("#btn-estadosubirnotas").removeClass('btn-outline-success');
                $("#btn-estadosubirnotas").addClass('btn-outline-danger');
                $("#btn-estadosubirnotas").html("Desactivar subir notas");
                $("#estadosubirnotas").html(
                    "Activo"
                );
            }else{
                $("#btn-estadosubirnotas").removeClass('btn-outline-danger');
                $("#btn-estadosubirnotas").addClass('btn-outline-success');
                $("#btn-estadosubirnotas").html("Activar subir notas");
                $("#estadosubirnotas").html(
                    
                    "Desactivado"
                );
            }
            
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function matricula(){
    var texto = $("#estadomatricula").text();
    var pam;
    if(texto=="Desactivado"){pam="1";}else{pam="0";}

   
    console.log(pam);
    
    $.ajax({
        url: "php/administrar.php?opcion=2&dato="+pam,
        dataType: "text",
        success: function(respuesta) {
            console.log(respuesta);
            actualizar();
        },
        error: function(error) {
            console.log(error);
        }
    });

}

function notas(){
    var texto = $("#estadosubirnotas").text();
    var pam;
    if(texto=="Desactivado"){pam="1";}else{pam="0";}
    $.ajax({
        url: "php/administrar.php?opcion=3&dato="+pam,
        dataType: "text",
        success: function(respuesta) {
            console.log(respuesta);
            actualizar();
        },
        error: function(error) {
            console.log(error);
        }
    });

}

function terminarperiodo(){
    $.ajax({
        url: "php/administrar.php?opcion=4",
        dataType: "text",
        success: function(respuesta) {
            console.log(respuesta);
            alert("El periodo a finalizado con exito.");
        },
        error: function(error) {
            console.log(error);
        }
    });

}



$(document).ready(function() {
    $("#op4").attr("class", "nav-link active");
    actualizar();

    
});