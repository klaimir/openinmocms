<?php
/*
ControlInmueblesClientes.class.php, v 2.4 2013/05/13

ControlInmueblesClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlInmueblesClientes
*
* ControlInmueblesClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlInmueblesClientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlInmueblesClientes extends Controlador
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
		// Conexión Base de datos
		$DB = new Model();
		
		// Comprobacion de datos
		if (!isset($_GET['id']) || !isset($_GET['inmueble'])) 
		{
			$hayerrores = true; $errores[$i++] = "Los valores introducidos no son correctos";
		}
		else
		{
			// Comprobamos si está asociado a algún cliente
			$sql_clientes = "SELECT * FROM clientes_inmuebles WHERE inmueble='" . $_GET['inmueble'] . "'";
			$clientes = $DB->Execute($sql_clientes) or die($DB->ErrorMsg());
			$cliente = $clientes->FetchRow();
			$num_clientes = $clientes->RecordCount();
			
			if($num_clientes != 0) {$hayerrores = true; $errores[$i++] = "El inmueble seleccionado ya está asociado a algún cliente";}
		}
		
		// Conversión de datos
		$datos['cliente']=$_GET['id'];
		$datos['inmueble']=$_GET['inmueble'];
		return $datos;
	}
	
	/**
	 * Comprueba que el usuario en curso puede editar el inmueble seleccionado
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarInsertar($id_inmueble)
	{
		require_once(PATHINCLUDE_FRAMEWORK_APP.'inmuebles/ControlInmuebles.class.php');
		return ControlInmuebles::ComprobarUsuarioGestionaInmueble($id_inmueble);
	}
	
	/**
	 * Comprueba que es posible desvincular a un inmueble de un cliente
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarClienteInmueble($id_inmueble,$id_cliente)
	{		
		// Comprobación de gestión de inmueble
		require_once(PATHINCLUDE_FRAMEWORK_APP.'inmuebles/ControlInmuebles.class.php');
		$acceso_gestionar=ControlInmuebles::ComprobarUsuarioGestionaInmueble($id_inmueble);
		if ($acceso_gestionar<0) { return -2; }
		// Comprobación de contratos
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosCompraVentaInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosInmuebleCliente($id_inmueble,$id_cliente);
		$num_contratos_obtenidos=$contratos_obtenidos->RecordCount();
		// Si existen contratos
		if($num_contratos_obtenidos!=0)
			return -1;			
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