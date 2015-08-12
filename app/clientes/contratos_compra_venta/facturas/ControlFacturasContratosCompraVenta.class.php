<?php
/*
ControlFacturasContratosCompraVenta.class.php, v 2.4 2013/05/13

ControlFacturasContratosCompraVenta - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlFacturasContratosCompraVenta
*
* ControlFacturasContratosCompraVenta - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlFacturasContratosCompraVenta.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlFacturasContratosCompraVenta extends Controlador
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
		// Registro
		if (!strcmp($_POST['estado'], '')) {$hayerrores = true; $errores[$i++] = "No introducido el estado de la factura";}
		
		if (!strcmp($_POST['fecha_emision'], ''))
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido la fecha de emisión de la factura";
		}
		else
		{
			// La fecha de emisión de la factura no puede ser anterior a la fecha de generación del contrato de compra-venta
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
			$contrato_compra_venta = new ModelContratosCompraVentaInmueble();
			$contrato_compra_venta->SetDataObject($_POST['contrato_compra_venta']);
			if(compararFechas($_POST['fecha_emision'], cambiafecha_bd($contrato_compra_venta->fecha_documento_publico)) < 0)
			{
				$hayerrores = true; $errores[$i++] = "La fecha de emisión de la factura no puede ser anterior a la fecha en la que se hace público el contrato de compra-venta";
			}
		}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['cantidad_parcial']=formatear_numero($_POST['cantidad_parcial']);
		$datos['cantidad_total']=formatear_numero($_POST['cantidad_total']);
		$datos['iva']=formatear_numero($_POST['iva']);
		$datos['cantidad_iva']=formatear_numero($_POST['cantidad_iva']);
		$datos['fecha_emision']=cambiafecha_form($_POST['fecha_emision']);
		
		return $datos;
	}
	
	/**
	 * Comprueba que es posible realizar la factura del contrato de compra-venta de un determinado inmueble
	 *
	 * @param [id_contrato_compra_venta]		Identificador del contrato de compra-venta
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoGenerar($id_contrato_compra_venta)
	{		
		// Si tiene contrato de compra-venta
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosCompraVentaInmueble.class.php');
		// Datos de fichas de encargo
		$factura_compra_venta = new ModelFacturasContratosCompraVentaInmueble();
		$factura_compra_venta->SetDataObject($id_contrato_compra_venta);
		if(isset($factura_compra_venta->contrato_compra_venta))
			return -3;
		// Si no se puede generar
		return ControlFacturasContratosCompraVenta::ComprobarAccesoEditar($id_contrato_compra_venta);
	}
	
	/**
	 * Comprueba que es posible editar la factura del contrato de compra-venta de un determinado inmueble
	 *
	 * @param [id_contrato_compra_venta]		Identificador del contrato de compra-venta
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditar($id_contrato_compra_venta)
	{
		// Si no tiene contrato de compra-venta
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos de fichas de encargo
		$contrato_compra_venta = new ModelContratosCompraVentaInmueble();
		$contrato_compra_venta->SetDataObject($id_contrato_compra_venta);
		if(!isset($contrato_compra_venta->id_contrato_compra_venta))
			return -1;
		
		if($contrato_compra_venta->estado!="Firmado")
			return -2;
			
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar la factura del contrato de compra-venta de un determinado inmueble
	 *
	 * @param [id_contrato_compra_venta]		Identificador del contrato de compra-venta
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrar($id_contrato_compra_venta)
	{
		// La factura no puede ser borrada si ya ha sido firmada
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosCompraVentaInmueble.class.php');
		$factura_contrato_compra_venta = new ModelFacturasContratosCompraVentaInmueble();
		$factura_contrato_compra_venta->SetDataObject($id_contrato_compra_venta);
		if($factura_contrato_compra_venta->estado=="Firmada")
			return -1;
		
		return 1;
	}
}
?>