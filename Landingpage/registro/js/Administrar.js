/* Lista de Estudiantes */
$.ajax({
    url:"registro/php/vuelos.php",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i=0;i<respuesta.total;i++){
            $("#tabla_vuelo").append(
                 ` <tr>
                 <th>${respuesta[i].id}</th>
                 <th>${respuesta[i].cantidadescalas}</th>
                 <th>${respuesta[i].fechahorasalida}</th>
                 <th>${respuesta[i].fechahorallegada}</th>
                 <th>${respuesta[i].piloto_idpiloto}</th>
                 <th>${respuesta[i].avion_idavion}</th>
                 <th>${respuesta[i].TipoClase_idTipoClase}</th>         
             </tr>`
            );
        }

    },
    error:function(error){
        console.error(error);
        $("#tweets").append(error.responseText);
    }
});