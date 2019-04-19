--Vista que muestra los asientos de los vuelos
CREATE OR REPLACE VIEW vw_asiento_vuelo as
SELECT asi.*,av.idavion,vu.idvuelo from asiento asi
INNER JOIN avion av on av.idavion=asi.avion_idavion
inner join vuelo vu on vu.avion_idavion=av.idavion