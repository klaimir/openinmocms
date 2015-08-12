<?php
/*
ControlClientesInmuebles.class.php, v 2.4 2013/05/13

ControlClientesInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlClientesInmuebles
*
* ControlClientesInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlClientesInmuebles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlClientesInmuebles extends Controlador
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
		
		// Comprobacion de la opción asignada
		if ($_POST['cliente'] == '') 
		{
			$hayerrores = true; $errores[$i++] = "No se ha seleccionado ningún cliente para ser asignado";
		}
		else
		{
			// Comprobamos si el cliente ya está asignado
			$sql_clientes = "SELECT * FROM clientes_inmuebles WHERE cliente='" . $_POST['cliente'] . "' AND inmueble='" . $_GET['id'] . "'";
			$clientes = $DB->Execute($sql_clientes) or die($DB->ErrorMsg());
			$cliente = $clientes->FetchRow();
			$num_clientes = $clientes->RecordCount();
			
			if($num_clientes != 0) {$hayerrores = true; $errores[$i++] = "El cliente seleccionado ya está asignado al inmueble actual";}
		}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['inmueble']=$_GET['id'];
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
		require_once(PATHINCLUDE_FRAMEWORK_APP.'clientes/inmuebles/ControlInmueblesClientes.class.php');
		return ControlInmueblesClientes::ComprobarInsertar($id_inmueble);
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
		require_once(PATHINCLUDE_FRAMEWORK_APP.'clientes/inmuebles/ControlInmueblesClientes.class.php');
		return ControlInmueblesClientes::ComprobarBorrarClienteInmueble($id_inmueble,$id_cliente);
	}
}
?>