CREATE OR REPLACE VIEW vw_vuelo_paises as
select v.idvuelo,paiso.idpais idpaiso,paisd.idpais idpaisd,paiso.nombre pais_origen,paisd.nombre pais_destinoo,ao.nombre aeropuerto_origen,ad.nombre aeropuerto_destino,v.cantidadescala,v.horafechasalida,v.horafechallegada,tc.descripcion clase,pv.precio from vuelo v
inner join puerta po on po.idpuerta=v.idpuertaorigen
inner join puerta pd on pd.idpuerta=v.idpuertadestino
inner join terminal teo on teo.idterminal=po.Terminal_idterminal
inner join terminal ted on ted.idterminal=pd.Terminal_idterminal
inner join aeropuerto ao on ao.idaeropuerto=teo.aeropuerto_idaeropuerto
inner join aeropuerto ad on ad.idaeropuerto=ted.aeropuerto_idaeropuerto
inner join pais paiso on paiso.idpais=ao.pais_idpais
inner join pais paisd on paisd.idpais=ad.pais_idpais
inner join preciovuelo pv on pv.vuelo_idvuelo=v.idvuelo
inner join tipoclase tc on tc.idTipoClase=v.tipoclase_idtipoclase