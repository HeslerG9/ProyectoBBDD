select * from vuelo v
inner join puerta po on po.idpuerta=v.idpuertaorigen
inner join puerta pd on pd.idpuerta=v.idpuertadestino
inner join terminal t1 on t1.idterminal=po.Terminal_idterminal
inner join terminal t2 on t2.idterminal=po.Terminal_idterminal
inner join aeropuerto ao on ao.idaeropuerto=t1.aeropuerto_idaeropuerto
inner join aeropuerto ad on ad.idaeropuerto=t2.aeropuerto_idaeropuerto
inner join pais paiso on paiso.idpais=ao.pais_idpais
inner join pais paisd on paisd.idpais=ad.pais_idpais
where ad.pais_idpais=1


select * from vuelo v
inner join puerta p on p.idpuerta=v.idpuertaorigen
inner join terminal t on t.idterminal=p.Terminal_idterminal
inner join aeropuerto a on a.idaeropuerto=t.aeropuerto_idaeropuerto
inner join pais pais on pais.idpais=a.pais_idpais

CREATE OR REPLACE VIEW vw_vuelo_paises as
select v.idvuelo,v.cantidadescala,v.horafechasalida,v.horafechallegada,tc.descripcion,pais.nombre,pais.idpais,v.idpuertaorigen,v.idpuertadestino,pv.precio from vuelo v
inner join puerta p on p.idpuerta=v.idpuertaorigen
inner join terminal t on t.idterminal=p.Terminal_idterminal
inner join aeropuerto a on a.idaeropuerto=t.aeropuerto_idaeropuerto
inner join pais pais on pais.idpais=a.pais_idpais
inner join preciovuelo pv on pv.vuelo_idvuelo=v.idvuelo
inner join tipoclase tc on tc.idTipoClase=v.idvuelo
