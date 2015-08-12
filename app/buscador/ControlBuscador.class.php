<?php
/*
ControlBuscador.class.php, v 2.4 2013/05/13

ControlBuscador - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS."securimage/securimage.php");
require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');

/**
*
* ControlBuscador
*
* ControlBuscador - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlBuscador.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlBuscador extends Controlador
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
		// Par de traducción
		$translator = Translator::getInstance();
		// Campos
		$textos['nombre']=$translator->TraducirTexto("No ha introducido su nombre");
		$textos['mensaje']=$translator->TraducirTexto("No se ha introducido el mensaje");
		$textos['correo']=$translator->TraducirTexto("No se ha introducido el e-mail");
		$textos['correo2']=$translator->TraducirTexto("La dirección de correo electrónico no tiene un formato válido");
		$textos['captcha']=$translator->TraducirTexto("El valor introducido para la imagen no es correcto");
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = $textos['nombre'];}		
		if (!strcmp($_POST['mensaje'], '')) {$hayerrores = true; $errores[$i++] = $textos['mensaje'];}
		if (!strcmp($_POST['correo'], '')) {$hayerrores = true; $errores[$i++] = $textos['correo'];}
		if(strcmp($_POST['correo'], ''))
		{
			if(validarCorreo($_POST['correo'])==0)
			{
				$hayerrores = true; 
				$errores[$i++] = $textos['correo2'];	
			}
		}
		// Validación del captcha
		$securimage = new Securimage();
		if ($securimage->check($_POST['ct_captcha']) == false)
		{
			$hayerrores = true; 
			$errores[$i++] = $textos['captcha'];
		}
		
		// Conversión de datos
		$datos=$_POST;
		return $datos;
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

	public static function ValidarRecomendarAmigo(&$i,&$hayerrores,&$errores)
	{		
		// Par de traducción
		$translator = Translator::getInstance();
		// Campos
		$textos['aceptar_documentos']=$translator->TraducirTexto("No ha aceptado la política de privacidad y las condicines de uso");
		$textos['mensaje']=$translator->TraducirTexto("No se ha introducido el mensaje");
		$textos['correo']=$translator->TraducirTexto("No se ha introducido el e-mail propio");
		$textos['correo2']=$translator->TraducirTexto("La dirección de correo electrónico propia no tiene un formato válido");
		$textos['correo_amigo']=$translator->TraducirTexto("No se ha introducido el e-mail del amigo/a");
		$textos['correo_amigo2']=$translator->TraducirTexto("La dirección de correo electrónico del amigo/a no tiene un formato válido");
		$textos['correo_coincidente']=$translator->TraducirTexto("Las direcciones de correo específicadas son iguales");
		$textos['captcha']=$translator->TraducirTexto("El valor introducido para la imagen no es correcto");
		$textos['enviada_recomendacion']=$translator->TraducirTexto("La recomendación al amigo/a indicado/a ya ha sido enviada anteriormente");
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!$_POST['aceptar_documentos']) {$hayerrores = true; $errores[$i++] = $textos['aceptar_documentos'];}
		if (!strcmp($_POST['mensaje'], '')) {$hayerrores = true; $errores[$i++] = $textos['mensaje'];}
		if (!strcmp($_POST['correo'], '')) {$hayerrores = true; $errores[$i++] = $textos['correo'];}
		if(strcmp($_POST['correo'], ''))
		{
			if(validarCorreo($_POST['correo'])==0)
			{
				$hayerrores = true; 
				$errores[$i++] = $textos['correo2'];	
			}
		}
		if (!strcmp($_POST['correo_amigo'], '')) {$hayerrores = true; $errores[$i++] = $textos['correo_amigo'];}
		if(strcmp($_POST['correo_amigo'], ''))
		{
			if(validarCorreo($_POST['correo_amigo'])==0)
			{
				$hayerrores = true; 
				$errores[$i++] = $textos['correo_amigo2'];	
			}
		}
		if ($_POST['correo']==$_POST['correo_amigo'])
		{
			$hayerrores = true; $errores[$i++] = $textos['correo_coincidente'];
		}
		else
		{
			require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS."securimage/securimage.php");
			$inmueble = new ModelInmuebles();
			if($inmueble->ObtenerRecomendacionAmigo($_GET['id'],$_POST['correo'],$_POST['correo_amigo']))
			{
				$hayerrores = true; 
				$errores[$i++] = $textos['enviada_recomendacion'];	
			}
		}
		// Validación del captcha
		$securimage = new Securimage();
		if ($securimage->check($_POST['ct_captcha']) == false)
		{
			$hayerrores = true; 
			$errores[$i++] = $textos['captcha'];
		}
		
		// Conversión de datos
		$datos=$_POST;
		return $datos;
	}
}
?>