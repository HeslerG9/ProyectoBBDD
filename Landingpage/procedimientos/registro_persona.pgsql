CREATE OR REPLACE FUNCTION SP_REGISTRO_PERSONA
(
    IN pvPrimerNombre varchar(45),
    IN pvSegundoNombre varchar(45),
    IN pvPrimerApellido varchar(45),
    IN pvSegundoApellido varchar(45),
    IN pvCorreo varchar(45),
    IN pvDireccion varchar(200),
    IN pvIdentidad varchar(45),
    IN pnpais INT,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdPersona INT;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvPrimerNombre='' or pvPrimerNombre is null THEN
        vcMensaje:=vcMensaje||'pvPrimerNombre, ';
    END IF;
    IF pvSegundoNombre='' or pvSegundoNombre is null THEN
        vcMensaje:=vcMensaje||'pvSegundoNombre, ';
    END IF;
    IF pvPrimerApellido='' or pvPrimerApellido is null THEN
        vcMensaje:=vcMensaje||'pvPrimerApellido, ';
    END IF;
    IF pvSegundoApellido='' or pvSegundoApellido is null THEN
        vcMensaje:=vcMensaje||'pvSegundoApellido, ';
    END IF;
    IF pvCorreo='' or pvCorreo is null THEN
        vcMensaje:=vcMensaje||'pvCorreo, ';
    END IF;
    IF pvDireccion='' or pvDireccion is null THEN
        vcMensaje:=vcMensaje||'pvDireccion, ';
    END IF;
    IF pvIdentidad='' or pvIdentidad is null THEN
        vcMensaje:=vcMensaje||'pvIdentidad, ';
    END IF;
    /*Verifica que no haya otra persona con la misma identidad*/
    IF EXISTS(
        SELECT * FROM persona WHERE numeroidentidad=pvIdentidad
    ) THEN
        pvMensajeError:='Esta identidad ya existe';
        RETURN;
    END IF;

    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    /*Verificando que exista el pais*/
    IF EXISTS(
        SELECT * FROM pais WHERE idpais=pnpais
    ) IS FALSE THEN 
        vcMensaje:=vcMensaje||'No existe el pais';
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF pvAccion='AGREGAR' THEN
        /*Insertando la persona*/
        IF EXISTS(SELECT * FROM persona) THEN
            SELECT max(idpersona)+1 INTO vnIdPersona FROM persona;
        ELSE
            vnIdPersona:=1;
        END IF;

        INSERT INTO public.persona(
        idpersona, pnombre, snombre, papellido, 
        sapellido, correoelectronico, direccion, numeroidentidad, 
        pais_idpais)
        VALUES (vnIdPersona, pvPrimerNombre, pvSegundoNombre, pvPrimerApellido,
         pvSegundoApellido, pvCorreo, pvDireccion, pvIdentidad, pnpais);

        pvMensajeError:='La persona se agregó exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';