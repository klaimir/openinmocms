<?php
/*
ControlInmuebleslFichasVisitaClientes.class.php, v 2.4 2013/05/13

ControlInmuebleslFichasVisitaClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librer�as auxiliares

/**
*
* ControlInmuebleslFichasVisitaClientes
*
* ControlInmuebleslFichasVisitaClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlInmuebleslFichasVisitaClientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlInmuebleslFichasVisitaClientes extends Controlador
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
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function Validar(&$i,&$hayerrores,&$errores)
	{		
		// Conexi�n Base de datos
		$DB = new Model();
		
		// Comprobacion de datos
		if (!isset($_GET['ficha_visita']) || !isset($_GET['id']) || !isset($_GET['inmueble'])) 
		{
			$hayerrores = true; $errores[$i++] = "Los valores introducidos no son correctos";
		}
		else
		{
			// Comprobamos si est� asociado a alg�n cliente
			$sql_clientes = "SELECT * FROM inmuebles_fichas_visita_cliente WHERE ficha_visita='" . $_GET['ficha_visita'] . "' AND cliente='" . $_GET['id'] . "' AND inmueble='" . $_GET['inmueble'] . "'";
			$clientes = $DB->Execute($sql_clientes) or die($DB->ErrorMsg());
			$cliente = $clientes->FetchRow();
			$num_clientes = $clientes->RecordCount();
			
			if($num_clientes != 0) {$hayerrores = true; $errores[$i++] = "El inmueble seleccionado ya est� asociado al cliente actual";}
		}
		
		// Conversi�n de datos
		$datos['cliente']=$_GET['id'];
		$datos['inmueble']=$_GET['inmueble'];
		$datos['ficha_visita']=$_GET['ficha_visita'];
		return $datos;
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz para asignar una hora
	 *
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function ValidarAsignarHora(&$i,&$hayerrores,&$errores)
	{		
		// Conexi�n Base de datos
		$DB = new Model();
		
		// Comprobacion de datos
		if (!isset($_GET['ficha_visita']) || !isset($_GET['id']) || !isset($_GET['inmueble']) || !isset($_GET['location'])) 
		{
			$hayerrores = true; $errores[$i++] = "Los valores introducidos no son correctos";
		}
		else
		{
			if ($_POST['hora']=="")
			{
				$hayerrores = true; $errores[$i++] = "No ha especificado la hora de la visita";
			}
			else
			{
				// Comprobamos si est� asociado a alg�n cliente
				$sql_clientes = "SELECT * FROM inmuebles_fichas_visita_cliente WHERE ficha_visita='" . $_GET['ficha_visita'] . "' AND hora='" . $_POST['hora'] . "' AND cliente='" . $_GET['id'] . "'";
				$clientes = $DB->Execute($sql_clientes) or die($DB->ErrorMsg());
				$cliente = $clientes->FetchRow();
				$num_clientes = $clientes->RecordCount();
				
				if($num_clientes != 0) {$hayerrores = true; $errores[$i++] = "La hora ya ha sido asignada en la ficha de visita del cliente actual";}
			}
		}
		
		// Conversi�n de datos
		$datos['hora']=$_POST['hora'];
		$datos['cliente']=$_GET['id'];
		$datos['inmueble']=$_GET['inmueble'];
		$datos['ficha_visita']=$_GET['ficha_visita'];
		return $datos;
	}
}
?>