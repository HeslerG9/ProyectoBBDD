CREATE OR REPLACE VIEW vw_vuelo_paises as
select v.idvuelo,v.cantidadescala,v.horafechasalida,v.horafechallegada,tc.descripcion,pais.nombre,pais.idpais,v.idpuertaorigen,v.idpuertadestino,pv.precio from vuelo v
inner join puerta p on p.idpuerta=v.idpuertaorigen
inner join terminal t on t.idterminal=p.Terminal_idterminal
inner join aeropuerto a on a.idaeropuerto=t.aeropuerto_idaeropuerto
inner join pais pais on pais.idpais=a.pais_idpais
inner join preciovuelo pv on pv.vuelo_idvuelo=v.idvuelo
inner join tipoclase tc on tc.idTipoClase=v.idvuelo
