<?php
/*
ControlContratosArrendamiento.class.php, v 2.4 2013/05/13

ControlContratosArrendamiento - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ControlContratosArrendamiento
*
* ControlContratosArrendamiento - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlContratosArrendamiento.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlContratosArrendamiento extends Controlador
{	
	/**
	 * Constructor
	 *
	 */
	
	function __construct()
    {  
		parent::__construct();
    }
	
	/**
	 * Valida los datos de entrada desde la interfaz
	 *
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function Validar(&$i,&$hayerrores,&$errores)
	{		
		// Arrendador
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del arrendador";}
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los apellidos del arrendador";}
		if (!strcmp($_POST['estado_civil'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el estado civil del arrendador";}
		if (!strcmp($_POST['provincia'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia del arrendador";}	
		if (!strcmp($_POST['poblacion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio del arrendador";}
		if (!strcmp($_POST['domicilio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el domicilio del arrendador";}
		
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del arrendador introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del arrendador";
		}
		
		// Arrendatario
		if (!strcmp($_POST['nombre_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del arrendatario";}
		if (!strcmp($_POST['apellidos_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido los apellidos del arrendatario";}
		if (!strcmp($_POST['estado_civil_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el estado civil del arrendatario";}
		if (!strcmp($_POST['provincia_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia del arrendatario";}	
		if (!strcmp($_POST['poblacion_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio del arrendatario";}
		if (!strcmp($_POST['domicilio_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el domicilio del arrendatario";}
		
		if (trim($_POST['nif_comprador']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif_comprador']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del arrendatario introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del arrendatario";
		}
		
		// Vivienda
		if (!strcmp($_POST['direccion_vivienda'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la dirección de la vivienda";}		
		
		
		// Contrato
		if (!strcmp($_POST['estado'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el estado del contrato";}	
		
		if (!strcmp($_POST['cuota_mensual'], ''))
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido la cuota mensual";
		}
		else
		{
			$cuota_mensual_numero=formatear_numero($_POST['cuota_mensual']);
			if(!is_numeric($cuota_mensual_numero))
			{
				$hayerrores = true; $errores[$i++] = "El formato de la cuota mensual es incorrecto";
			}
			else
			{
				if($cuota_mensual_numero<=0)
				{
					$hayerrores = true; $errores[$i++] = "La cantidad de la cuota mensual debe ser positiva";
				}
			}
		}
		// Cuota total
		if($_POST['tipo_arrendamiento']==2 || $_POST['tipo_arrendamiento']==3)
		{
			if (!strcmp($_POST['cuota_total'], ''))
			{
				$hayerrores = true; $errores[$i++] = "No se ha introducido la cuota total";
			}
			else
			{
				$cuota_total_numero=formatear_numero($_POST['cuota_total']);
				if(!is_numeric($cuota_total_numero))
				{
					$hayerrores = true; $errores[$i++] = "El formato de la cuota total es incorrecto";
				}
				else
				{
					if($cuota_total_numero<=0)
					{
						$hayerrores = true; $errores[$i++] = "La cantidad de la cuota total debe ser positiva";
					}
				}
			}
		}
		
		if (!strcmp($_POST['fecha_inicio_contrato'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la fecha de inicio del contrato";}
		
		if($_POST['tipo_arrendamiento']==1)
		{
			if (!strcmp($_POST['fecha_primer_pago'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la fecha del primer pago";}
		}
		
		if (!strcmp($_POST['fecha_fin_contrato'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la fecha de finalización del contrato";}	
		
		
		if($_POST['tipo_arrendamiento']==2 || $_POST['tipo_arrendamiento']==3)
		{
			if (trim($_POST['banco']) == "" || trim($_POST['sucursal']) == "" || trim($_POST['dc']) == "" || trim($_POST['cuenta'] == ""))
			{
				$hayerrores = true; $errores[$i++] = "No se han introducido todos los datos (BANCO, SUCURSAL, DC y Nº CC) de la cuenta corriente";
			}
			else
			{
				if(valida_ccc($_POST['banco'], $_POST['sucursal'], $_POST['dc'], $_POST['cuenta']) == -1)
				{
					$hayerrores = true; $errores[$i++] = "Los datos de la cuenta corriente no son correctos";
				}
			}
		}
		
		if($_POST['tipo_arrendamiento']==3)
		{
			if (!strcmp($_POST['mes_actualizacion_renta'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el mes de actualización de la renta";}
		}
		
		// Comprobaciones varias
		if (!$hayerrores)
		{
			if(compararFechas($_POST['fecha_fin_contrato'], $_POST['fecha_inicio_contrato']) < 0)
			{
				$hayerrores = true; $errores[$i++] = "La fecha de finalización del contrato no puede ser anterior a la fecha de inicio";
			}
			
			if($_POST['tipo_arrendamiento']==1)
			{
				if(compararFechas($_POST['fecha_fin_contrato'], $_POST['fecha_primer_pago']) < 0)
				{
					$hayerrores = true; $errores[$i++] = "La fecha de finalización del contrato no puede ser anterior a la fecha del primer pago";
				}
				if(compararFechas($_POST['fecha_primer_pago'], $_POST['fecha_inicio_contrato']) < 0)
				{
					$hayerrores = true; $errores[$i++] = "La fecha del primer pago no puede ser anterior a la fecha de inicio";
				}
			}
			
			if($_POST['tipo_arrendamiento']==2 || $_POST['tipo_arrendamiento']==3)
			{
				$cuota_total_numero=formatear_numero($_POST['cuota_total']);
				$cuota_mensual_numero=formatear_numero($_POST['cuota_mensual']);
				
				if($cuota_total_numero<=$cuota_mensual_numero)
				{
					$hayerrores = true; $errores[$i++] = "La cuota total debe ser superior a la cuota mensual";
				}
			}
			
			// Se comprueba que la fecha de inicio del contrato no puede ser anterior a la fecha de fin del contrato inmediatamente anterior
			$validar_fecha_inicio=ControlContratosArrendamiento::ValidarFechaFinAnteriorContrato($_POST['fecha_inicio_contrato'],$_POST['inmueble'],$_POST['id_contrato_arrendamiento']);
			if(!$validar_fecha_inicio)
			{
				$hayerrores = true; $errores[$i++] = "La fecha de inicio de contrato no puede ser anterior a la fecha de finalización de otro contrato";
			}		
		}		
		
		// Agente
		if (!strcmp($_POST['nombre_agente'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del agente";}
		if (!strcmp($_POST['apellidos_agente'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido los apellidos del agente";}
		
		if (trim($_POST['nif_agente']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif_agente']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del agente introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del agente";
		}
		
		// Conversión de datos
		$datos=$_POST;
		
		if($_POST['tipo_arrendamiento']==2 || $_POST['tipo_arrendamiento']==3)
		{
			$datos['cuota_total']=formatear_numero($_POST['cuota_total']);
			$datos['ncc']=$datos['banco']." ".$datos['sucursal']." ".$datos['dc']." ".$datos['cuenta'];
		}
		
		$datos['cuota_mensual']=formatear_numero($_POST['cuota_mensual']);
		$datos['fecha_inicio_contrato']=cambiafecha_form($_POST['fecha_inicio_contrato']);
		
		if($_POST['tipo_arrendamiento']==1)
		{
			$datos['fecha_primer_pago']=cambiafecha_form($_POST['fecha_primer_pago']);
		}
		
		$datos['fecha_fin_contrato']=cambiafecha_form($_POST['fecha_fin_contrato']);
		
		return $datos;
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz de asociar arrendatario
	 *
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function ValidarAsociarComprador(&$i,&$hayerrores,&$errores)
	{		
		// Vendedor
		if (!strcmp($_POST['cliente_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha seleccionado ningún arrendatario";}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['tipo_arrendamiento']=$_GET['tipo_arrendamiento'];
		return $datos;
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz de seleccionar tipo de arrendamiento
	 *
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function ValidarSeleccionarTipoArrendamiento(&$i,&$hayerrores,&$errores)
	{		
		// Vendedor
		if (!strcmp($_POST['tipo_arrendamiento'], '')) {$hayerrores = true; $errores[$i++] = "No se ha seleccionado ningún tipo de arrendamiento";}
		
		// Conversión de datos
		$datos=$_POST;
		return $datos;
	}
	
	/**
	 * Comprueba que es posible realizar el contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoGenerarContrato($id_inmueble,$id_cliente)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos inmueble
		$inmueble = new ModelInmuebles();
		$inmueble->SetDataObject($id_inmueble);
		// Si no está en venta
		if($inmueble->precio_alquiler==0)
			return -1;
		// Si no tiene ficha de encargo
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FichasEncargoCliente.class.php');
		// Datos de fichas de encargo
		$ficha_encargo = new ModelFichasEncargoCliente();
		$fichas_encargo_obtenidas=$ficha_encargo->ObtenerFichasInmuebleCliente($id_inmueble,$id_cliente);
		$num_fichas_encargo=$fichas_encargo_obtenidas->RecordCount();
		if($num_fichas_encargo==0)
			return -2;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible editar el contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_contrato_arrendamiento]		Identificador del arrendamiento
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditarContrato($id_contrato_arrendamiento)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Datos del contrato
		$contrato = new ModelContratosArrendamientoInmueble();
		$contrato->SetDataObject($id_contrato_arrendamiento);
		$id_ultimo_contrato_arrendamiento=$contrato->ObtenerUltimoContratoInmueble();
		// Si existe uno más reciente
		if($id_ultimo_contrato_arrendamiento!=$id_contrato_arrendamiento)
			return -3;
		// Si no se puede generar
		return ControlContratosArrendamiento::ComprobarAccesoGenerarContrato($contrato->inmueble,$contrato->cliente_vendedor);
	}
	
	/**
	 * Comprueba que es posible borrar el contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_contrato_arrendamiento]		Identificador del contrato de arrendamiento
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrarContrato($id_contrato_arrendamiento)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Datos del contrato
		$contrato = new ModelContratosArrendamientoInmueble();
		$contrato->SetDataObject($id_contrato_arrendamiento);
		if($contrato->estado=="Firmado")
			return -1;
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosArrendamientoInmueble.class.php');
		// Datos de la factura
		$factura = new ModelFacturasContratosArrendamientoInmueble();
		$factura->SetDataObject($id_contrato_arrendamiento);
		if(!is_null($factura->contrato_arrendamieno))
			return -2;
		// Si es posible
		return 1;
	}
	
	/**
	 * Comprueba que es posible cambiar el estado del contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_contrato_arrendamiento]		Identificador del contrato de arrendamiento
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoCambiarEstado($id_contrato_arrendamiento)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosArrendamientoInmueble.class.php');
		$factura = new ModelFacturasContratosArrendamientoInmueble();
		$factura->SetDataObject($id_contrato_arrendamiento);
		if(!is_null($factura->contrato_arrendamiento))
			return false;
		else
			return true;
	}
	
	/**
	 * Comprueba que es posible editar el contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [fecha_inicio_contrato]			Fecha de inicio del contrato en formato dd/mm/YYYY
	 * @param [id_inmueble]						Identificador del inmueble
	 * @param [id_contrato_arrendamiento]		Identificador del arrendamiento
	 *
	 * @return true or false
	 */

	public static function ValidarFechaFinAnteriorContrato($fecha_inicio_contrato,$id_inmueble,$id_contrato_arrendamiento)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Se obtiene la máxima fecha de fin de contrato sin tener en cuenta el contrato especificado
		$contrato = new ModelContratosArrendamientoInmueble();
		$ultima_fecha_fin_contrato=$contrato->ObtenerUltimaFechaFinContratoInmueble($id_inmueble,$id_contrato_arrendamiento);
		// Si existe uno más reciente
		if(!is_null($ultima_fecha_fin_contrato))
		{
			if(compararFechas($fecha_inicio_contrato, $ultima_fecha_fin_contrato) < 0)
			{
				return false;
			}
			else
				return true;
		}
		else
			return true;
	}
}
?>