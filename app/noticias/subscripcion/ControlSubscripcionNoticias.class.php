<?php
/*
ControlSubscripcionNoticias.class.php, v 2.4 2013/05/13

ControlSubscripcionNoticias - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n

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
* ControlSubscripcionNoticias
*
* ControlSubscripcionNoticias - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlSubscripcionNoticias.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlSubscripcionNoticias extends Controlador
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
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */
	 
	public static function ComprobarReferencias($id,&$i,&$hayerrores,&$errores)
	{		
		$hayerrores = false;
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
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!strcmp($_POST['titulo'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el t�tulo del canal de noticias";}		
		if (!strcmp($_POST['descripcion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la descripci�n del canal de noticias";}
		if (!strcmp($_POST['enlace'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el enlace del canal de noticias";}
		// Conversi�n de datos
		$datos=$_POST;
		return $datos;
	}
}
?>