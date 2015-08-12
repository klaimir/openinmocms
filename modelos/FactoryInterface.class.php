<?php
/*
FactoryInterface.class.php, v 2.4 2013/05/13

FactoryInterface - Interface para usar en el patr�n factor�a

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases auxiliares

/* load libraries */

// No son necesarias libraries auxiliares

/**
*
* FactoryInterface
*
* Interface para usar en el patr�n factor�a
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FactoryInterface.class.php, v 2.4 2013/05/13
* @access   public
*/

interface FactoryInterface
{  
	static public function Create($type);  
}
?>