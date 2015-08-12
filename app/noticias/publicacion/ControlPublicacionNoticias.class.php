<?php
/*
ControlPublicacionNoticias.class.php, v 2.4 2013/05/13

ControlPublicacionNoticias - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlPublicacionNoticias
*
* ControlPublicacionNoticias - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlPublicacionNoticias.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlPublicacionNoticias extends Controlador
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
		$hayerrores = false;
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
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!strcmp($_POST['titulo'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el título de la noticia";}		
		if (!strcmp($_POST['descripcion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la descripción de la noticia";}		
		
		// Conversión de datos
		$datos=$_POST;
		$datos['publicar']=GetSQLValueString($_POST['publicar'], "defined", 1, 0);
		return $datos;
	}
}
?>