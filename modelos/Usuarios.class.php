<?php
/*
Usuarios.class.php, v 2.4 2013/05/13

ModelUsuarios - Clase gestionar todas las peticiones y operaciones relacionadas con los usuarios registrados

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');
require_once('HistoricoUsuarios.class.php');

/* load libraries */

// No son necesarias librer�as auxiliares

/**
*
* ModelUsuarios
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los usuarios registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Usuarios.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelUsuarios extends Model
{
    public $id_usuario;
	public $nombre;
	public $apellidos;
	public $correo;
	public $nif;
	public $nick;
	public $password;
	public $fecha_alta;
	public $num_accesos;
	public $cuenta_activa;
	public $notif_ult_acceso;
	public $perfil;
	public $historico_usuario; // Objeto hist�rico de usuario
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelUsuarios()
    {  
		parent::Model();
		$this->id_usuario=NULL;
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->correo=NULL;
		$this->nif=NULL;
		$this->nick=NULL;
		$this->password=NULL;
		$this->fecha_alta=NULL;
		$this->num_accesos=NULL;
		$this->cuenta_activa=NULL;
		$this->notif_ult_acceso=NULL;
		$this->perfil=NULL;
		$this->historico_usuario = new ModelHistoricoUsuarios();
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuraci�n
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_usuario'])) $this->id_usuario=$datos['id_usuario'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['correo'])) $this->correo=$datos['correo'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['nick'])) $this->nick=$datos['nick'];
		if(isset($datos['password'])) $this->password=$datos['password'];
		if(isset($datos['fecha_alta'])) $this->fecha_alta=$datos['fecha_alta'];
		if(isset($datos['num_accesos'])) $this->num_accesos=$datos['num_accesos'];
		if(isset($datos['cuenta_activa'])) $this->cuenta_activa=$datos['cuenta_activa'];
		if(isset($datos['notif_ult_acceso'])) $this->notif_ult_acceso=$datos['notif_ult_acceso'];
		if(isset($datos['perfil'])) $this->perfil=$datos['perfil'];
    }
	
	/**
	 * Inserta un usuario en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM usuarios WHERE id_usuario = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualizaci�n de un usuario registrando el evento hist�rico
	 *
	 * @param [datos]		Array con los diferentes valores a editar
	 * @param [nick]		Nick del usuario
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$nick)
    {
		// Se consulta el usuario antes de modificar
		$sql_usuarios="SELECT * FROM usuarios WHERE nick='".$nick."'";
		$dato_usuario_antes_cambiar = $this->GetRow($sql_usuarios) or die($this->ErrorMsg());
		
		// Actualizamos el usuarios
		$this->UpdateBD($datos,$nick);
		
		// Si se habilitado la cuenta porque estaba inhabilitada
		if($datos['cuenta_activa']!=$dato_usuario_antes_cambiar['cuenta_activa'])
		{
			require_once("HistoricoUsuarios.class.php");
			// Datos de hist�rico de usuario
			$historico_usuario = new ModelHistoricoUsuarios();
			// Si se activa la cuenta
			if($dato_usuario_antes_cambiar['cuenta_activa']==0)
			{
				// Los datos s�lo se cambian si varian
				if($dato_usuario_antes_cambiar['notif_ult_acceso']!=0 || $dato_usuario_antes_cambiar['num_accesos']!=0)
				{
					// Datos de actualizaci�n
					$datos_formateados['notif_ult_acceso']=0;
					$datos_formateados['num_accesos']=0;
					// Se actualiza el n�mero de acceso del usuario
					$this->UpdateBD($datos_formateados,$datos['usuario']);
				}
				// Se inserta un evento de validaci�n para controlar que se le den 365 d�as m�s
				$historico_usuario->Insert(NULL,$dato_usuario_antes_cambiar['id_usuario'],"Habilitar cuenta usuario (".$datos['usuario'].")");
			}
			else
			{
				// Se inserta un evento de inhabilitaci�n
				$historico_usuario->Insert(NULL,$dato_usuario_antes_cambiar['id_usuario'],"Deshabilitar cuenta usuario (".$datos['usuario'].")");
			}
		}
		
		// Hay que actualizar los datos de sesi�n si se actualiza el usuario,
		// y adem�s es el mismo que est� iniciando sesi�n
		if($_SESSION['usu']==$datos['usuario'])
		{
			// Configuraci�n de datos para sesi�n
			$dato_usuario_despues_cambiar=$datos;
			$dato_usuario_despues_cambiar['perfil']="administrador";
			$dato_usuario_despues_cambiar['id_usuario']=$dato_usuario_antes_cambiar['id_usuario'];
			$this->Set($dato_usuario_despues_cambiar);
			// Login
			$sesion = new Session();
			$sesion->EstablecerDatosSesion($this);
		}
    }
	
	/**
	 * Actualiza un usuario en la base de datos con los datos indicados 
	 *
	 * @param [datos]		Array con los diferentes valores a editar
	 * @param [nick]		Nick del usuario
	 *
	 * @return Devuelve true o false
	 */
	 
	function UpdateBD($datos,$nick)
    {  
		$sql = "SELECT * FROM usuarios WHERE nick = '".$nick."'";
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		// Si hay diferencia, actualiza
		if(array_diff($rs_row,$datos))
		{
			$UpdateSQL = $this->GetUpdateSQL($rs,$datos);
			return $this->Execute($UpdateSQL) or die($this->ErrorMsg());
		}
		else
			return true;
    }
	
	/**
	 * Elimina un usuario de la base de datos
	 *
	 * @param [id_usuario]	Indentificador del usuario
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_usuario)
    {  
		// Finalmente borra el usuario de la tabla usuarios
		$sql = "DELETE FROM usuarios WHERE id_usuario='".$id_usuario."'";
		$this->Execute($sql) or die($this->ErrorMsg());
    }
	
	/**
	 * Inhabilita la cuenta de usuario activa en el objeto e informa al mismo a trav�s de un correo
	 *
	 * @return Devuelve true o false
	 */
	 
	function InhabilitacionCuentaUsuarioPorInactividad()
    {  
		// Se realizan las siguientes acciones:
		// - Se inhabilita su cuenta de usuario.
		// - Se anota el aviso realizado al usuario.
		// - Se indica que no ha accedido por primera vez al aplicativo
		$updateSQL = sprintf("UPDATE usuarios SET cuenta_activa=0, notif_ult_acceso=1, num_accesos=0 WHERE id_usuario=%s",
					   GetSQLValueString($this->id_usuario, "text"));
		$this->Execute($updateSQL) or die($this->ErrorMsg());
		// Env�o de correo electr�nico
		$datos_usuario = $this->Execute("SELECT * FROM usuarios WHERE id_usuario='".$this->id_usuario."'") or die($this->ErrorMsg());
		$dato_usuario = $datos_usuario->FetchRow();
		$num_datos_usuario = $datos_usuario->RecordCount();
		// enviar correo si existe
		$this->correo=$dato_usuario['correo'];
		return $this->EnviarEmailDeshabilitacionCuentaUsuario();
    }
	
	/**
	 * Env�a un email de notificaci�n de deshabilitaci�n de cuenta de usuario
	 *
	 * @return Devuelve true o false
	 */
	 
	function EnviarEmailDeshabilitacionCuentaUsuario()
	{
		// Fecha del envio
		$fecha_reg=date("d/m/Y");		
		// Texto del correo		
		$texto_correo='<center>'.cabecera_correo_html(). asunto_correo_html("Inhabilataci�n de cuenta de usuario de ".NOMBRE_EMPRESA, "Este correo ha sido enviado autom�ticamente desde el aplicativo ".NOMBRE_EMPRESA." porque a fecha de ".$fecha_reg." lleva m�s de 365 d�as sin acceder al aplicativo desde la creaci�n de su cuenta de usuario o desde el �ltimo acceso realizado, y por consiguiente, <strong>su cuenta de usuario ha sido inhabilitada temporalmente</strong>. <br />Si desea volver a acceder al aplicativo deber� de solicitarlo al administrador."). pie_correo_html().'</center>';		
		$asunto = NOMBRE_EMPRESA.' � Inhabilitaci�n de cuenta de usuario';
		$direccion = $this->correo;
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."mail/PHPMailerApp.class.php");
		// Creamos el objeto
		$mail = new PHPMailerApp();
		// Captaci�n de errores
		try 
		{
			// Indicamos cual es la direcci�n de destino del correo
			$mail->AddAddress($direccion, $asunto);			
			// Asignamos asunto y cuerpo del mensaje
			$mail->Subject = $asunto;					
			$mail->Body = $texto_correo;
			// Definimos AltBody por si el destinatario del correo no admite email con formato html 
			$mail->AltBody = $texto_correo;
			//se envia el mensaje, si no ha habido problemas la variable $exito tendra el valor true
			return $mail->Send();
		}
		catch (phpmailerException $e)
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]=$e->errorMessage();
			header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
			exit();
		}
		// Si todo fue bien
		return true;		
	}
	
	/**
	 * Recupera todos los datos de un determinado usuario
	 *
	 * @param [nombre_campo_clave]	Nombre del campo clave para la b�squeda
	 * @param [valor_campo_clave]	Valor asignado al campo clave para la b�squeda
	 *
	 * @return Devuelve todos los datos del usuario encontrado
	 */
	 
	function ObtenerDatosUsuario($nombre_campo_clave,$valor_campo_clave)
	{
		// Datos del usuarios
		$sql="SELECT * FROM usuarios WHERE ".$nombre_campo_clave." = '".$valor_campo_clave."'";
		//$usuario = $this->GetRow($sql) or die($this->ErrorMsg());	
		$usuario = $this->Execute($sql) or die($this->ErrorMsg());
		$row_usuario = $usuario->FetchRow();	
		return $row_usuario;
	}
	
	/**
	 * Comprueba si el usuario identificado puede acceder al sistema
	 *
	 *
	 * @return Devuelve true o false
	 */
	 
	function ComprobarAcceso()
    {  
		// Consulta
		$LoginRS__query=sprintf("SELECT * FROM usuarios WHERE cuenta_activa=1 AND nick='%s' AND password='%s'",	get_magic_quotes_gpc() ? $this->nick : addslashes($this->nick), get_magic_quotes_gpc() ? $this->password : addslashes($this->password));	
		$LoginRS = $this->Execute($LoginRS__query) or die($this->ErrorMsg());
		$row_login = $LoginRS->FetchRow();
		// Establecemos datos del usuario
		$this->Set($row_login);
		return $loginFoundUser = $LoginRS->RecordCount();
    }
	
	/**
	 * Comprueba si el usuario identificado puede acceder al sistema
	 *
	 *
	 * @return Devuelve true o false
	 */
	
	function Login()
	{
		// Login
		$sesion = new Session();
		$sesion->EstablecerDatosSesion($this);
		// Se inserta el evento en el hist�rico
		return $this->historico_usuario->Update($this->id_usuario,"Conectar");
	}
	
	/**
	 * Genera una contrase�a aleatoria para el usuario y la reenv�a por correo
	 *
	 *
	 * @return Devuelve true o false
	 */
	
	function EstablecerNuevoPassword()
	{
		// Se genera de forma aleator�a la contrase�a
		$password=generar_cadena_aleatoria("a","z",10);			
		// Se env�a la nueva constrase�a
		$this->password=$password;
		$this->EnviarEmailRecordarPassword();
		// Se almacena la constrase�a encriptada
		// Actualizar el n� accesos a 0 para que pueda cambiar la constrase�a generada
		$datos['num_accesos']=0;
		$datos['password']=md5($password);
		$this->UpdateBD($datos,$this->nick);
	}
	
	/**
	 * Env�a un correo de notificaci�n de la contrase�a generada
	 *
	 *
	 * @return Devuelve true o false
	 */
	function EnviarEmailRecordarPassword()
	{
		// Fecha del envio
		$fecha_reg=date("d/m/Y");		
		// Texto del correo		
		$texto_correo='<center>'.cabecera_correo_html(). asunto_correo_html("Datos de Acceso de ".NOMBRE_EMPRESA, "Este correo ha sido enviado autom�ticamente desde el aplicativo ".NOMBRE_EMPRESA." debido a que ha solicitado a fecha de ".$fecha_reg." que se le recordar�n sus datos de acceso. Por motivos de seguridad, se ha generado una nueva contrase�a aleatoria que podr� cambiar cuando vuelva a acceder a la aplicaci�n.") . datos_acceso_app_correo_html($this->nick,$this->password). pie_correo_html().'</center>';		
		$asunto = NOMBRE_EMPRESA.' � Datos de Acceso';
		$direccion = $this->correo;
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."mail/PHPMailerApp.class.php");
		// Creamos el objeto
		$mail = new PHPMailerApp();
		// Captaci�n de errores
		try 
		{
			// Indicamos cual es la direcci�n de destino del correo
			$mail->AddAddress($direccion, $asunto);			
			// Asignamos asunto y cuerpo del mensaje
			$mail->Subject = $asunto;					
			$mail->Body = $texto_correo;
			// Definimos AltBody por si el destinatario del correo no admite email con formato html 
			$mail->AltBody = $texto_correo;
			//se envia el mensaje, si no ha habido problemas la variable $exito tendra el valor true
			$mail->Send();
		}
		catch (phpmailerException $e)
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]=$e->errorMessage();
			header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
			exit();
		}
		// Si todo fue bien
		return 1;
	}
}
?>