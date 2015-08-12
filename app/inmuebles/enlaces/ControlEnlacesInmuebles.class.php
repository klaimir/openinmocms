<?php
/*
ControlEnlacesInmuebles.class.php, v 2.4 2013/05/13

ControlEnlacesInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlEnlacesInmuebles
*
* ControlEnlacesInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlEnlacesInmuebles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlEnlacesInmuebles extends Controlador
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
		
		if(isset($_GET['id_enlace']))
			$sql_id_enlace=" AND id_enlace <> '" . $_GET['id_enlace'] . "'";
		
		// Comprobación texto del enlace
		if (trim($_POST['texto_enlace']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido ningún texto para el enlace";
		}
		else
		{
			// Comprobamos si el nombre de usuario ya existe en la BD
			$sql_enlaces = "SELECT * FROM enlaces_inmueble WHERE texto_enlace='" . $_POST['texto_enlace'] . "' AND inmueble='" . $_GET['id'] . "'".$sql_id_enlace;			
			$enlaces = $DB->Execute($sql_enlaces) or die($DB->ErrorMsg());
			$num_enlaces = $enlaces->RecordCount();
			
			if($num_enlaces != 0) {$hayerrores = true; $errores[$i++] = "El texto del enlace ya ha sido introducido en el inmueble actual";}
		}
		
		// Comprobación texto del enlace
		if (trim($_POST['url']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido la url del enlace";
		}
		else
		{
			// Comprobamos si el nombre de usuario ya existe en la BD
			$sql_enlaces = "SELECT * FROM enlaces_inmueble WHERE url='" . $_POST['url'] . "' AND inmueble='" . $_GET['id'] . "'".$sql_id_enlace;			
			$enlaces = $DB->Execute($sql_enlaces) or die($DB->ErrorMsg());
			$num_enlaces = $enlaces->RecordCount();
			
			if($num_enlaces != 0) {$hayerrores = true; $errores[$i++] = "La url del enlace ya ha sido introducida en el inmueble actual";}
		}
		
		// Conversión de datos
		$datos=$_POST;
		
		return $datos;
	}
}
?>