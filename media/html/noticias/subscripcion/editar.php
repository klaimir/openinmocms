		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Noticias</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Subscripción de Noticias</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar canal de noticias</span></div>
        <p align="justify" class="titulo_seccion">Subscripción de Noticias</p>		
		<div class="regla_horizontal_superior">
			<div style="float:left;">
			<!-- Actualizar en BD -->
			<a href="#" onclick="document.editar_noticia.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar_noticia.submit();return false">Actualizar en BD</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- Ver Informe -->
			<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="detalle_pdf.php?id=<?php echo  $_GET['id'];?>" target="_blank">Informe</a>	
			</div>
			<div style="float:right; padding-top:4px;">
			<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
			&nbsp;&nbsp;
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresmodificarnoticia'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresmodificarnoticia']); ?> error (es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresmodificarnoticia'] as $error)
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
				unset($_SESSION['hayerroresmodificarnoticia']);
				unset($_SESSION['erroresmodificarnoticia']);
			}
		?>
		<form action=""  name="editar_noticia" id="editar_noticia" method="post" enctype="multipart/form-data">
		<?php include('form_noticia.php'); ?>
		<input type="hidden" name="id" value="<?php echo  $_GET['id']; ?>"  />
		</form>
		<br  />
		<div class="regla_horizontal_inferior">
			<div style="float:left;">
			<!-- Actualizar en BD -->
			<a href="#" onclick="document.editar_noticia.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar_noticia.submit();return false">Actualizar en BD</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- Ver Informe -->
			<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="detalle_pdf.php?id=<?php echo  $_GET['id'];?>" target="_blank">Informe</a>	
			</div>
			<div style="float:right; padding-top:7px;">
			<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
			&nbsp;&nbsp;
			<!--  Navegacion -->
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
			</div>
		</div>
		<br clear="all" />