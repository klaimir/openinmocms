<?php
/*
ControlFichasEncargoClientes.class.php, v 2.4 2013/05/13

ControlFichasEncargoClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlFichasEncargoClientes
*
* ControlFichasEncargoClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlFichasEncargoClientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlFichasEncargoClientes extends Controlador
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
		if (!strcmp($_POST['telefono'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el teléfono del vendedor";}
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
		
		// Vivienda
		if (!strcmp($_POST['precio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el precio de la vivienda";}
		if (!strcmp($_POST['metros'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los metros útiles de la vivienda";}
		if (!strcmp($_POST['cuota_comunidad'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la cuota de comunidad de la vivienda";}
		if (!strcmp($_POST['forma_pago'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido la forma de pago de la vivienda";}
		if (!strcmp($_POST['anejos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los anejos de la vivienda";}
		if (!strcmp($_POST['cargas_vivienda'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido las cargas de la vivienda";}
		if (!strcmp($_POST['antiguedad_edificio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la antigüedad del edificio";}
		
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
		$datos['cuota_comunidad']=formatear_numero($_POST['cuota_comunidad']);
		$datos['fecha']=cambiafecha_form($_POST['fecha']);
		return $datos;
	}
	
	/**
	 * Comprueba que es posible editar la ficha de encargo de un determinado inmueble
	 *
	 * @param [id_ficha_encargo]	Identificador de la ficha de encargo
	 * @param [id_inmueble]			Identificador del inmueble
	 * @param [id_cliente]			Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditar($id_ficha_encargo,$id_inmueble,$id_cliente)
	{
		// Si no existe
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FichasEncargoCliente.class.php');
		$ficha_encargo = new ModelFichasEncargoCliente();
		$ficha_encargo->SetDataObject($id_ficha_encargo,$id_cliente,$id_inmueble);
		if($ficha_encargo->id_ficha_encargo=="")
			return -1;
			
		return 1;
	}
	
	/**
	 * Comprueba que es posible editar la ficha de encargo de un determinado inmueble
	 *
	 * @param [id_ficha_encargo]	Identificador de la ficha de encargo
	 * @param [id_inmueble]			Identificador del inmueble
	 * @param [id_cliente]			Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrar($id_ficha_encargo,$id_inmueble,$id_cliente)
	{
		// Si sólo existe una ficha de encargo
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FichasEncargoCliente.class.php');
		$fichas_encargo = new ModelFichasEncargoCliente();
		$fichas_encargo_obtenidas=$fichas_encargo->ObtenerFichasInmuebleCliente($id_inmueble,$id_cliente);
		$num_fichas_encargo_obtenidas=$fichas_encargo_obtenidas->RecordCount();
		if($num_fichas_encargo_obtenidas==1)
		{
			// Si existe documentación asociada
			$acceso_borrar=ControlFichasEncargoClientes::ComprobarBorrarCompraVentaInmuebleCliente($id_inmueble,$id_cliente);
			if ($acceso_borrar<0) { return -1; }
			$acceso_borrar=ControlFichasEncargoClientes::ComprobarBorrarArrendamientoInmuebleCliente($id_inmueble,$id_cliente);
			if ($acceso_borrar<0) { return -1; }
		}
		else
		{
			// Si hay mas de una sólo se puede borrar la última generada
			if($fichas_encargo->ObtenerUltimoID($id_inmueble,$id_cliente)!=$id_ficha_encargo) { return -1; }
		}
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un cliente con algún contrato de compra-venta asociado
	 *
	 * @param [id_cliente]		Identificador del cliente
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarCompraVentaInmuebleCliente($id_inmueble,$id_cliente)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosCompraVentaInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosInmuebleCliente($id_inmueble,$id_cliente);
		$num_contratos_obtenidos=$contratos_obtenidos->RecordCount();
		// Si existen contratos
		if($num_contratos_obtenidos!=0)
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un cliente con algún contrato de arrendamiento asociado
	 *
	 * @param [id_cliente]		Identificador del cliente
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarArrendamientoInmuebleCliente($id_inmueble,$id_cliente)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosArrendamientoInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosInmuebleCliente($id_inmueble,$id_cliente);
		$num_contratos_obtenidos=$contratos_obtenidos->RecordCount();
		// Si existen contratos
		if($num_contratos_obtenidos!=0)
			return -1;
		
		return 1;
	}
}
?>