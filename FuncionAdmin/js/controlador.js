$.ajax({
    url:"ajax/pasajeros.php",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i=0;i<respuesta.total;i++){
            $("#tabla_pasajero").append(
                 ` <tr>
                 <th>${respuesta[i].id}</span></th>
                 <th>${respuesta[i].pnombre}</th>
                 <th>${respuesta[i].papellido}</th>
                 <th>${respuesta[i].correoelectronico}</th>
                 <th>${respuesta[i].numeroidentidad}</th>
                 <th>${respuesta[i].nombre}</th>
                 <th>${respuesta[i].fecharegistro}</th>
             </tr>`
            );
        }

    },
    error:function(error){
        console.error(error);
    }
});

/* LISTA DE PILOTOS */
$.ajax({
    url:"ajax/pilotos.php",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i=0;i<respuesta.total;i++){
            $("#tabla_piloto").append(
                 ` <tr>
                 <th>${respuesta[i].id}</span></th>
                 <th>${respuesta[i].pnombre}</th>
                 <th>${respuesta[i].papellido}</th>
                 <th>${respuesta[i].correoelectronico}</th>
                 <th>${respuesta[i].numeroidentidad}</th>
                 <th>${respuesta[i].nombre}</th>
                 <th>${respuesta[i].fecharegistro}</th>
                 <th>${respuesta[i].cantidadhorasvuelo}</th>
             </tr>`
            );
        }

    },
    error:function(error){
        console.error(error);
    }
});

/* LISTA DE EMPLEADOS */
$.ajax({
    url:"ajax/empleados.php",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i=0;i<respuesta.total;i++){
            $("#tabla_empleado").append(
                 ` <tr>
                 <th>${respuesta[i].id}</span></th>
                 <th>${respuesta[i].pnombre}</th>
                 <th>${respuesta[i].papellido}</th>
                 <th>${respuesta[i].correoelectronico}</th>
                 <th>${respuesta[i].numeroidentidad}</th>
                 <th>${respuesta[i].nombre}</th>
                 <th>${respuesta[i].fechacontratacion}</th>
                 <th>${respuesta[i].sueldo}</th>
                 <th>${respuesta[i].descripcion}</th>
             </tr>`
            );
        }

    },
    error:function(error){
        console.error(error);
    }
});
