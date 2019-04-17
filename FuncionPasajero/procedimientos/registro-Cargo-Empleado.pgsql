CREATE OR REPLACE FUNCTION SP_CARGO_EMPLEADO
(
    IN pvIdentidad varchar(200),
    IN pnSueldo DECIMAL,
    IN pnCargo INT,
    IN pvAccion varchar(45),
    OUT pbOcurreError BOOLEAN,
    OUT pvMensajeError VARCHAR(1000)
)
RETURNS RECORD AS $BODY$
DECLARE vcMensaje VARCHAR(1000);
DECLARE vnIdEmpleado INT;
DECLARE vdfecharegistro DATE;
DECLARE vdFechaFin DATE;
BEGIN
    vcMensaje:='';
    pbOcurreError:=TRUE;

    /*VERIFICANDO QUE NO SEAN NULL*/
    IF pvIdentidad='' or pvIdentidad is null THEN
        vcMensaje:=vcMensaje||'pvIdentidad, ';
    END IF;
        /*Verifica que no haya otra persona con la misma identidad*/
    IF EXISTS(
        SELECT * FROM persona WHERE numeroidentidad=pvIdentidad
    ) IS NULL THEN
        pvMensajeError:='Esta identidad no existe';
        RETURN;
    END IF;
    IF pnCargo=0 or pnCargo is null THEN
        vcMensaje:=vcMensaje||'pnCargo, ';
    END IF;
    /*Verificando que exista el pais*/
    IF EXISTS(
        SELECT * FROM cargo WHERE idcargo=pncargo
    ) IS FALSE THEN 
        vcMensaje:=vcMensaje||'No existe el cargo';
    END IF;
    
    IF pnSueldo=0 or pnSueldo is null THEN
        vcMensaje:=vcMensaje||'pnSueldo, ';
    END IF;


    IF pvAccion='' or pvAccion is null THEN
        vcMensaje:=vcMensaje||'pvAccion, ';
    END IF;

    

    IF vcMensaje<>'' THEN
        pvMensajeError:='Campos requeridos: '||vcMensaje;
        RETURN;
    END IF;

  

    IF pvAccion='AGREGAR' THEN
     
       SELECT CURRENT_DATE INTO vdfecharegistro;



        SELECT CURRENT_DATE::timestamp + '1 year'::interval into vdFechaFin;

          select e.IdEmpleado  into vnIdEmpleado from empleado e
          inner join persona p on p.idPersona=e.persona_idpersona 
          where p.numeroidentidad=pvIdentidad;
		  
     INSERT INTO public.cargo_has_empleado(
	cargo_idcargo, empleado_idempleado, fechainicio, fechafin, sueldo)
	VALUES (pnCargo, vnIdEmpleado, vdfecharegistro, vdFechaFin, pnSueldo);

        pvMensajeError:='El empleado cargo se agregó exitosamente';
        pbOcurreError:=FALSE;
        RETURN;
    END IF;

    pvMensajeError:='Ingrese accion AGREGAR, MODIFICAR o ELIMINAR';
END;
$BODY$
LANGUAGE 'plpgsql';