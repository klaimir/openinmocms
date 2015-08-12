<?php
/*
ControlPresupuestos.class.php, v 2.4 2013/05/13

ControlPresupuestos - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlPresupuestos
*
* ControlPresupuestos - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlPresupuestos.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlPresupuestos extends Controlador
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
		// Vivienda
		if (!strcmp($_POST['direccion_vivienda'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la dirección de la vivienda";}
		
		// Presupuesto
		if (!strcmp($_POST['importe_solicitado'], ''))
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el importe solicitado";
		}
		else
		{
			$importe_solicitado_numero=formatear_numero($_POST['importe_solicitado']);
			if(!is_numeric($importe_solicitado_numero))
			{
				$hayerrores = true; $errores[$i++] = "El formato del importe solicitado es incorrecto";
			}
			else
			{
				if($importe_solicitado_numero<0)
				{
					$hayerrores = true; $errores[$i++] = "La cantidad del importe solicitado no puede ser negativo";
				}
				else
				{
					$precio_vivienda_numero=formatear_numero($_POST['precio_vivienda']);
					if($importe_solicitado_numero>$precio_vivienda_numero)
					{
						$hayerrores = true; $errores[$i++] = "La cantidad del importe solicitado no puede ser superior al precio del inmueble";
					}
				}
			}
		}
		
		// Conversión de datos
		$datos=$_POST;
		
		$datos['precio_vivienda']=formatear_numero($_POST['precio_vivienda']);
		$datos['iajd']=formatear_numero($_POST['iajd']);
		$datos['importe_solicitado']=formatear_numero($_POST['importe_solicitado']);
		$datos['fecha']=cambiafecha_form($_POST['fecha']);
		
		return $datos;
	}
		
	/**
	 * Comprueba que es posible realizar el presupuesto de un determinado inmueble
	 *
	 * @param [id_inmueble]			Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoGenerar($id_inmueble)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos inmueble
		$inmueble = new ModelInmuebles();
		$inmueble->SetDataObject($id_inmueble);
		// Si no está en venta
		if($inmueble->precio_compra==0)
			return -1;
			
		// Se calcula la comunida autónoma de la provincia
		$sql = "SELECT * FROM provincias WHERE id_provincia=".$inmueble->provincia_inmueble;
		$provincias = $inmueble->Execute($sql) or die($inmueble->ErrorMsg());
		$provincia = $provincias->FetchRow();
		$num_provincias = $provincias->RecordCount();
		$comunidad_autonoma=$provincia['comunidad_autonoma'];
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'PresupuestosComunidadesAutonomas.class.php');
		// Datos del presupuesto de una comunidad
		$presupuesto_comunidad = new ModelPresupuestosComunidadesAutonomas();
		$presupuesto_comunidad->SetDataObject($comunidad_autonoma);
		if(!isset($presupuesto_comunidad->comunidad_autonoma))
			return -2;
		return 1;
	}
	
	/**
	 * Comprueba que es posible editar el presupuesto de un determinado inmueble
	 *
	 * @param [id_presupuesto]		Identificador del presupuesto
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditar($id_presupuesto,$inmueble)
	{
		// Si no se puede generar
		return ControlPresupuestos::ComprobarAccesoGenerar($inmueble);
	}
	
	/**
	 * Comprueba que es posible borrar el presupuesto de un determinado inmueble
	 *
	 * @param [id_presupuesto]		Identificador del presupuesto
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrar($id_presupuesto,$inmueble)
	{
		return 1;
	}
}
?>