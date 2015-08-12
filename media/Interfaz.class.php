<?php
/*
Interfaz.class.php, v 2.4 2013/05/13

Interfaz - Clase para manejar la interfaz de usuario y sus plantillas

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases adicionales

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');

/**
*
* Interfaz
*
* Clase para manejar la interfaz de usuario y sus plantillas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Interfaz.class.php, v 2.4 2013/05/13
* @access   public
*/

class Interfaz
{	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct()
    {
    }
	
	/**
	 * Imprime las opciones extras de la cabecera
	 *
	 *
	 * @return void
	 */
	 
	public static function OpcionesExtras()
	{
		// Comprueba si está iniciada la sesión
		$session=new Session();
		$sesion_iniciada=$session->SesionIniciada();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/opciones_extras.php');
	}
	
	/**
	 * Imprime la cabecera
	 *
	 *
	 * @return void
	 */
	
	public static function Cabecera()
	{
		// Comprueba si está iniciada la sesión
		$session=new Session();
		$sesion_iniciada=$session->SesionIniciada();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/cabecera.php');
	}
	
	/**
	 * Imprime el menú principal
	 *
	 * @param [seccion]		Sección de menú seleccionada
	 *
	 * @return void
	 */
	
	public static function Menu($seccion)
	{
		// Comprueba si está iniciada la sesión
		$session=new Session();
		$sesion_iniciada=$session->SesionIniciada();
		// Se traduce
		if(!$sesion_iniciada)
		{
			// Par de traducción
			$translator = Translator::getInstance();
			// Textos
			$textos['buscador']=$translator->TraducirTexto("Buscador");
			$textos['noticias']=$translator->TraducirTexto("Noticias");
			$textos['certificacion_energetica']=$translator->TraducirTexto("Certificación");
		}
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/menu.php');
	}
	
	/**
	 * Imprime la imagen de cabecera
	 *
	 *
	 * @return void
	 */
	
	public static function Imagen()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/imagen.php');
	}
	
	/**
	 * Imprime el pie
	 *
	 *
	 * @return void
	 */
	
	public static function Pie()
	{
		// Par de traducción
		$translator = Translator::getInstance();
		// Textos
		$textos['buscador']=$translator->TraducirTexto("BUSCADOR DE INMUEBLES");
		$textos['enlace']=$translator->TraducirTexto("Web principal de ". NOMBRE_EMPRESA);
		$textos['parrafo']=$translator->TraducirTexto(NOMBRE_EMPRESA." Informa: A todos nuestros clientes interesados en la adquisición de algunos de nuestros inmuebles, les serán facilitadas escrituras o nota simple informativa actualizada. El comprador debe abonar ITP, gastos de registro y honorarios de la Agencia. El consumidor tiene derecho a la entrega del D.I.A.");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/pie.php');
	}
	
	/**
	 * Imprime la plantilla de interfaz genérica
	 *
	 *
	 * @return void
	 */
	
	public static function PlantillaGenerica($opcion_menu,$interfaz)
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/plantilla_interfaz_generica.php');
	}
	
	/**
	 * Imprime la plantilla de interfaz para las secciones relacionadas con el login
	 *
	 *
	 * @return void
	 */
	 
	public static function PlantillaLogin($interfaz)
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/plantilla_interfaz_login.php');
	}
}
?>