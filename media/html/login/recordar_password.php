		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="index.php"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace"><?php echo  $textos['titulo_seccion']; ?></span></div>
			<p align="justify" class="titulo_seccion"><?php echo  $textos['titulo_seccion']; ?><p>
			<p align="justify"><?php echo  $textos['parrafo1']; ?></p>
			<p align="justify"><?php echo  $textos['parrafo2']; ?></p>
			<br/>
			<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresrecordarpass'])
				{
		?>
					<div class="titulo_errores"><strong><?php echo  $textos['informe_errores']; ?></strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresrecordarpass']); ?> <?php echo  $textos['errores_encontrados']; ?></div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresrecordarpass'] as $error)
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
			<form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
				<!-- Id. usuario -->
				<span style="text-align:left"><strong><?php echo  $campos['usuario']; ?> (*): </strong></span>
				<input class="campo_texto" name="usuario" id="usuario" type="text" size="10" title="<?php echo  $campos['usuario']; ?>" value="<?php if($_POST) { echo $_POST['nombre']; } ?>" style="margin-left:20px" tabindex="1" onchange="modificado=true" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false"><img id="boton_edita" alt="Enviar información" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>mail.png" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false"><?php echo  $campos['enviar_informacion']; ?></a>
			</form>
			<!--  Navegacion -->
			<p align="right">
				<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>&nbsp;&nbsp;
				<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
			</p>