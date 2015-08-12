<?php
/*
Model.class.php, v 2.4 2013/05/13

Model - Clase general para configurar la conexi�n autom�ticamente con la base de dates, as� como para manipularla

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
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
* Clase general para configurar la conexi�n autom�ticamente con la base de dates, as� como para manipularla
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
	 * Crea una conexi�n por defecto tomando como base los ficheros de configuraci�n del sistema
	 */
	 
	function Model()
    {  
		if(!$this->IsConnected())
		{
			// Basamos la conexi�n en el fichero de configuraci�n
			require(PATHINCLUDE_FRAMEWORK_CONFIG.'conexion.php');
			$this->PConnect($hostname,$username,$password,$database);
		}
    }   
}
?>