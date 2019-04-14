CREATE OR REPLACE FUNCTION SP_REGISTRO_PASAJERO
(
    IN pvIdentidad varchar(45),
    IN pvPassword text,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdpasajero INT;
DECLARE vnIdpersona INT;
DECLARE vdfecharegistro date;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvIdentidad='' or pvIdentidad is null THEN
        vcMensaje:=vcMensaje||'pvIdentidad, ';
    END IF;
    /*Verificando que la identidad pertenezca a una persona*/
    IF EXISTS(
        SELECT * FROM persona WHERE numeroidentidad=pvIdentidad
    ) IS FALSE THEN
        pvMensajeError:='No hay una persona con esta identidad en los registros';
        RETURN;
    END IF;

    IF pvPassword='' or pvPassword is null THEN
        vcMensaje:=vcMensaje||'pvPassword, ';
    END IF;

    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF pvAccion='AGREGAR' THEN
        /*Insertando el pasajero*/
        IF EXISTS(SELECT * FROM pasajero) THEN
            SELECT max(idpasajero)+1 INTO vnIdpasajero FROM pasajero;
        ELSE
            vnIdpasajero:=1;
        END IF;

        SELECT CURRENT_DATE INTO vdfecharegistro;

        SELECT idpersona INTO vnIdpersona FROM persona WHERE numeroidentidad=pvIdentidad;

        /*Verificando si esta persona ya está registrada*/
        IF EXISTS(
            SELECT * FROM pasajero WHERE persona_idpersona=vnIdpersona
        ) THEN
            pvMensajeError:='Este pasajero ya se encuentra registrado';
            RETURN;
        END IF;

        INSERT INTO public.pasajero(
        idpasajero, password, fecharegistro, persona_idpersona)
        VALUES (vnIdpasajero,pvPassword, vdfecharegistro, vnIdpersona);

        pvMensajeError:='El pasajero se registró exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';