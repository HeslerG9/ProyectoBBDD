CREATE OR REPLACE FUNCTION SP_REGISTRO_BOLETO
(
    IN pnIdBoleToEntrada INT,
    IN pnIdAsiento INT,
    IN pnIdVuelo INT,
    IN pnIdPasajero INT,
    IN pnEquipaje INT,
    IN pnIdFormaPago INT,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000),
    OUT pnIdBoleTo INT
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdBoleto INT;
DECLARE vdFechaEmision DATE;
DECLARE vnPrecioCompra NUMERIC;
DECLARE vnTipoClase INT;
DECLARE vnTotalPrecioBoleto NUMERIC;
DECLARE vnCargoAdicional NUMERIC;
DECLARE vnEquipajePermitido INT;
DECLARE vnIdSolicitud INT;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    IF pvAccion='AGREGAR' THEN
        IF pnIdPasajero=0 or pnIdPasajero is null THEN
            vcMensaje:=vcMensaje||'pnIdPasajero, ';
        END IF;
        --Verificando que exista el pasajero
        IF EXISTS(SELECT * from pasajero where idpasajero=pnIdPasajero) IS FALSE THEN
            pvMensajeError:='El pasajero no está registrado';
            RETURN;
        END IF;
        IF pnEquipaje=0 or pnEquipaje is null THEN
            vcMensaje:=vcMensaje||'pnEquipaje, ';
        END IF;
        IF pnIdVuelo=0 or pnIdVuelo is null THEN
            vcMensaje:=vcMensaje||'pnIdVuelo, ';
        END IF;
        --Verificando que exista el vuelo
        IF EXISTS(SELECT * from vuelo where idvuelo=pnIdVuelo) IS FALSE THEN
            pvMensajeError:='El vuelo no está registrado';
            RETURN;
        END IF;
        IF pnIdAsiento=0 or pnIdAsiento is null THEN
            vcMensaje:=vcMensaje||'pnIdAsiento, ';
        END IF;
        --Verificando que exista el asiento y que pertenezca al vuelo
        IF EXISTS(SELECT * from asiento where idasiento=pnIdAsiento) IS FALSE THEN
            pvMensajeError:='El asiento no está registrado';
            RETURN;
        END IF;
        --Verificando que no haya otro boleto con el mismo asiento en el mismo vuelo
        IF EXISTS(
            SELECT * from boleto WHERE vuelo_idvuelo=pnIdVuelo and asiento_idasiento=pnIdAsiento) THEN
            pvMensajeError:='ya existe un boleto para este asiento en este vuelo';
            RETURN;
        END IF;
        IF EXISTS
                (select * from vw_asiento_vuelo
                where idvuelo=pnIdVuelo
                AND idasiento=pnIdAsiento
                ) IS FALSE THEN
            pvMensajeError:='El asiento no está registrado en el vuelo seleccionado';
            RETURN;
        END IF;
        IF pnIdFormaPago=0 or pnIdFormaPago is null THEN
            vcMensaje:=vcMensaje||'pnIdFormaPago, ';
        END IF;
        --Verificando que exista la formapago
        IF EXISTS(SELECT * from formapago where idformapago=pnIdFormaPago) IS FALSE THEN
            pvMensajeError:='El formapago no está registrado';
            RETURN;
        END IF;

    END IF;

    IF pvAccion='ELIMINAR' THEN
        IF pnIdBoleToEntrada=0 or pnIdBoleToEntrada is null THEN
            vcMensaje:=vcMensaje||'pnIdBoleToEntrada, ';
        END IF;
        --Verificando que exista el boleto
        IF EXISTS(SELECT * from boleto where idboleto=pnIdBoletoEntrada) IS FALSE THEN
            pvMensajeError:='El boleto no está registrado';
            RETURN;
        END IF;
    END IF;

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

    IF pvAccion='AGREGAR' THEN
        
        IF EXISTS(SELECT * FROM boleto) THEN
            SELECT max(idboleto)+1 INTO vnIdBoleto FROM boleto;
        ELSE
            vnIdBoleto:=1;
        END IF;

        pnIdBoleTo:=vnIdBoleto;

        SELECT CURRENT_DATE INTO vdFechaEmision;

        /*PrecioCompra VIGENTE*/
        IF EXISTS 
        (SELECT * FROM preciovuelo WHERE vuelo_idvuelo=pnIdVuelo
        AND fechainicio<=CURRENT_DATE AND fechafin>CURRENT_DATE) THEN
            SELECT precio INTO vnPrecioCompra FROM preciovuelo WHERE vuelo_idvuelo=pnIdVuelo
            AND fechainicio<=CURRENT_DATE AND fechafin>CURRENT_DATE;
        ELSE
            pvMensajeError:='No hay un precio vigente para esete vuelo';
            RETURN;
        END IF;

        /*Tipo clase*/
        SELECT tipoclase_idtipoclase INTO vnTipoClase from vuelo where idvuelo=pnIdVuelo;

        /*Total precio Boleto*/
        --contar las maletas
        SELECT numeromaletapermitida INTO vnEquipajePermitido from tipoclase where idtipoclase=vnTipoClase;
        
        IF pnEquipaje>vnEquipajePermitido THEN
            SELECT monto INTO vnCargoAdicional from cargoadicional where idcargoadicional=1;
            vnTotalPrecioBoleto:=vnPrecioCompra+((pnEquipaje-vnEquipajePermitido)*vnCargoAdicional);
        ELSE
            vnTotalPrecioBoleto:=vnPrecioCompra;
        END IF;

        /*Insertando el boleto*/
        INSERT INTO public.boleto(
        idboleto, fechaemision, preciocompra, asiento_idasiento, vuelo_idvuelo, tipoclase_idtipoclase, pasajero_idpasajero, totalprecioboleto)
        VALUES (vnIdBoleto, vdFechaEmision, vnPrecioCompra, pnIdAsiento, pnIdVuelo, vnTipoClase, pnIdPasajero, vnTotalPrecioBoleto);

        /*Insertar en boleto_has_cargoadicional*/
        IF pnEquipaje>vnEquipajePermitido THEN
            INSERT INTO public.boleto_has_cargoadicional(
            boleto_idboleto, cargoadicional_idcargoadicional)
            VALUES (vnIdBoleto, 1);
            --el cargoadicional 1 es el de equipaje adicional
        END IF;

        /*Insertando en formapago_has_boleto*/
        INSERT INTO public.formapago_has_boleto(
        formapago_idformapago, boleto_idboleto)
        VALUES (pnIdFormaPago, vnIdBoleto);

        /*Insertando en el flujo solicitudcompraboleto*/
        IF EXISTS(SELECT * FROM solicitudcompraboleto) THEN
            SELECT max(idsolicitudcompraboleto)+1 INTO vnIdSolicitud FROM solicitudcompraboleto;
        ELSE
            vnIdSolicitud:=1;
        END IF;

        IF EXISTS(SELECT * from empleado WHERE idempleado=1) THEN
            INSERT INTO public.solicitudcompraboleto(
            idsolicitudcompraboleto, fechahorainicio, fechahorafin, boleto_idboleto, etapaboleto_idetapaboleto, empleado_idempleado)
            VALUES (vnIdSolicitud, CURRENT_DATE, CURRENT_DATE, pnIdBoleto, 1, 1);
        ELSE
            pvMensajeError:='No hay un empleado que atienda la solicitud.';
            RETURN;
        END IF;

        pvMensajeError:='El boleto se agregó exitosamente';
        pbOcurreError:=FALSE;
        pnIdBoleTo:=vnIdBoleto;
        RETURN;
    END IF;

    IF pvAccion='ELIMINAR' THEN

        /*Eliminando el equipaje*/
        DELETE FROM public.equipaje
	    WHERE boleto_idboleto=pnIdBoleToEntrada;

        /*Eliminando el equipajeAdicional*/
        DELETE FROM public.equipajeadicional
	    WHERE boleto_idboleto=pnIdBoleToEntrada;

        /*Eliminando la formapago*/
        DELETE FROM public.formapago_has_boleto
	    WHERE boleto_idboleto=pnIdBoleToEntrada;

        /*Eliminando la solicitudcompraboleto*/
        DELETE FROM public.solicitudcompraboleto
	    WHERE boleto_idboleto=pnIdBoleToEntrada;

        /*Eliminando los cargos adicionales*/
        DELETE FROM public.boleto_has_cargoadicional
	    WHERE boleto_idboleto=pnIdBoleToEntrada;

        /*Eliminando el boleto*/
        DELETE FROM public.boleto
	    WHERE idboleto=pnIdBoleToEntrada;

        pvMensajeError:='El boleto y sus tablas asociadas se eliminaron exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';