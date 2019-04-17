--Vista para mostrar los aviones disponibles para la fecha actual
CREATE OR REPLACE VIEW vw_aviones_disponibles_fecha_actual as
SELECT av.* FROM avion av
WHERE av.idavion not in (SELECT av.idavion FROM avion av
						INNER JOIN vuelo vu on vu.avion_idavion=av.idavion
						WHERE vu.horafechasalida<=CURRENT_DATE AND vu.horafechallegada>CURRENT_DATE);