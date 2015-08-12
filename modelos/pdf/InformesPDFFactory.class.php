<?php
/*
InformesPDFFactory.class.php, v 2.4 2013/05/13

InformesPDFFactory - Clase factoria para crear informes pdf

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_MODELOS."FactoryInterface.class.php");
require_once("InformesContratosArrendamientoInmuebleTemporadaPDF.class.php");
require_once("InformesContratosArrendamientoInmuebleTemporadaAmuebladaPDF.class.php");
require_once("InformesContratosArrendamientoInmuebleFincasUrbanasPDF.class.php");
require_once("InformesFacturasContratosCompraVentaInmueblePDF.class.php");
require_once("InformesFacturasContratosArrendamientoInmueblePDF.class.php");

/* load libraries */

// No son necesarias libraries auxiliares

/**
*
* InformesPDFFactory
*
* Clase factoría para crear informes pdf
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FactoryInformes.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesPDFFactory implements FactoryInterface
{
	/**
	 * Constructor
	 *
	 */
	 
	function InformesPDFFactory()
    {		
    }
	
	/** 
    * Función de creación de informes pdf. Recibe el tipo informe a crear y retorna una instancia valida 
    * 
    * @access public static 
    * @param  string $type 
    * @return object 
    */  
    static public function Create($type)  
    {  
        switch ($type)
		{  
            case '1': return new InformesContratosArrendamientoInmuebleTemporadaPDF();  
            case '2': return new InformesContratosArrendamientoInmuebleTemporadaAmuebladaPDF();  
            case '3': return new InformesContratosArrendamientoInmuebleFincasUrbanasPDF();
			case '4': return new InformesFacturasContratosCompraVentaInmueblePDF();
			case '5': return new InformesFacturasContratosArrendamientoInmueblePDF();
            default:  
            	throw new Exception('Tipo de informe pdf desconocido');  
        }  
    } 
}
?>