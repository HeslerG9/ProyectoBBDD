CREATE OR REPLACE FUNCTION SP_REGISTRO_PILOTO
(
    IN pvIdentidad varchar(45),
    IN pdCantidadHorasVuelo DECIMAL,
     IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdPiloto INT;
DECLARE vnIdpersona INT;
DECLARE vdfechaIngreso date;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvIdentidad='' or pvIdentidad is null THEN
        vcMensaje:=vcMensaje||'pvIdentidad, ';
    END IF;
    IF pdCantidadHorasVuelo=0 or pdCantidadHorasVuelo is null THEN
        vcMensaje:=vcMensaje||'pdCantidadHorasVuelo, ';
    END IF;
    /*Verificando que la identidad pertenezca a una persona*/
    IF EXISTS(
        SELECT * FROM persona WHERE numeroidentidad=pvIdentidad
    ) IS FALSE THEN
        pvMensajeError:='No hay una persona con esta identidad en los registros';
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
        /*Insertando el Piloto*/
        IF EXISTS(SELECT * FROM Piloto) THEN
            SELECT max(idPiloto)+1 INTO vnIdPiloto FROM Piloto;
        ELSE
            vnIdPiloto:=1;
        END IF;

        SELECT CURRENT_DATE INTO vdfechaIngreso;

        SELECT idpersona INTO vnIdpersona FROM persona WHERE numeroidentidad=pvIdentidad;

        /*Verificando si esta persona ya está registrada*/
        IF EXISTS(
            SELECT * FROM pasajero WHERE persona_idpersona=vnIdpersona
        ) THEN
            pvMensajeError:='Este pasajero ya se encuentra registrado';
            RETURN;
        END IF;

        INSERT INTO public.Piloto(
        idPiloto, fechaIngreso, cantidadHorasVuelo,persona_idpersona)
        VALUES (vnIdPiloto, vdfechaIngreso, pdCantidadHorasVuelo, vnIdpersona);

        pvMensajeError:='El Piloto se registró exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';