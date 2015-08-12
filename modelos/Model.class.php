<?php
/*
Model.class.php, v 2.4 2013/05/13

Model - Clase general para configurar la conexión automáticamente con la base de dates, así como para manipularla

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases auxiliares

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'adodb/adodb.inc.php');
require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'adodb/drivers/adodb-mysqli.inc.php');

/**
*
* Model
*
* Clase general para configurar la conexión automáticamente con la base de dates, así como para manipularla
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Model.class.php, v 2.4 2013/05/13
* @access   public
*/

class Model extends ADODB_mysqli
{
    /**
	 * Constructor
	 *
	 * Crea una conexión por defecto tomando como base los ficheros de configuración del sistema
	 */
	 
	function Model()
    {  
		if(!$this->IsConnected())
		{
			// Basamos la conexión en el fichero de configuración
			require(PATHINCLUDE_FRAMEWORK_CONFIG.'conexion.php');
			$this->PConnect($hostname,$username,$password,$database);
		}
    }   
}
?>