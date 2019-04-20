CREATE OR REPLACE VIEW vw_asientos_disponible as
SELECT a.idasiento,a.numeroasiento,a.ubicacion,v.idvuelo FROM asiento a
inner join avion av on av.idavion=a.avion_idavion
inner join vuelo v on v.avion_idavion=av.idavion