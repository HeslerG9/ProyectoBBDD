CREATE OR REPLACE FUNCTION SP_REGISTRO_TELEFONO
(
    IN pvIdentidad varchar(45),
    IN pvNumeroTelefono varchar(45),
    IN pvEstado varchar(45),
    IN pvAccion varchar(45),
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
        pvMensajeError:='No hay una persona con esta identidad en los registros';
        RETURN;
    END IF;

    IF pvNumeroTelefono='' or pvNumeroTelefono is null THEN
        vcMensaje:=vcMensaje||'pvNumeroTelefono, ';
    END IF;

    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF pvAccion='AGREGAR' THEN
        /*Insertando el telefono*/
        IF EXISTS(SELECT * FROM telefono) THEN
            SELECT max(idtelefono)+1 INTO vnIdtelefono FROM telefono;
        ELSE
            vnIdtelefono:=1;
        END IF;

        SELECT idpersona INTO vnIdpersona FROM persona WHERE numeroidentidad=pvIdentidad;

        /*Si el estado es null*/
        IF pvEstado='' or pvEstado IS NULL THEN
            pvEstado:='Activo';
        END IF;

        /*Comprobando que esta persona y ninguna otra persona tiene este telefono*/
        IF EXISTS(    
            SELECT * FROM telefono WHERE numerotelefono=pvNumeroTelefono
        ) THEN
            pvMensajeError:='Esta telefono ya esta registrado';
            RETURN;
        END IF;

        INSERT INTO public.telefono(
        idtelefono, numerotelefono, estado, persona_idpersona)
        VALUES (vnIdtelefono, pvNumeroTelefono, pvEstado, vnIdpersona);

        pvMensajeError:='El telefono se registró exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';