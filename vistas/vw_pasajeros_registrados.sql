create or replace view vw_pasajeros_registrados as
select pas.idpasajero,pe.pnombre,pe.papellido,pe.correoelectronico,pe.numeroidentidad,pa.nombre,pas.fecharegistro from persona pe
inner join pasajero pas on pas.persona_idpersona=pe.idpersona
inner join pais pa on pa.idpais=pe.pais_idpais 