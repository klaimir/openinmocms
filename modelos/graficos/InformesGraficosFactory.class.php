<?php
/*
InformesGraficosFactory.class.php, v 2.4 2013/05/13

InformesGraficosFactory - Clase factoria para crear informes gráficos

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
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
* Clase factoría para crear informes gráficos
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
    * Función de creación de informes gráficos. Recibe el tipo informe a crear y retorna una instancia valida 
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
            	throw new Exception('Tipo de informe gráfico desconocido');  
        }  
    } 
}
?>