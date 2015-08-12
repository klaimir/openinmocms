<?php
/*
InformesContratosArrendamientoInmueblePDF.class.php, v 2.4 2013/05/13

InformesContratosArrendamientoInmueblePDF - Clase para crear informes de los contratos de arrendamiento de los inmuebles en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesPDF.class.php");

/* load libraries */

// No son necesarias librerías adicionales

/**
*
* InformesContratosArrendamientoInmueblePDF
*
* Clase para crear informes de los contratos de arrendamiento de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesContratosArrendamientoInmueblePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesContratosArrendamientoInmueblePDF extends InformesPDF
{	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		parent::__construct($color,$pos_x,$pos_y,$tam_letra);
    }
			
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de el contrato de arrendamiento han sido creadas
	 *
	 * @param [id_contrato_arrendamiento]	Identificador del contrato de arrendamiento
	 * @param [cliente]						Identificador del cliente
	 * @param [inmueble]					Identificador del inmueble
	 *
	 * @return void
	 */
	 
	function ComprobarContratoArrendamientoBD($id_contrato_arrendamiento,$cliente,$inmueble)
	{	
		// Si no existen los directorios
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/");
		}
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/inmueble_".$inmueble."/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/inmueble_".$inmueble."/");
		}
		// Borramos la el fichero fisico de la carpeta
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf");
		}
	}
}
?>