<?php
/*
ControlAdjuntosClientes.class.php, v 2.4 2013/05/13

ControlAdjuntosClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ControlAdjuntosClientes
*
* ControlAdjuntosClientes - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlAdjuntosClientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlAdjuntosClientes extends Controlador
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
		// Conexión Base de datos
		$DB = new Model();
		
		// Comprobacion del fichero
		if (trim($_FILES['fichero']['name']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha seleccionado ningún fichero para asociar";
		}
		else
		{
			// Comprobamos si el fichero ya ha sido introducido
			$sql_ficheros = "SELECT * FROM ficheros_cliente WHERE fichero='" . $_FILES['fichero']['name'] . "' AND cliente='" . $_GET['id'] . "'";			
			$ficheros = $DB->Execute($sql_ficheros) or die($DB->ErrorMsg());
			$num_ficheros = $ficheros->RecordCount();
			
			if($num_ficheros != 0) {$hayerrores = true; $errores[$i++] = "El fichero ya está asignado al cliente actual";}
		}
		
		// Si se produce algún tipo de error, se guarda una descripción del error producido
		if (trim($_POST['texto']) == "") {$errores[$i] = "No se ha introducido el texto del fichero"; $i++; $hayerrores = true; }
		
		if(!$hayerrores)
		{
		 	$tamano_archivo = $_FILES['fichero']['size']; 
			if ($tamano_archivo > MB * MAXTAM_FICHADJUNT) 
			{ 
				$hayerrores  = true;
				$errores[$i++] = "El tamaño máximo para el fichero es de ". MAXTAM_FICHADJUNT ." Mb";
			}
		}
		
		// Hay que comprobar que el texto del fichero también se ha introducido,
		// ya que en caso contrario, moverá el fichero con datos incorrectos
		if(!$hayerrores)
		{
			if ($_FILES['fichero']['tmp_name'] != '' && !move_uploaded_file($_FILES['fichero']['tmp_name'], PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$_GET['id']."/adjuntos/". $_FILES['fichero']['name']))
			{
				$errores[$i] = "No se ha podido subir el fichero al servidor"; $i++; $hayerrores = true;
			}
		}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['fichero']=$_FILES['fichero']['name'];
		$datos['texto_fichero']=$_POST['texto'];
		$datos['cliente']=$_GET['id'];
		return $datos;
	}
}
?>