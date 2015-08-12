		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php"><?php echo  $textos['buscador']; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="ver_datos_adicionales.php?id=<?php echo  $_GET['id'];?>"><?php echo  $textos['detalles']; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace"><?php echo  $textos['titulo_seccion']; ?></span></div>
		<p align="justify" class="titulo_seccion"><?php echo  $textos['titulo_seccion']; ?></p>
		<p  align="justify"><?php echo  $textos['frase_campos']; ?>:</p>	
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroressolicitarinformacion'])
				{
		?>
					<div class="titulo_errores"><strong><?php echo  $textos['informe_errores']; ?></strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroressolicitarinformacion']); ?> <?php echo  $textos['errores_encontrados']; ?></div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroressolicitarinformacion'] as $error)
					{
		?>		
						<li><?php echo  $error; ?></li>
		<?php
					}
		?>
					</ul>
					</div>
					<br />
		<?php
				}
			}
		?>
		<center>
		<form action=""  name="formulario" id="formulario" method="post" enctype="multipart/form-data">
		<!-- Nombre -->	
		<span style="text-align:left;"><?php echo  $campos['nombre']; ?>: </span>
		<br  />
		<input class="campo_texto" name="nombre" id="nombre" type="text" size="50" title="<?php echo  $campos['nombre']; ?>" value="<?php if($_POST['nombre']) echo $_POST['nombre']; ?>" >
		<br  /><br  />
		<!-- Correo -->
		<span style="text-align:left;"><?php echo  $campos['correo']; ?>:  </span>
		<br  />
		<input class="campo_texto" name="correo" id="correo" size="50" title="<?php echo  $campos['correo']; ?>" value="<?php if($_POST['correo']) echo $_POST['correo']; ?>" >		
		<br  /><br  />
		<!-- Mensaje -->
		<span style="text-align:left"><?php echo  $campos['mensaje']; ?>: </span><br />
		<textarea name="mensaje" style="text-align:left; width:50%; margin-top:3px" id="mensaje" rows="10" title="<?php echo  $campos['mensaje']; ?>" onchange="modificado=true"><?php if($_POST['mensaje']) echo $_POST['mensaje']; ?></textarea>
		<br  /><br  />
		<p align="left">
			<img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo  $_SESSION['rutalibs']; ?>securimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
			<object type="application/x-shockwave-flash" data="<?php echo  $_SESSION['rutalibs']; ?>securimage/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo  $_SESSION['rutalibs']; ?>securimage/images/audio_icon.png&amp;audio_file=<?php echo  $_SESSION['rutalibs']; ?>securimage/securimage_play.php" height="32" width="32">
			<param name="movie" value="<?php echo  $_SESSION['rutalibs']; ?>securimage/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo  $_SESSION['rutalibs']; ?>securimage/images/audio_icon.png&amp;audio_file=<?php echo  $_SESSION['rutalibs']; ?>securimage/securimage_play.php" />
			</object>
			&nbsp;
			<a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo  $_SESSION['rutalibs']; ?>securimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="<?php echo  $_SESSION['rutalibs']; ?>securimage/images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a>
			<br /><br />
			<span><?php echo  $campos['captcha']; ?>:</span>
			<br />
			<input type="text" name="ct_captcha" size="17" maxlength="16" />
	  	</p>
		<input type="hidden" name="id" value="<?php echo  $_GET['id'];?>"/>
		</form>
		</center>
		<br />
		<p align="center">
        	<!-- Botón formulario -->	
			<a href="#" onclick="document.formulario.submit();return false"><img id="boton_inserta_bd" alt="<?php echo  $textos['enviar_solicitud']; ?>" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>mail.png" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false"><?php echo  $textos['enviar_solicitud']; ?></a>	
        	<!-- Botón resetear -->	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset();"><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset();"><?php echo  $textos['limpiar_todo']; ?></a>
		</p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="ver_datos_adicionales.php?id=<?php echo  $_GET['id'];?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="ver_datos_adicionales.php?id=<?php echo  $_GET['id'];?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>