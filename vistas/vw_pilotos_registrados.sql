create or replace view vw_pilotos_registrados as
select pi.idpiloto,pe.pnombre,pe.papellido,pe.correoelectronico,pe.numeroidentidad,pa.nombre,pi.fechaingreso,pi.cantidadhorasvuelo from persona pe
inner join piloto pi on pi.persona_idpersona=pe.idpersona
inner join pais pa on pa.idpais=pe.pais_idpais 