<?php
	/**
	 * Realiza una copia de seguridad del sistema y la remite por correo
	 *
	 * @param [tipo_copia]		Modo de realización de la copia de seguridad. Puede contener los valores sql - Sólo hace una copia de la sql o directorios - Sólo hace copia de los directorios especificados o completa - hace las dos anteriores simultáneamente
	 *
	 * @return true or false
	 */
	 
	function realizar_backup($tipo_copia='sql')
	{		
		// Include
		require(PATHINCLUDE_FRAMEWORK."config/conexion.php");
		require(PATHINCLUDE_FRAMEWORK."librerias/MySQLDump.class.php");
		require(PATHINCLUDE_FRAMEWORK_CONFIG."config_backup.php");
		
		// Fichero de log
		$filenamelogbackup=date("Y-m-d")."-log.txt";
		
		// dominio del backup
		$dominio = DOMINIO_BACKUP_FRAMEWORK;
		// establezca el directorio temporal. Ruta relativa a este script o ruta absoluta al directorio
		// si está vacío, usaremos la carpeta temp del mismo directorio de este archivo
		// asegúrese que la carpeta temp tiene permisos de escritura
		$temp = '';
		if ( empty($temp) ) $temp = TEMP_BACKUP_FRAMEWORK;
		 
		// establezca la ruta absoluta o relativa a este script para depositar la copia final
		// si no se establece esta ruta, se depositará en la carpeta $temp definida anteriormente
		$dir_copia = DIR_BACKUP_FRAMEWORK;
		if ( empty($dir_copia) ) $dir_copia = $temp;
		
		// No se realiza el backup si ya se ha hecho el día actual
		$finalfilename = $dir_copia.$dominio.'-'.date("Y-m-d").'.'.EXTENSION_COMPRESION_FINAL_BACKUP_FRAMEWORK;

		//establecemos los directorios a salvar
		$directorio[] = PATHINCLUDE_FRAMEWORK_DOC."inmuebles";
		
		//establecemos la variable $mensaje_error vacía para añadir los errores que vayan ocurriendo
		$mensaje_error = '';
		 
		//establecemos la variable $log que nos servirá para guardar un registro de lo que vamos haciendo
		$log = '';
		 
		//establecemos la variable $para_comprimir vacía para añadir los campos concatenados de lo que vamos a comprimir en el archivo final
		$para_comprimir = '';
		 
		if ( empty($tipo_copia) )
		{
			$mensaje_error .= 'No se ha especicado el tipo de copia';
		}
		else
		if ( $tipo_copia =='completa' | $tipo_copia == 'sql' | $tipo_copia == 'directorios' )
		{
			//borramos el directorio temp
			rm( $temp.'/*' );
		 
			//comprobamos si se necesita copia de la base de datos
			if ( $tipo_copia == 'sql' | $tipo_copia == 'completa' )
			{
				$log .= "Inicio de la copia de seguridad del SQL\n";
				$filename.=$temp;
				$filename.=date("Y-m-d");
				$filename.="-".$database.".sql";
				$dump=new MySQLDump($database,$username,$password,$hostname);
				$dump->start($filename);
				$para_comprimir .= $filename.' ';
			}
		 
			//comprobamos si se necesita copia de los datos
			if ( $tipo_copia == 'directorios' | $tipo_copia == 'completa' )
			{
				$log .= "Inicio de la copia de seguridad de las carpetas\n";
				if ( !empty($directorio) && is_array($directorio) )
				{
					$directorios_ok = '';
					foreach ( $directorio as $dire )
					{
						if ( !empty($dire) && file_exists($dire) )
						{
							$directorios_ok .= $dire.' ';
							$log .= $dire."\n";
						}
						else
						{
							$directorios_mal[] = $dire.' ';
						}
					}
		 
					//recorremos los directorios que no sean accesibles y lo pasamos a errores y logs
					if ( !empty($directorios_mal) && is_array($directorios_mal) )
					{
						$mensaje_error .= "Los siguientes directorios no son accesibles:";
						$log .= "Los siguientes directorios no son accesibles:";
						foreach ( $directorios_mal as $dir_mal )
						{
							$mensaje_error .= $dir_mal."\n";
							$log .= $dir_mal."\n";
						}
					}
		 
					$comando = COMANDO_COMPRESION_DIR_FRAMEWORK." ".$temp."datos.".EXTENSION_COMPRESION_DIR_BACKUP_FRAMEWORK." ".$directorios_ok;
					$retorno = ejecutar($comando);
					if ( empty($retorno) ) $retorno = '(sin retorno)';
					$log .= "Retorno del comando encargado de empaquetar los directorios selecionados: $retorno\n";
					if ( file_exists( $temp.'datos.'.EXTENSION_COMPRESION_DIR_BACKUP_FRAMEWORK ) )
					{
						$tamano = filesize($temp.'datos.'.EXTENSION_COMPRESION_DIR_BACKUP_FRAMEWORK) / 1024;
						$log .= "El archivo con un tamaño de $tamano Kb. fue creado correctamente\n";
						$para_comprimir .= $temp.'datos.'.EXTENSION_COMPRESION_DIR_BACKUP_FRAMEWORK;
					}
					else
					{
						$log .= "No pudo crearse $temp/datos.".EXTENSION_COMPRESION_BACKUP_FRAMEWORK."\n";
					}
				}
				else
				{
					$mensaje_error .= "No ha definido los directorios a copiar";
				}
			}
			//Creamos el comprimido final
			$log .= "Inicio del generador del comprimido final con los datos:\n";
			if ( !empty ( $para_comprimir ) )
			{
				$finalfilename = $dir_copia.$dominio.'-'.date("Y-m-d").'.'.EXTENSION_COMPRESION_FINAL_BACKUP_FRAMEWORK;
				$comando = COMANDO_COMPRESION_FINAL_BACKUP_FRAMEWORK.' '.$finalfilename." $para_comprimir";
				$retorno = ejecutar($comando);
				if ( empty($retorno) ) $retorno = '(sin retorno)';
				$log .= "Retorno del comando encargado de generar el comprimido final: $retorno\n";
		 
				if ( file_exists( $finalfilename ) )
				{
					$tamano = filesize($finalfilename) / 1024;
					$log .= "El archivo con un tamaño de ".$tamano."Kb. fue creado correctamente\n";
				}
				else
				{
					$log .= "No pudo crearse $finalfilename\n";
				}
			}
		}
		else
		{
			$mensaje_error .= 'El tipo de copia especificado es incorrecto.';
		}
		// Almacenamos Log en el fichero
		$file = fopen(TEMP_BACKUP_FRAMEWORK.$filenamelogbackup, "w");
		fwrite($file,$log);
		fclose($file);
		// Envío de correo electrónico
		if ($mensaje_error=="")
		{
			// Se envían los datos por correo
			$info['backupfile']=$finalfilename;
			$info['logfile']=TEMP_BACKUP_FRAMEWORK.$filenamelogbackup;
			$info['email']=EMAIL_BACKUP_FRAMEWORK;
			enviar_correo_backup($info);
		?>
			<SCRIPT LANGUAGE="JavaScript">
				setTimeout("location.href='<?php echo  $_SESSION['rutaraiz'];?>app/acceso/index.php'", 2000);
			</SCRIPT>
		<?php
		}
		else
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]=$mensaje_error;
		?>
			<SCRIPT LANGUAGE="JavaScript">
				setTimeout("location.href='<?php echo  $_SESSION['rutaraiz'];?>media/error_general.php'", 2000);
			</SCRIPT>
		<?php
		}
	}
?>
<?php
	/**
	 * Envía un correo con la copia de seguridad realizada
	 *
	 * @param [info]		Información del correo
	 *
	 * @return true or false
	 */
	 
	function enviar_correo_backup($info)
	{
		ini_set('memory_limit', '500M');
		// Fecha del envio
		$fecha_reg=date("d/m/Y");
		// Texto del correo		
		$texto_correo='<center>'.cabecera_correo_html(). asunto_correo_html(NOMBRE_EMPRESA." - Copia de seguridad", "Este correo ha sido enviado automáticamente desde el aplicativo ".NOMBRE_EMPRESA." debido a que se ha realizado un backup a fecha de ".$fecha_reg.". Se le remiten como datos adjuntos el fichero de LOGs y la copia de seguridad del sistema.") . pie_correo_html().'</center>';		
		$asunto = NOMBRE_EMPRESA.' · Copia de seguridad';
		$direccion = $info['email'];
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."mail/PHPMailerApp.class.php");
		// Creamos el objeto
		$mail = new PHPMailerApp();
		// Captación de errores
		try 
		{
			// Indicamos cual es la dirección de destino del correo
			$mail->AddAddress($direccion);			
			// Asignamos asunto y cuerpo del mensaje
			$mail->Subject = $asunto;					
			$mail->Body = $texto_correo;
			// Definimos AltBody por si el destinatario del correo no admite email con formato html 
			$mail->AltBody = $texto_correo;
			// Adjuntos
			$mail->AddAttachment($info['backupfile']);
			$mail->AddAttachment($info['logfile']);
			//se envia el mensaje, si no ha habido problemas la variable $exito tendra el valor true
			return $mail->Send();
		}
		catch (phpmailerException $e)
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]=$e->errorMessage();
			?>
			<SCRIPT LANGUAGE="JavaScript">
				setTimeout("location.href='<?php echo  $_SESSION['rutaraiz'];?>media/error_general.php'", 1000);
			</SCRIPT>
			<?php
		}
		// Si todo fue bien
		return 1;
	}
?>
<?php
	/**
	 * Determina si se ha realizado el backup del día actual
	 *
	 *
	 * @return true or false
	 */
	 
	function backup_realizado()
	{
		require(PATHINCLUDE_FRAMEWORK_CONFIG."config_backup.php");
		$filenamebackup=TEMP_BACKUP_FRAMEWORK;
		$filenamebackup.=date("Y-m-d")."-log.txt";
		if(is_file($filenamebackup))
	   		return true;
		else
			return false;
	}
?>