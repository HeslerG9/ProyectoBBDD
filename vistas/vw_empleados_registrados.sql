create or replace view vw_empleados_registrados as
select e.idempleado,pe.pnombre,pe.papellido,pe.correoelectronico,pe.numeroidentidad,pa.nombre,e.fechacontratacion,che.sueldo,ca.descripcion from persona pe
inner join empleado e on e.persona_idpersona=pe.idpersona
inner join pais pa on pa.idpais=pe.pais_idpais 
inner join cargo_has_empleado che on che.empleado_idempleado=e.idempleado
inner join cargo ca on ca.idcargo=che.cargo_idcargo
