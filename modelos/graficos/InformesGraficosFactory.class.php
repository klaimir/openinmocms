<?php
/*
InformesGraficosFactory.class.php, v 2.4 2013/05/13

InformesGraficosFactory - Clase factoria para crear informes gr�ficos

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_MODELOS."FactoryInterface.class.php");
require_once("InformesGraficosPie.class.php");
require_once("InformesGraficosPlot.class.php");
require_once("InformesGraficosPDF.class.php");

/* load libraries */

// No son necesarias libraries auxiliares

/**
*
* InformesGraficosFactory
*
* Clase factor�a para crear informes gr�ficos
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FactoryInformes.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesGraficosFactory implements FactoryInterface
{
	/**
	 * Constructor
	 *
	 */
	 
	function InformesGraficosFactory()
    {		
    }
	
	/** 
    * Funci�n de creaci�n de informes gr�ficos. Recibe el tipo informe a crear y retorna una instancia valida 
    * 
    * @access public static 
    * @param  string $type 
    * @return object 
    */  
    static public function Create($type)  
    {  
        switch ($type)
		{  
            case 'pie': return new InformesGraficosPie();  
            case 'plot': return new InformesGraficosPlot();  
            case 'pdf': return new InformesGraficosPDF();  
            default:  
            	throw new Exception('Tipo de informe gr�fico desconocido');  
        }  
    } 
}
?>