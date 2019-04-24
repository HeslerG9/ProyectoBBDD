CREATE OR REPLACE FUNCTION SP_REGISTRO_VUELO
(
    IN pnIdVueloEntrada INT,
    IN pnCantidadEscala INT,
    IN ptHoraFechaSalida timestamp,
    IN ptHoraFechaLlegada timestamp,
    IN pnIdPiloto INT,
    IN pnIdAvion INT,
    IN pnIdTipoClase INT,
    IN pnIdPuertaOrigen INT,
    IN pnIdPuertaDestino INT,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000),
    OUT pnIdVuelo INT
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdVuelo INT;
DECLARE vnIdAeropuertoOrigen INT;
DECLARE vnIdAeropuertoDestino INT;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    IF pvAccion='AGREGAR' THEN
        IF pnCantidadEscala is null THEN
            vcMensaje:=vcMensaje||'pnCantidadEscala, ';
        END IF;
        IF ptHoraFechaSalida is null THEN
            vcMensaje:=vcMensaje||'ptHoraFechaSalida, ';
        END IF;
        IF ptHoraFechaLlegada is null THEN
            vcMensaje:=vcMensaje||'ptHoraFechaLlegada, ';
        END IF;
        --Verificar que la hora salida sea menor que la hora llegada
        IF ptHoraFechaSalida>=ptHoraFechaLlegada THEN
            pvMensajeError:='La Hora salida es mayor o igual que la hora llegada';
            RETURN;
        END IF;

        IF pnIdPiloto=0 or pnIdPiloto is null THEN
            vcMensaje:=vcMensaje||'pnIdPiloto, ';
        END IF;
        --Verificando que exista el piloto
        IF EXISTS(SELECT * from piloto where idpiloto=pnIdPiloto) IS FALSE THEN
            pvMensajeError:='El piloto no está registrado';
            RETURN;
        END IF;
        IF pnIdAvion=0 or pnIdAvion is null THEN
            vcMensaje:=vcMensaje||'pnIdAvion, ';
        END IF;
        --Verificando que exista el avion
        IF EXISTS(SELECT * from avion where idavion=pnIdAvion) IS FALSE THEN
            pvMensajeError:='El avion no está registrado';
            RETURN;
        END IF;
        IF pnIdTipoClase=0 or pnIdTipoClase is null THEN
            vcMensaje:=vcMensaje||'pnIdTipoClase, ';
        END IF;
        --Verificando que exista la clase
        IF EXISTS(SELECT * from tipoclase where idtipoclase=pnIdTipoClase) IS FALSE THEN
            pvMensajeError:='La clase no está registrada';
            RETURN;
        END IF;
        IF pnIdPuertaOrigen=0 or pnIdPuertaOrigen is null THEN
            vcMensaje:=vcMensaje||'pnIdPuertaOrigen, ';
        END IF;
        --Verificando que exista la puerta origen
        IF EXISTS(SELECT * from puerta where idpuerta=pnIdPuertaOrigen) IS FALSE THEN
            pvMensajeError:='La puerta origen no existe';
            RETURN;
        END IF;
        IF pnIdPuertaDestino=0 or pnIdPuertaDestino is null THEN
            vcMensaje:=vcMensaje||'pnIdPuertaDestino, ';
        END IF;
        --Verificando que exista la puerta destino
        IF EXISTS(SELECT * from puerta where idpuerta=pnIdPuertaDestino) IS FALSE THEN
            pvMensajeError:='La puerta destino no existe';
            RETURN;
        END IF;
        --Verificando que la puerta origen y la puerta destino no sean del mismo aeropuerto
        SELECT idaeropuerto INTO vnIdAeropuertoOrigen
        FROM public.vw_aeropuerto_por_puerta
        where idpuerta=pnIdPuertaOrigen;
        SELECT idaeropuerto INTO vnIdAeropuertoDestino
        FROM public.vw_aeropuerto_por_puerta
        where idpuerta=pnIdPuertaDestino;
        IF vnIdAeropuertoOrigen=vnIdAeropuertoDestino THEN
            pvMensajeError:='el aeropuerto origen es igual al aeropuerto destino';
            RETURN;
        END IF;

    END IF;

    IF pvAccion='ELIMINAR' THEN
        IF pnIdVueloEntrada=0 or pnIdVueloEntrada is null THEN
            vcMensaje:=vcMensaje||'pnIdVueloEntrada, ';
        END IF;
        --Verificando que exista el vuelo
        IF EXISTS(SELECT * from vuelo where idvuelo=pnIdVueloEntrada) IS FALSE THEN
            pvMensajeError:='El vuelo no está registrado';
            RETURN;
        END IF;
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF pvAccion='AGREGAR' THEN
        /*Insertando la vuelo*/
        IF EXISTS(SELECT * FROM vuelo) THEN
            SELECT max(idvuelo)+1 INTO vnIdVuelo FROM vuelo;
        ELSE
            vnIdVuelo:=1;
        END IF;

        INSERT INTO public.vuelo(
	    idvuelo, cantidadescala, horafechasalida, horafechallegada, piloto_idpiloto, avion_idavion, tipoclase_idtipoclase, idpuertaorigen, idpuertadestino)
	    VALUES (vnIdVuelo, pnCantidadEscala, ptHoraFechaSalida, ptHoraFechaLlegada, pnIdPiloto, pnIdAvion, pnIdTipoClase, pnIdPuertaOrigen, pnIdPuertaDestino);

        pvMensajeError:='El vuelo se agregó exitosamente';
        pbOcurreError:=FALSE;
        pnIdVuelo:=vnIdVuelo;
        RETURN;
    END IF;

    IF pvAccion='ELIMINAR' THEN

        /*Eliminando las escalas asociadas al vuelo*/
        DELETE FROM public.escala
        WHERE vuelo_idvuelo=pnIdVueloEntrada;

        /*Eliminando los precios asociados al vuelo*/
        DELETE FROM public.preciovuelo
	    WHERE vuelo_idvuelo=pnIdVueloEntrada;

        /*Eliminando el vuelo*/
        DELETE FROM public.vuelo
	    WHERE idvuelo=pnIdVueloEntrada;

        pvMensajeError:='El vuelo y sus escalas se eliminó exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';