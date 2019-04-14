/* Lista de Estudiantes */
$.ajax({
    url:"ajax/ListaEstudiantes.php?opcion=1",
    method:"GET",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        for (var i=0;i<respuesta.length;i++){
            $("#div-table-student").append(
                 ` <div class="div-table-row div-table-row-list">
                <div class="div-table-cell" style="width: 5%;">${respuesta[i].NumCta}</div>
                <div class="div-table-cell" style="width: 12%;">${respuesta[i].Carrera}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].NombreAlumno}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].ApellidoAlumno}</div>
                <div class="div-table-cell" style="width: 11%;">${respuesta[i].CorreoAlumno}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].TelAlumno}</div>
                <div class="div-table-cell" style="width: 11%;">${respuesta[i].FechaNac}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].CentroEstudio}</div>
                <div class="div-table-cell" style="width: 6%;">
                    <button class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></button>
                </div>
                <div class="div-table-cell" style="width: 6%;">
                    <button class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
                    </div>
                    </div>
                </div>`
            );
        }

    },
    error:function(error){
        console.error(error);
        $("#tweets").append(error.responseText);
    }
});

/* Lista de Carreras */
$.ajax({
    url:"ajax/ListaCarreras.php?opcion=1",
    method:"GET",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        for (var i=0;i<respuesta.length;i++){
            $("#div-table-carreras").append(
                `<div   class="div-table-row div-table-row-list">
                 <div class="div-table-cell" style="width: 9%;">${respuesta[i].codigoCarrera}</div>
                <div class="div-table-cell" style="width: 25%;">${respuesta[i].nombreCarrera}</div>
                <div class="div-table-cell" style="width: 14%;">${respuesta[i].cantidadAsignaturas}</div>
                <div class="div-table-cell" style="width: 13%;">${respuesta[i].cantidadUv}</div>
                <div class="div-table-cell" style="width: 20%;">${respuesta[i].codigoFacultad}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].grado}</div>
            <div class="div-table-cell" style="width: 8%;">
                <button class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
            </div>
        </div>
  
</div>`
            );
        }

    },
    error:function(error){
        console.error(error);
        $("#tweets").append(error.responseText);
    }
});

/* Lista de Docentes */
$.ajax({
    url:"ajax/ListaDocentes.php?opcion=1",
    method:"GET",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        for (var i=0;i<respuesta.length;i++){
            $("#div-table-docentes").append(
                `<div class="div-table-row div-table-row-list">
                <div class="div-table-cell" style="width: 5%;">${respuesta[i].NumDoc}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].NombreDoc}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].ApellidoDoc}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].CorreoDoc}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].TelDoc}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].CentroDoc}</div>
                <div class="div-table-cell" style="width: 12%;">${respuesta[i].CarreraDoc}</div>
                <div class="div-table-cell" style="width: 12%;">${respuesta[i].CarreraDoc}</div>
                <div class="div-table-cell" style="width: 6%;">
                    <button class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
                </div>
            </div>
        </div>
    </div>`
            );
        }

    },
    error:function(error){
        console.error(error);

    }
});
/* Lista de Asignaturas */
$.ajax({
    url:"ajax/ListaAsignaturas.php?opcion=1",
    method:"GET",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        for (var i=0;i<respuesta.length;i++){
            $("#div-table-asignaturas").append(
                `  <div class="div-table-row div-table-row-list">
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].seccion}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].HoraInicio}</div>
                <div class="div-table-cell" style="width: 10%;">${respuesta[i].HoraFinal}</div>
                <div class="div-table-cell" style="width: 13%;">${respuesta[i].Dias}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].Cupos}</div>
                <div class="div-table-cell" style="width: 9%;">${respuesta[i].Aula}</div>
                <div class="div-table-cell" style="width: 15%;">${respuesta[i].Asignatura}</div>
                <div class="div-table-cell" style="width: 15%;">${respuesta[i].Maestro}</div>
                <div class="div-table-cell" style="width: 8%;">
                    <button class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
                </div>
            </div>
        </div>`
            );
        }

    },
    error:function(error){
        console.error(error);

    }
});
/* Lista de Admin */
$.ajax({
    url:"ajax/ListaAdmins.php?opcion=1",
    method:"GET",
    dataType:"json",
    success:function(respuesta){
        console.log(respuesta);
        for (var i=0;i<respuesta.length;i++){
            $("#div-table-admins").append(
                ` <div class="div-table-row div-table-row-list">
                <div class="div-table-cell" style="width: 6%;">${respuesta[i].NumeroEmpleado}</div>
                <div class="div-table-cell" style="width: 12%;">${respuesta[i].NumeroID}</div>
                <div class="div-table-cell" style="width: 15%;">${respuesta[i].Nombres}s</div>
                <div class="div-table-cell" style="width: 15%;">${respuesta[i].Apellidos}s</div>
                <div class="div-table-cell" style="width: 12%;">${respuesta[i].correo}</div>
                <div class="div-table-cell" style="width: 11%;">${respuesta[i].FechaNacimiento}</div>
            <div class="div-table-cell" style="width: 7%;">
                <button class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
            </div>`
            );
        }

    },
    error:function(error){
        console.error(error);

    }
});



$("#search").on("keyup", function() {
    var value = $(this).val();

    $("div-table-row").each(function(index) {
        if (index != 0) {

            $row = $(this);

            var id = $row.find("div-table-cell:first").text();

            if (id.indexOf(value) != 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        }
    });
});
