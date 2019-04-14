$("#btn-registrarCarrera").click(function(){
	$("#btn-registrarCarrera").trigger("reset");
	var parametros=
				"codigoCarrera="+$("#codigoCarrera").val()+"&"+
				"codigoCE="+$("#codigoCE").val()+"&"+
				"nombreCarrera="+$("#nombreCarrera").val()+"&"+
				"codigoFacultad="+$("#codigoFacultad").val()+"&"+
				"codigoDepartamento="+$("#codigoDepartamento").val()+"&"+
				"cantidadAsignaturas="+$("#cantidadAsignaturas").val()+"&"+
				"cantidadUv="+$("#cantidadUv").val()+"&"+
				"grado="+$("#grado").val();
	alert("parametros a enviar " + parametros);
	alert("Se ha guardado con Exito la nueva carrera");
   console.log(parametros)
   $.ajax({
	url:"ajax/procesar-registroCarrera.php?accion=1",
	data:parametros,
	method:"POST",
	dataType:"json",
	success:function(respuesta){
		console.log(respuesta);
		//alert("Codigo: " + respuesta.codigo_resultado);
		//alert("Mensaje: " + respuesta.mensaje);
		/* if (respuesta.codigo_resultado==0)
			$("#resultado").html('<div class="bg-danger"> '+respuesta.mensaje+"</div>");
		if (respuesta.codigo_resultado==1)
			$("#resultado").html('<div class="bg-success"> '+respuesta.mensaje+"</div>");
		$("#btn-registrar").button("reset"); */
		
	}
});
});

$("#btn-registrarAsignatura").click(function(){
	$("#btn-registrarAsignatura").trigger("reset");
	var parametros=
				"seccion="+$("#seccion").val()+"&"+
				"HoraInicio="+$("#HoraInicio").val()+"&"+
				"HoraFinal="+$("#HoraFinal").val()+"&"+
				"Dias="+$("#Dias").val()+"&"+
				"Cupos="+$("#Cupos").val()+"&"+
				"Aula="+$("#Aula").val()+"&"+
				"Asignatura="+$("#Asignatura").val()+"&"+
				"Maestro="+$("#Maestro").val();
	alert("parametros a enviar " + parametros);
	alert("Se ha guardado con Exito la nueva Asignatura");
   console.log(parametros)
   $.ajax({
	url:"ajax/procesar-registroAsignatura.php?accion=1",
	data:parametros,
	method:"POST",
	dataType:"json",
	success:function(respuesta){
		console.log(respuesta);
	
	}
});
});


$("#btn-registrarAula").click(function(){
	$("#btn-registrarAula").trigger("reset");
	var parametros=
				"edificio="+$("#edificio").val()+"&"+
				"NumeroAula="+$("#NumeroAula").val();
	alert("parametros a enviar " + parametros);
	alert("Se ha guardado con Exito la nueva Aula");
   console.log(parametros)
   $.ajax({
	url:"ajax/procesar-registroAula.php?accion=1",
	data:parametros,
	method:"POST",
	dataType:"json",
	success:function(respuesta){
		console.log(respuesta);
	
	}
});
});


 $("#btn-registrarAdmin").click(function(){
$("#btn-registrarAdmin").trigger("reset");
	
	var parametros=
				"NumeroEmpleado="+$("#NumeroEmpleado").val()+"&"+
				"Nombres="+$("#Nombres").val()+"&"+
				"Apellidos="+$("#Apellidos").val()+"&"+
				"NumeroID="+$("#NumeroID").val()+"&"+

				"correo="+$("#correo").val()+"&"+
				"FechaNacimiento="+$("#FechaNacimiento").val()+"&"+
				"Contrasena="+$("#Contrasena").val()+"&"+
				"TipoUsuario="+$("#TipoUsuario").val();
	alert("parametros a enviar " + parametros);
	alert("Se ha guardado con exito un nuevo admin");
   console.log(parametros)
   $.ajax({
	url:"ajax/procesar-registroAdmin.php?accion=1",
	data:parametros,
	method:"POST",
	dataType:"json",
	success:function(respuesta){
		console.log(respuesta);
	
	}
});
}); 
$("#btn-registrarEstudiante").click(function(){
$("#btn-registrarEstudiante").trigger("reset");
	
var parametros=
				"NombreAlumno="+$("#NombreAlumno").val()+"&"+
				"ApellidoAlumno="+$("#ApellidoAlumno").val()+"&"+
				"CorreoAlumno="+$("#CorreoAlumno").val()+"&"+
				"TelAlumno="+$("#TelAlumno").val()+"&"+
				"ContraAlumno="+$("#ContraAlumno").val()+"&"+
				"NumCta="+$("#NumCta").val()+"&"+
				"FechaIngreso="+$("#FechaIngreso").val()+"&"+
				"FechaNac="+$("#FechaNac").val()+"&"+
				"CentroEstudio="+$("#CentroEstudio").val()+"&"+
				"Carrera="+$("#Carrera").val();
	alert("parametros a enviar " + parametros);
	alert("Se ha guardado con exito un nuevo estudiante");
   console.log(parametros)
   $.ajax({
	url:"ajax/procesar-registroEstudiante.php?accion=1",
	data:parametros,
	method:"POST",
	dataType:"json",
	success:function(respuesta){
		console.log(respuesta);
	
	}
});
});

$("#btn-registrarDocente").click(function(){
	$("#btn-registrarDocente").trigger("reset");
		
	var parametros=
					"NombreDoc="+$("#NombreDoc").val()+"&"+
					"ApellidoDoc="+$("#ApellidoDoc").val()+"&"+
					"CorreoDoc="+$("#CorreoDoc").val()+"&"+
					"TelDoc="+$("#TelDoc").val()+"&"+
					"NumDoc="+$("#NumDoc").val()+"&"+
					"FechaNaDoc="+$("#FechaNaDoc").val()+"&"+
					"CarreraDoc="+$("#CarreraDoc").val()+"&"+
					"ContraDoc="+$("#ContraDoc").val()+"&"+
					"CentroDoc="+$("#CentroDoc").val();
		alert("parametros a enviar " + parametros);
		alert("Se ha guardado con exito un nuevo docente");
	   console.log(parametros)
	   $.ajax({
		url:"ajax/procesar-registroDocente.php?accion=1",
		data:parametros,
		method:"POST",
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
		
		}
	});
	});

	$("#btn-registrarEmpleado").click(function(){
		$("#btn-registrarEmpleado").trigger("reset");
			
		var parametros=
						"NombreEmp="+$("#NombreEmp").val()+"&"+
						"ApellidoEmp="+$("#ApellidoEmp").val()+"&"+
						"ContraEmp="+$("#ContraEmp").val()+"&"+
						"NumEmp="+$("#NumEmp").val()+"&"+
						"CorreoEmp="+$("#CorreoEmp").val()+"&"+
						"FechaNaEmp="+$("#FechaNaEmp").val()+"&"+
						"PuestoEmp="+$("#PuestoEmp").val();
			alert("parametros a enviar " + parametros);
			alert("Se ha guardado con exito un nuevo empleado");
		   console.log(parametros)
		   $.ajax({
			url:"ajax/procesar-registroEmpleado.php?accion=1",
			data:parametros,
			method:"POST",
			dataType:"json",
			success:function(respuesta){
				console.log(respuesta);
			
			}
		});
		});


