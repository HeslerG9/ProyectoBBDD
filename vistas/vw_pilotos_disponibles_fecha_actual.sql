--Vista para mostrar los pilotos disponibles para la fecha actual
CREATE OR REPLACE VIEW vw_pilotos_disponibles_fecha_actual as
SELECT pi.idpiloto,pe.pnombre||' '||pe.papellido nombre,pi.fechaingreso,pi.cantidadhorasvuelo,pi.persona_idpersona FROM piloto pi
INNER JOIN persona pe on pe.idpersona=pi.persona_idpersona
WHERE pi.idpiloto not in (SELECT pi.idpiloto FROM piloto pi
						INNER JOIN vuelo vu on vu.piloto_idpiloto=pi.idpiloto
						WHERE vu.horafechasalida<=CURRENT_DATE AND vu.horafechallegada>CURRENT_DATE);