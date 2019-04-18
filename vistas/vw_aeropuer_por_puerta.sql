--vista que muestra los aeropuertos segun la puerta
create or replace view vw_aeropuerto_por_puerta as
select ae.idaeropuerto, pu.idpuerta from aeropuerto ae
inner join terminal te on te.aeropuerto_idaeropuerto=ae.idaeropuerto
inner join puerta pu on pu.terminal_idterminal=te.idterminal