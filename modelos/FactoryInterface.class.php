<?php
/*
FactoryInterface.class.php, v 2.4 2013/05/13

FactoryInterface - Interface para usar en el patrón factoría

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
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
* Interface para usar en el patrón factoría
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