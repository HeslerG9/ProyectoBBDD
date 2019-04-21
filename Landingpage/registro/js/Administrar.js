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
                 <th>${respuesta[i].cantidadescala}</th>
                 <th>${respuesta[i].horafechasalida}</th>
                 <th>${respuesta[i].horafechallegada}</th>
                 <th>${respuesta[i].piloto_idpiloto}</th>
                 <th>${respuesta[i].avion_idavion}</th>
                 <th>${respuesta[i].tipoclase_idtipoclase}</th>         
             </tr>`
            );
        }

    },
    error:function(error){
        console.error(error);
        $("#tweets").append(error.responseText);
    }
});