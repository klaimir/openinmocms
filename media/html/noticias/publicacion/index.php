		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Noticias</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Publicaci�n de Noticias</span></div>
        <p align="justify" class="titulo_seccion">Publicaci�n de Noticias</p>
		<p align="justify">
        	<span><strong>1. Selecciona los criterios para la b�squeda:</strong></span>			
        	<span style="margin-left:640px; text-align:right">
				<a href="../index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../index.php">Volver</a>
            </span>
		</p>
	<?php
		// FILTRO PARA REALIZAR B�SQUEDAS
		// ------------------------------------------------------------------------------
		
		// Control de errores
		if ($_POST)
		{
			if($_SESSION['hayerroresbusqueda'])
			{
	?>
				<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresbusqueda']); ?> error(es) encontrado(s)</div>
				<div class="detalle_errores">
				<ul class="lista_errores">
	<?php
				foreach($_SESSION['erroresbusqueda'] as $error)
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
	  <form action="index.php" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
			<!-- T�tulo -->
			<span style="text-align:left">T�tulo: </span>
			<input class="campo_texto" name="titulo" id="titulo" type="text" size="100" title="T�tulo" value="<?php if($_POST) { echo $_POST['titulo']; } else { echo $_SESSION['titulo_busq_noticias']; } ?>" style="margin-left:20px" onchange="modificado=true" />
			<span style="text-align:left; margin-left:30px">Publicadas: </span>
			<input type="checkbox" value="1" style="margin-left:13px" name="publicar" id="publicar" <?php if ($_POST) { if ($_POST['publicar']) echo 'checked="checked"'; } else { if (isset($_SESSION['publicar_busq_noticias'])) if ($_SESSION['publicar_busq_noticias']) echo 'checked="checked"'; } ?> />
			<br />
			<!-- bot�n Buscar -->
			<p align="center">
				<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Bot�n resetear -->	
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('titulo').value=''; document.getElementById('publicar').checked=false; document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;			
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('titulo').value=''; document.getElementById('publicar').checked=false;  document.formulario.submit();return false" >Limpiar filtro</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a href="exportar_pdf.php" target="_blank">Exportar listado a PDF</a>
			</p>
		</form>
<?php        
		// FIN FILTRO B�SQUEDAS
		// ------------------------------------------------------------------------------------
?>
		<!-- Resultados de B�squeda -->					
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Informaci�n sobre noticias registrados
			</div>	
			<div style="width:70%; float:right; text-align:right">
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="insertar.php">Insertar noticia</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="<?php echo  $_SESSION['rutaimg'];?>rss.png" align="absmiddle" />&nbsp;&nbsp;<a target="_blank" href="<?php echo  $_SESSION['rutadocs'];?>rss_es.xml">Ver RSS</a>		
			</div>
			<br clear="all" />
		</div>
		<a name="listado"></a>
		<br clear="all" />	
	    <?php
		if ($num_noticias != 0)
		{
			// Datos de paginaci�n
			echo $_SESSION['display_pages_busq_noticias'];
			echo $_SESSION['display_menu_pages_busq_noticias'];
		?>			
		<br /><br />
		<table style="border:1px solid #004000" align="center"  width="100%" cellpadding="1" cellspacing="1">
			<tr class="cabecera_tabla">
				<td width="30%">T�tulo</td>
				<td width="55%">Descripci�n</td>
				<td width="10%">Fecha alta</td>
				<td>Publicar</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?php
				$j = 0;
				$k = 0;
				do
				{
					if($j==0)
					{
						$color='datos_tabla_impar'; $j=1;
					}
					else
					{
						$color='datos_tabla_par"'; $j=0;
					}
			?>	
					<tr class="<?php echo  $color; ?>">
						<td><?php echo  $noticia['titulo'];?></td>
						<td><?php echo  nl2br($noticia['descripcion']);?></td>
						<td><?php echo  formatea_fecha($noticia['tiempo']);?></td>
						<td>
						<?php
						if($noticia['publicar']==1)
						{
						?>
							<a href="estas_seguro_publicar.php?id=<?php echo  $noticia['id_noticia'];?>&publicar=0"><img src="<?php echo $_SESSION['rutaimg'];?>publicar.gif" title="No publicar" border="0" align="absmiddle"></a>
						<?php
						}
						else
						{
						?>
							<a href="estas_seguro_publicar.php?id=<?php echo  $noticia['id_noticia'];?>&publicar=1"><img src="<?php echo $_SESSION['rutaimg'];?>nopublicar.gif" title="Publicar" border="0" align="absmiddle"></a>
						<?php
						}
						?>
						</td>
						<td><a href="editar.php?id=<?php echo  $noticia['id_noticia'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
						<td><a href="estas_seguro.php?id=<?php echo  $noticia['id_noticia'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
					</tr>
			<?php
				} while ($noticia = $noticias->FetchRow());
			?>
		</table>
	<?php
		}
		else
		{
	?>
    		<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay ninguna noticia registrada en el sistema con los criterios de b�squeda seleccionados.</p>
   <?php
		}
	?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>