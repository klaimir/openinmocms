<?php
/*
ControlFichasVisitaClientes.class.php, v 2.4 2013/05/13

ControlFichasVisitaClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlFichasVisitaClientes
*
* ControlFichasVisitaClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlFichasVisitaClientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlFichasVisitaClientes extends Controlador
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
		// Representante
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre";}
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los apellidos";}
		if (!strcmp($_POST['provincia'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia";}	
		if (!strcmp($_POST['poblacion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio";}
		
		// Fecha
		if (!strcmp($_POST['fecha'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la fecha";}
		
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del cliente introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF";
		}
			
		// Agente
		if (!strcmp($_POST['nif_agente'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del agente";}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['fecha']=cambiafecha_form($_POST['fecha']);
		return $datos;
	}
}
?>