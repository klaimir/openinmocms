<?php
/*
PHPMailerApp.class.php, v 2.4 2013/05/13

PHPMailerApp - Esta clase sirve para encapsular la configuraci�n predeterminada, si se desea cambiar se cambiar� s�lo en esta clase

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases adicionales

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK."librerias/mail/phpmailer/class.phpmailer.php");

/**
*
* PHPMailerApp
*
* Esta clase sirve para encapsular la configuraci�n predeterminada, si se desea cambiar se cambiar� s�lo en esta clase
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  PHPMailerApp.class.php, v 2.4 2013/05/13
* @access   public
*/

class PHPMailerApp extends PHPMailer
{
	/**
	*	Constructor
	*
	*	Realiza conexi�n autom�tica en base al fichero de configuraci�n del sistema
	*/
	public function __construct() 
	{
   	 	// Constructor del padre (con validaci�n por lanzamiento de excepciones)
		parent::__construct(true);
		//Indicamos que vamos a usar un Mail
		$this->IsSendmail();
		
		//Indicamos cual es nuestra direcci�n de correo y el nombre que queremos que vea el usuario que lee nuestro correo
		$this->From = CORREO_ADMINISTRADOR_FRAMEWORK;
		$this->FromName = NOMBRE_EMPRESA;
		
		//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar una cuenta gratuita, por tanto lo pongo a 30  
		$this->Timeout=20;
        
        /*
        //Tell PHPMailer to use SMTP
        $this->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        $this->Debugoutput = 'html';
        //Set the hostname of the mail server
        $this->Host = "smtp.gmail.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $this->Port = 465;
        //Whether to use SMTP authentication
        $this->SMTPAuth = true;
        $this->SMTPSecure = "ssl";
        $this->Username = "angel.berasuain@gmail.com";
        $this->Password = "breakbeat";
         */
  	}  
}
?>