CREATE OR REPLACE FUNCTION SP_REGISTRO_ESCALA
(
    IN ptHoraFechaSalida timestamp,
    IN ptHoraFechaLlegada timestamp,
    IN pnIdVuelo INT,
    IN pnIdPuertaOrigen INT,
    IN pnIdPuertaDestino INT,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdEscala INT;
DECLARE vnIdAeropuertoOrigen INT;
DECLARE vnIdAeropuertoDestino INT;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF ptHoraFechaSalida is null THEN
        vcMensaje:=vcMensaje||'ptHoraFechaSalida, ';
    END IF;
    IF ptHoraFechaLlegada is null THEN
        vcMensaje:=vcMensaje||'ptHoraFechaLlegada, ';
    END IF;

    --Verificar que la hora llegada sea menor que la hora salida
    IF ptHoraFechaSalida<=ptHoraFechaLlegada THEN
        pvMensajeError:='La Hora llegada es mayor o igual que la hora salida';
        RETURN;
    END IF;

    IF pnIdVuelo=0 or pnIdVuelo is null THEN
        vcMensaje:=vcMensaje||'pnIdVuelo, ';
    END IF;
    --Verificando que exista el vuelo
    IF EXISTS(SELECT * from vuelo where idvuelo=pnIdVuelo) IS FALSE THEN
        pvMensajeError:='El vuelo no está registrado';
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

    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF pvAccion='AGREGAR' THEN
        /*Insertando la escala*/
        IF EXISTS(SELECT * FROM escala) THEN
            SELECT max(idescala)+1 INTO vnIdescala FROM escala;
        ELSE
            vnIdescala:=1;
        END IF;

        INSERT INTO public.escala(
        idescala, fechahorasalida, fechahorallegada, vuelo_idvuelo, idpuertaorigen, idpuertadestino)
        VALUES (vnIdescala, ptHoraFechaSalida, ptHoraFechaLlegada, pnIdVuelo, pnIdPuertaOrigen, pnIdPuertaDestino);

        pvMensajeError:='La escala se agregó exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';