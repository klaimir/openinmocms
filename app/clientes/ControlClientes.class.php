<?php
/*
ControlClientes.class.php, v 2.4 2013/05/13

ControlClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlClientes
*
* ControlClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlClientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlClientes extends Controlador
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
	 * Comprueba las referencias para realizar determinadas acciones
	 *
	 * @param [id]			Identificador a comprobar
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */
	 
	public static function ComprobarReferencias($id,&$i,&$hayerrores,&$errores)
	{		
		$acceso_borrar=ControlClientes::ComprobarBorrarCompraVentaInmueble($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El cliente seleccionado tiene algún contrato de compra-venta de algún inmueble";}
		$acceso_borrar=ControlClientes::ComprobarBorrarArrendamientoInmueble($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El cliente seleccionado tiene algún contrato de arrendamiento de algún inmueble";}
		$acceso_borrar=ControlClientes::ComprobarBorrarInmueblesAsociados($id);
		if (!$acceso_borrar) {$hayerrores = true; $errores[$i++] = "El cliente seleccionado tiene inmuebles asociados que no pueden ser borrados";}
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
		
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del cliente";}		
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los apellidos del cliente";}
		if (!strcmp($_POST['provincia'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido la provincia del cliente";}
		if (!strcmp($_POST['poblacion'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido el region del cliente";}
		
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF introducido no es v&aacute;lido";					
			}
			else
			{
				// Comprobamos si el nif de cliente ya existe en la BD
				if(isset($_POST['id']))
					$sql_clientes = "SELECT * FROM clientes WHERE nif='" . $_POST['nif'] . "' AND nif<>'" . $_POST['nif_anterior'] . "'";
				else
					$sql_clientes = "SELECT * FROM clientes WHERE nif='" . $_POST['nif'] . "'";
				$clientes = $DB->Execute($sql_clientes) or die($DB->ErrorMsg());
				$num_clientes = $clientes->RecordCount();
				
				if($num_clientes != 0) {$hayerrores = true; $errores[$i++] = "El nif introducido ya existe en el sistema";}
			}
		}

		if(strcmp($_POST['correo'], ''))
		{
			if(validarCorreo($_POST['correo'])==0)
			{
				$hayerrores = true; 
				$errores[$i++] = "La dirección de correo electrónico no tiene un formato válido";	
			}
		}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['fecha_alta']=cambiafecha_form($_POST['fecha_alta']);
		$datos['direccion']=$_POST['direccion_cliente'];
		$datos['observaciones']=$_POST['observaciones_cliente'];
		return $datos;
	}
	
	/**
	 * Comprueba que es posible borrar un cliente con algún contrato de compra-venta asociado
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarCompraVentaInmueble($id_cliente)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosCompraVentaInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosCliente($id_cliente);
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
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarArrendamientoInmueble($id_cliente)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosArrendamientoInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosCliente($id_cliente);
		$num_contratos_obtenidos=$contratos_obtenidos->RecordCount();
		// Si existen contratos
		if($num_contratos_obtenidos!=0)
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un cliente
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrar($id_cliente)
	{		
		$acceso_borrar=ControlClientes::ComprobarBorrarCompraVentaInmueble($id_cliente);
		if ($acceso_borrar<0) { return -1; }
		$acceso_borrar=ControlClientes::ComprobarBorrarArrendamientoInmueble($id_cliente);
		if ($acceso_borrar<0) { return -1; }
		$acceso_borrar=ControlClientes::ComprobarBorrarInmueblesAsociados($id_cliente);
		if (!$acceso_borrar) { return -2; }
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar los inmuebles asociados de un determinado cliente
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarInmueblesAsociados($id_cliente)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Clientes.class.php');		
		// Datos cliente
		$clientes = new ModelClientes();
		$inmuebles_asociados=$clientes->ObtenerInmueblesAsociados($id_cliente);
		// Comprobamos que se pueden borrar los asociados
		if(count($inmuebles_asociados)>0)
		{
			require_once(PATHINCLUDE_FRAMEWORK_APP.'inmuebles/ControlInmuebles.class.php');
			return ControlInmuebles::ComprobarInmueblesAsociadosBorrar($inmuebles_asociados);
		}
		else
		{		
			return false;
		}
		return true;
	}
}
?>