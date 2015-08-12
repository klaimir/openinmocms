		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Noticias</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Subscripción de Noticias</span></div>
        <p align="justify" class="titulo_seccion">Subscripción de Noticias</p>
		<p align="justify">
        	<span><strong>1. Selecciona los criterios para la búsqueda:</strong></span>			
        	<span style="margin-left:640px; text-align:right">
				<a href="../index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../index.php">Volver</a>
            </span>
		</p>
	<?php
		// FILTRO PARA REALIZAR BÚSQUEDAS
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
			<center>
				<!-- Título -->
				<span style="text-align:left">Título: </span>
				<input class="campo_texto" name="titulo" id="titulo" type="text" size="100" title="Título" value="<?php if($_POST) { echo $_POST['titulo']; } else { echo $_SESSION['titulo_busq_canales_noticias']; } ?>" style="margin-left:20px" onchange="modificado=true" />
			</center>
			<br />
			<!-- botón Buscar -->
			<p align="center">
				<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Botón resetear -->	
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('titulo').value=''; document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;			
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('titulo').value=''; document.formulario.submit();return false" >Limpiar filtro</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a href="exportar_pdf.php" target="_blank">Exportar listado a PDF</a>
			</p>
		</form>
		<!-- Resultados de Búsqueda -->					
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:40%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Información sobre canales de noticias registrados
			</div>	
			<div style="width:60%; float:right; text-align:right">
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="insertar.php">Insertar canal de noticias</a>
			</div>
			<br clear="all" />
		</div>
		<a name="listado"></a>
		<br clear="all" />	
	    <?php
		if ($num_canales_noticias != 0)
		{
			// Datos de paginación
			echo $_SESSION['display_pages_busq_canales_noticias'];
			echo $_SESSION['display_menu_pages_busq_canales_noticias'];
		?>			
		<br /><br />
		<table style="border:1px solid #004000" align="center"  width="100%" cellpadding="1" cellspacing="1">
			<tr class="cabecera_tabla">
				<td width="30%">Título</td>
				<td width="55%">Descripción</td>
				<td width="10%">Fecha alta</td>
				<td>&nbsp;&nbsp;Ver&nbsp;&nbsp;</td>
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
						<td><?php echo  $canal_noticias['titulo'];?></td>
						<td><?php echo  nl2br($canal_noticias['descripcion']);?></td>
						<td><?php echo  formatea_fecha($canal_noticias['tiempo']);?></td>
						<td><a href="leer_rss.php?id=<?php echo  $canal_noticias['id_canal_noticia'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>rss.png" title="Leer canal de noticias" border="0" align="absmiddle"></a></td>
						<td><a href="editar.php?id=<?php echo  $canal_noticias['id_canal_noticia'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
						<td><a href="estas_seguro.php?id=<?php echo  $canal_noticias['id_canal_noticia'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
					</tr>
			<?php
				} while ($canal_noticias = $canales_noticias->FetchRow());
			?>
		</table>
	<?php
		}
		else
		{
	?>
    		<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay ningún canal de noticias registrada en el sistema con los criterios de búsqueda seleccionados.</p>
   <?php
		}
	?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>