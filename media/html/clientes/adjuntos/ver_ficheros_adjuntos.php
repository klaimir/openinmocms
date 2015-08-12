		 <p align="justify">
<?php
		// Conexión Base de datos
		$DB = new Model();
		
		while ($archivo = readdir($directorio))
		{
			if($archivo !='.' && $archivo != '..' )
			{
				// comprobamos si es un directorio o un archivo
				if (!is_dir($dir . $archivo))
				{
					// Si no es un directorio, mostramos el fichero con un enlace
					// para la descarga del mismo
					if(round(filesize($dir . $archivo)/1024,2) != 0)
					{
						$directorio_vacio=false;
						$sql_fichero = "SELECT * FROM ficheros_cliente WHERE fichero='" . $archivo . "'";
						$fichs = $DB->Execute($sql_fichero) or die($DB->ErrorMsg());
						$fich = $fichs->FetchRow();	
						
						// Mostramos informacion del archivo
						$extension=substr($fich['fichero'],-3);
						switch($extension)
						{
							case "jpg":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>pic.gif" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "gif":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>pic.gif" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "png":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>pic.gif" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "zip":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>zip.gif" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "rar":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>zip.gif" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "doc":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>word.jpg" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "pdf":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							case "xls":
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>excel.jpg" align="absmiddle" />&nbsp;
                            <?php
								break;
							}
							default:
							{
							?>
                            	<img src="<?php echo  $_SESSION['rutaimg'];?>blank.gif" align="absmiddle" />&nbsp;
                            <?php
							}
						}
						// Se agrega a los enlaces web externos el directorio para los adjuntos
						// $dir_enlace, definido al comienzo de la función, en lugar del directorio
						// físico que se utilizará al realizar las operaciones ($dir).
?>
                        &nbsp;<a target="_blank" href="<?php echo  $dir_enlace . $archivo;?>"><?php echo  $fich['texto_fichero']; ?></a> (<?php echo  round(filesize($dir . $archivo)/1024,2); ?> KBytes)
						&nbsp;&nbsp;&nbsp;
						<a target="_blank" href="<?php echo  $dir_enlace . $archivo;?>"><img border="none" src="<?php echo  $_SESSION['rutaimg'];?>download.gif" align="absmiddle" /></a>
						&nbsp;&nbsp;&nbsp;
						<a href="estas_seguro.php?id_fichero=<?php echo  $fich['id_fichero']; ?>&id=<?php echo  $_GET['id']; ?>"><img border="none" src="<?php echo  $_SESSION['rutaimg'];?>borrar.gif" align="absmiddle" /></a>
						<br />
<?php
					}
				}
			}
		}
?>
		</p>
<?php
		if($directorio_vacio)
		{
?>
			<p align="justify"><img src="<?php echo  $_SESSION['rutaimg'];?>info.gif" align="absmiddle" />&nbsp;No hay ficheros adjuntos.</p>
<?php
		}		
?>
		<p align="center"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" />&nbsp;<a href="insertar.php?id=<?php echo  $_GET['id']; ?>">Insertar nuevo fichero adjunto</a></p>