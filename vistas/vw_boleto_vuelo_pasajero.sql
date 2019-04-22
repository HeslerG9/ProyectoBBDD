--vista para boleto por pasajero
create or replace view vw_boleto_vuelo_pasajero as
select pa.idpasajero,bo.fechaemision,bo.totalprecioboleto,paiso.nombre pais_origen,paisd.nombre pais_destino,vu.horafechasalida,vu.horafechallegada from pasajero pa
inner join boleto bo on bo.pasajero_idpasajero=pa.idpasajero
inner join vuelo vu on vu.idvuelo=bo.vuelo_idvuelo
inner join vw_pais_por_idpuerta paiso on paiso.idpuerta=vu.idpuertaorigen
inner join vw_pais_por_idpuerta paisd on paisd.idpuerta=vu.idpuertadestino