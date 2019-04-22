create or replace view vw_pais_por_idpuerta as
select pa.idpais,pa.nombre,pu.idpuerta from pais pa
inner join aeropuerto ae on ae.pais_idpais=pa.idpais
inner join terminal te on te.aeropuerto_idaeropuerto=ae.idaeropuerto
inner join puerta pu on pu.terminal_idterminal=te.idterminal