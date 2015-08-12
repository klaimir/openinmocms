<?php
/*
ControlAcceso.class.php, v 2.4 2013/05/13

ControlAcceso - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librer�as auxiliares

/**
*
* ControlAcceso
*
* ControlAcceso - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n
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
		// Conexi�n Base de datos
		$usuario_model = new ModelUsuarios();
		// Cada vez que se acceda a la aplicaci�n se realizar� un testeo del n�mero de usuarios que llevan m�s de 365 d�as desde 
		// su �ltimo acceso, o bien, desde que se cre� la cuenta hasta el d�a actual han pasado m�s de 365 d�as que no hayan sido 
		// notificados y cuya cuenta est� activa. Se realizar� en dos tandas diferenciadas:
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