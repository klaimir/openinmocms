<?php
/*
ControlAcceso.class.php, v 2.4 2013/05/13

ControlAcceso - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlAcceso
*
* ControlAcceso - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlAcceso.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlAcceso extends Controlador
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
	 * Comprueba si el tiempo de acceso de los usuarios registrados ha expirado
	 *
	 *
	 * @return void
	 */
	 
	public static function ComprobarTiempoAccesoUsuarios()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Usuarios.class.php");
		// Conexión Base de datos
		$usuario_model = new ModelUsuarios();
		// Cada vez que se acceda a la aplicación se realizará un testeo del número de usuarios que llevan más de 365 días desde 
		// su último acceso, o bien, desde que se creó la cuenta hasta el día actual han pasado más de 365 días que no hayan sido 
		// notificados y cuya cuenta esté activa. Se realizará en dos tandas diferenciadas:
		// ---------------* USUARIOS CON ACCESO *----------------		
		$sql_consulta_1_usuarios_acceso="SELECT max(id_historico) AS id_historico, usuario FROM historicos_usuario WHERE accion='Conectar' OR accion LIKE '%Habilitar cuenta usuario%' GROUP BY usuario";
		$sql_consulta_2_usuarios_acceso="SELECT usuario FROM historicos_usuario WHERE DATEDIFF(NOW(),fecha_hora)>365 AND (accion='Conectar' OR accion LIKE '%Habilitar cuenta usuario%') AND usuario IN (SELECT id_usuario FROM usuarios WHERE cuenta_activa=1 AND notif_ult_acceso=0) AND (id_historico, usuario) IN (".$sql_consulta_1_usuarios_acceso.") GROUP BY usuario";
		$usuarios_acceso = $usuario_model->Execute($sql_consulta_2_usuarios_acceso) or die($usuario_model->ErrorMsg());
		$num_usuarios_acceso = $usuarios_acceso->RecordCount();
		$usuario_acceso = $usuarios_acceso->FetchRow();
		if($num_usuarios_acceso>0)
		{
			do
			{
				$usuario_model->id_usuario=$usuario_acceso['usuario'];
				$usuario_model->InhabilitacionCuentaUsuarioPorInactividad();
			} while ($usuario_acceso = $usuarios_acceso->FetchRow());
		}
	}
}
?>