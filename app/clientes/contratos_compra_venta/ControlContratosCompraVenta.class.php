<?php
/*
ControlContratosCompraVenta.class.php, v 2.4 2013/05/13

ControlContratosCompraVenta - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlContratosCompraVenta
*
* ControlContratosCompraVenta - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlContratosCompraVenta.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlContratosCompraVenta extends Controlador
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
		// Vendedor
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del vendedor";}
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido los apellidos del vendedor";}
		if (!strcmp($_POST['provincia'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia del vendedor";}	
		if (!strcmp($_POST['poblacion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio del vendedor";}
		if (!strcmp($_POST['domicilio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el domicilio del vendedor";}
		
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del vendedor introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del vendedor";
		}
		
		// Comprador
		if (!strcmp($_POST['nombre_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del comprador";}
		if (!strcmp($_POST['apellidos_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido los apellidos del comprador";}
		if (!strcmp($_POST['provincia_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia del comprador";}	
		if (!strcmp($_POST['poblacion_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio del comprador";}
		if (!strcmp($_POST['domicilio_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el domicilio del comprador";}
		
		if (trim($_POST['nif_comprador']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif_comprador']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del comprador introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del comprador";
		}
		
		// Vivienda
		if (!strcmp($_POST['precio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el precio de la vivienda";}
		
		if (!strcmp($_POST['metros'], ''))
		{
			$hayerrores = true; $errores[$i++] = "No se han introducido los metros de la vivienda";
		}
		else
		{
			$metros_numero=formatear_numero($_POST['metros']);
			if(!is_numeric($metros_numero))
			{
				$hayerrores = true; $errores[$i++] = "El formato de los metros de la vivienda es incorrecto";
			}
			else
			{
				if($metros_numero<=0)
				{
					$hayerrores = true; $errores[$i++] = "La cantidad de los metros debe ser positiva";
				}
			}
		}
		
		if (!strcmp($_POST['direccion_vivienda'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la dirección de la vivienda";}
		if (!strcmp($_POST['consta_de'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el contenido de la vivienda";}
		if (!strcmp($_POST['amueblado'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido el amueblado de la vivienda";}
		
		// Registro
		if (!strcmp($_POST['estado'], '')) {$hayerrores = true; $errores[$i++] = "No introducido el estado del contrato";}
		if (!strcmp($_POST['registro_numero'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el número de registro";}
		if (!strcmp($_POST['registro_boletin'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el número de boletin";}
		if (!strcmp($_POST['registro_finca'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el número de finca";}
		if (!strcmp($_POST['registro_libro'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el número de libro";}
		if (!strcmp($_POST['registro_tomo'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el número de tomo";}
		if (!strcmp($_POST['registro_folio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el número de folio";}
		if (!strcmp($_POST['cantidad_efectiva'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la cantidad efectiva";}
		if (!strcmp($_POST['cantidad_escritura'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la cantidad asociada a la escritura";}
		if (!strcmp($_POST['dias_clausula_suspensiva'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido los días para aplicarse la cláusula suspensiva";}
		if (!strcmp($_POST['fecha_documento_publico'], ''))
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido la fecha máxima para elevar el documento a público";
		}
		else
		{
			if(compararFechas($_POST['fecha_documento_publico'], $_POST['fecha']) < 0)
			{
				$hayerrores = true; $errores[$i++] = "La fecha máxima para elevar el documento a público no puede ser anterior a la fecha de aplicación del contrato";
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
		$datos['precio']=formatear_numero($_POST['precio']);
		$datos['metros']=formatear_numero($_POST['metros']);
		$datos['cantidad_efectiva']=formatear_numero($_POST['cantidad_efectiva']);
		$datos['cantidad_escritura']=formatear_numero($_POST['cantidad_escritura']);
		$datos['fecha']=cambiafecha_form($_POST['fecha']);
		$datos['fecha_documento_publico']=cambiafecha_form($_POST['fecha_documento_publico']);
		
		if (($datos['cantidad_efectiva']+$datos['cantidad_escritura'])!=$datos['precio']) {$hayerrores = true; $errores[$i++] = "Los valores introducido para la cantidad de escritura y la cantidad efectiva no coincide con el valor total del inmueble";}
		
		return $datos;
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz de asociar comprador
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
		if (!strcmp($_POST['cliente_comprador'], '')) {$hayerrores = true; $errores[$i++] = "No se ha seleccionado ningún comprador";}
		
		// Conversión de datos
		$datos=$_POST;
		return $datos;
	}
	
	/**
	 * Comprueba que es posible realizar el contrato de compra-venta de un determinado inmueble
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
		if($inmueble->precio_compra==0)
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
	 * Comprueba que es posible editar el contrato de compra-venta de un determinado inmueble
	 *
	 * @param [id_contrato_compra_venta]		Identificador del contrato de compra-venta
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditarContrato($id_contrato_compra_venta)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos del contrato
		$contrato = new ModelContratosCompraVentaInmueble();
		$contrato->SetDataObject($id_contrato_compra_venta);
		$id_ultimo_contrato_compra_venta=$contrato->ObtenerUltimoContratoInmueble();
		// Si existe uno más reciente
		if($id_ultimo_contrato_compra_venta!=$id_contrato_compra_venta)
			return -3;
		// Si no se puede generar
		return ControlContratosCompraVenta::ComprobarAccesoGenerarContrato($contrato->inmueble,$contrato->cliente_vendedor);
	}
	
	/**
	 * Comprueba que es posible borrar el contrato de compra-venta de un determinado inmueble
	 *
	 * @param [id_contrato_compra_venta]		Identificador del contrato de compra-venta
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrarContrato($id_contrato_compra_venta)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos del contrato
		$contrato = new ModelContratosCompraVentaInmueble();
		$contrato->SetDataObject($id_contrato_compra_venta);
		if($contrato->estado=="Firmado")
			return -1;
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosCompraVentaInmueble.class.php');
		// Datos de la factura
		$factura = new ModelFacturasContratosCompraVentaInmueble();
		$factura->SetDataObject($id_contrato_compra_venta);
		if(!is_null($factura->contrato_compra_venta))
			return -2;
		// Si es posible
		return 1;
	}
	
	/**
	 * Comprueba que es posible cambiar el estado del contrato de compra-venta de un determinado inmueble
	 *
	 * @param [id_contrato_compra_venta]		Identificador del contrato de compra-venta
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoCambiarEstado($id_contrato_compra_venta)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosCompraVentaInmueble.class.php');
		$factura = new ModelFacturasContratosCompraVentaInmueble();
		$factura->SetDataObject($id_contrato_compra_venta);
		if(!is_null($factura->contrato_compra_venta))
			return false;
		else
			return true;
	}
}
?>