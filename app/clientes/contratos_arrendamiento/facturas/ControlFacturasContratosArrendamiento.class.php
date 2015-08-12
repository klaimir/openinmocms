<?php
/*
ControlFacturasContratosArrendamiento.class.php, v 2.4 2013/05/13

ControlFacturasContratosArrendamiento - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlFacturasContratosArrendamiento
*
* ControlFacturasContratosArrendamiento - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlFacturasContratosArrendamiento.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlFacturasContratosArrendamiento extends Controlador
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
			// La fecha de emisión de la factura no puede ser anterior a la fecha de generación del contrato de arrendamiento
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
			$contrato_arrendamiento = new ModelContratosArrendamientoInmueble();
			$contrato_arrendamiento->SetDataObject($_POST['contrato_arrendamiento']);
			if(compararFechas($_POST['fecha_emision'], cambiafecha_bd($contrato_arrendamiento->fecha)) < 0)
			{
				$hayerrores = true; $errores[$i++] = "La fecha de emisión de la factura no puede ser anterior a la fecha de generación del contrato de arrendamiento";
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
	 * Comprueba que es posible realizar la factura del contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_contrato_arrendamiento]		Identificador del contrato de arrendamiento
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoGenerar($id_contrato_arrendamiento)
	{		
		// Si tiene contrato de arrendamiento
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosArrendamientoInmueble.class.php');
		// Datos de fichas de encargo
		$factura_arrendamiento = new ModelFacturasContratosArrendamientoInmueble();
		$factura_arrendamiento->SetDataObject($id_contrato_arrendamiento);
		if(isset($factura_arrendamiento->contrato_arrendamiento))
			return -3;
		// Si no se puede generar
		return ControlFacturasContratosArrendamiento::ComprobarAccesoEditar($id_contrato_arrendamiento);
	}
	
	/**
	 * Comprueba que es posible editar la factura del contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_contrato_arrendamiento]		Identificador del contrato de arrendamiento
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditar($id_contrato_arrendamiento)
	{
		// Si no tiene contrato de arrendamiento
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Datos de fichas de encargo
		$contrato_arrendamiento = new ModelContratosArrendamientoInmueble();
		$contrato_arrendamiento->SetDataObject($id_contrato_arrendamiento);
		if(!isset($contrato_arrendamiento->id_contrato_arrendamiento))
			return -1;
		
		if($contrato_arrendamiento->estado!="Firmado")
			return -2;
			
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar la factura del contrato de arrendamiento de un determinado inmueble
	 *
	 * @param [id_contrato_arrendamiento]		Identificador del contrato de arrendamiento
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrar($id_contrato_arrendamiento)
	{
		// La factura no puede ser borrada si ya ha sido firmada
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FacturasContratosArrendamientoInmueble.class.php');
		$factura_contrato_arrendamiento = new ModelFacturasContratosArrendamientoInmueble();
		$factura_contrato_arrendamiento->SetDataObject($id_contrato_arrendamiento);
		if($factura_contrato_arrendamiento->estado=="Firmada")
			return -1;
		
		return 1;
	}
}
?>