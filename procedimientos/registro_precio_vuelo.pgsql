CREATE OR REPLACE FUNCTION SP_REGISTRO_PRECIO_VUELO
(
    IN pnPrecio numeric,
    IN pnIdVuelo INT,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdPrecioVuelo INT;
DECLARE vdFechaInicio DATE;
DECLARE vdFechaFin DATE;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    IF pnPrecio=0 or pnPrecio is null THEN
        vcMensaje:=vcMensaje||'pnPrecio, ';
    END IF;

    IF pnIdVuelo=0 or pnIdVuelo is null THEN
        vcMensaje:=vcMensaje||'pnIdVuelo, ';
    END IF;
    --Verificando que exista el vuelo
    IF EXISTS(SELECT * from vuelo where idvuelo=pnIdVuelo) IS FALSE THEN
        pvMensajeError:='El vuelo no está registrado';
        RETURN;
    END IF;


    IF pvAccion='AGREGAR' THEN
        /* Verificando que no haya un precio vigente */
        IF EXISTS(
            select pv.idpreciovuelo from preciovuelo pv
            inner join vuelo vu on vu.idvuelo=pv.vuelo_idvuelo
            where pv.fechainicio<=CURRENT_DATE
            AND pv.fechafin>=CURRENT_DATE
            AND vu.idvuelo=pnIdVuelo
        ) THEN
            pvMensajeError:='Ya existe un precio vigente';
            RETURN;
        END IF;

        /*Insertando el precio vuelo*/
        IF EXISTS(SELECT * FROM preciovuelo) THEN
            SELECT max(idpreciovuelo)+1 INTO vnIdPrecioVuelo FROM preciovuelo;
        ELSE
            vnIdPrecioVuelo:=1;
        END IF;

        /*Los precios tendrán una duración de un año*/
        SELECT CURRENT_DATE INTO vdFechaInicio;
        SELECT CURRENT_DATE::date+cast('1 year' as interval) INTO vdFechaFin;

        INSERT INTO public.preciovuelo(
        idpreciovuelo, precio, fechainicio, fechafin, vuelo_idvuelo)
        VALUES (vnIdPrecioVuelo, pnPrecio, vdFechaInicio, vdFechaFin, pnIdVuelo);

        pvMensajeError:='El precioVuelo se agregó exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';