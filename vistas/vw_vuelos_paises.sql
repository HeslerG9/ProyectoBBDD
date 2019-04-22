CREATE OR REPLACE VIEW vw_vuelo_paises as
select v.idvuelo,v.cantidadescala,v.horafechasalida,v.horafechallegada,v.avion_idavion,v.tipoclase_idtipoclase,pais.nombre,pais.idpais,v.idpuertaorigen,v.idpuertadestino from vuelo v
inner join puerta p on p.idpuerta=v.idpuertaorigen
inner join terminal t on t.idterminal=p.Terminal_idterminal
inner join aeropuerto a on a.idaeropuerto=t.aeropuerto_idaeropuerto
inner join pais pais on pais.idpais=a.pais_idpais