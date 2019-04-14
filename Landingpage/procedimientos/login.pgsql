CREATE OR REPLACE FUNCTION SP_LOGIN
(
    IN pvIdentidad varchar(45),
    IN pvPassword text,
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdtelefono INT;
DECLARE vnIdpersona INT;
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
        pvMensajeError:='Error en la identidad';
        RETURN;
    END IF;

    IF pvPassword='' or pvPassword is null THEN
        vcMensaje:=vcMensaje||'pvPassword, ';
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF EXISTS(
        SELECT * FROM pasajero pa
        INNER JOIN persona pe ON pe.idpersona=pa.persona_idpersona
        WHERE pa.password=pvPassword
        AND pe.numeroidentidad=pvIdentidad
    ) IS FALSE THEN
        pvMensajeError:='Error en la contraseña';
        RETURN;
    END IF;

    pvMensajeError:='Se ha encontrado el usuario';
    pbOcurreError:=FALSE;

END;
$BODY$
LANGUAGE 'plpgsql';