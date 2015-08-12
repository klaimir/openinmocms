		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Clientes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>">Ficha de visita</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar</span>
		</div>
        <p align="justify" class="titulo_seccion">Clientes</p>
		<div class="regla_horizontal_superior">
			<div style="float:left;">
				<!-- Actualizar en BD -->
				<a href="#" onclick="document.editar.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;<a href="#" onclick="document.editar.submit();return false">Generar Ficha Visita</a>
				&nbsp;&nbsp;
				<!-- Ver Informe -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$row_consulta['cliente']."/fichas_visita/ficha_visita_".$row_consulta['id_ficha_visita'].".pdf";?>" target="_blank">Ver Ficha de visita</a>
			</div>
			<div style="float:right; padding-top:4px;">
				<a href="index.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<?php
		if($_POST)
		{
			// Control de errores
			if($_SESSION['hayerroreseditarfichavisita'])
			{
	?>
				<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroreseditarfichavisita']); ?> error(es) encontrado(s)</div>
				<div class="detalle_errores">
				<ul class="lista_errores">
	<?php
				foreach($_SESSION['erroreseditarfichavisita'] as $error)
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
		<form action=""  name="editar" id="editar" method="post" enctype="multipart/form-data">
			<?php include('form_ficha_visita.php'); ?>
		</form>
		<br  /><br  />
		<!-- Inmuebles asociados -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Inmuebles asociados</span>
			<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="inmuebles/index.php?id=<?php echo  $_GET['id'];?>&ficha_visita=<?php echo $_GET['id_ficha_visita']; ?>&busqueda_inicial=1">Asignar visita</a></span>
			<br clear="all" />
		</p>
<?php
		if ($num_inmuebles != 0)
		{			
?>
			<table style="border:1px solid #004000" width="80%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="7">INMUEBLES ASOCIADOS</td></tr>
			<tr class="cabecera_tabla">
				<td>Tipología</td>
				<td>Municipio</td>
				<td>Zona</td>
				<td>Direccion</td>
				<td>Hora</td>
				<td>
				Cambiar
				<br  />
				Hora
				</td>
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
				<td><?php echo  formatear_tipo($inmueble['tipo']);?></td>
				<td><?php echo  formatear_poblacion($inmueble['poblacion_inmueble']);?></td>
				<td><?php echo  formatear_zona($inmueble['zona']);?></td>
				<td><?php echo  $inmueble['direccion'];?></td>
				<td><?php echo  $inmueble['hora'];?></td>
				<td><a href="inmuebles/asignar_hora.php?id=<?php echo  $_GET['id'];?>&ficha_visita=<?php echo  $_GET['id_ficha_visita'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>&location=editar_ficha_visita"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Cambiar hora" border="0" align="absmiddle"></a></td>
				<td><a href="inmuebles/estas_seguro.php?id=<?php echo  $_GET['id'];?>&ficha_visita=<?php echo  $_GET['id_ficha_visita'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			} while ($inmueble = $inmuebles->FetchRow());
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay asociado ningún inmueble a la ficha de visita actual.</p>
<?php
		}
?>
		<br  />
		<div class="regla_horizontal_inferior">
			<div style="float:left;">
				<!-- Actualizar en BD -->
				<a href="#" onclick="document.editar.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;<a href="#" onclick="document.editar.submit();return false">Generar Ficha Visita</a>
				&nbsp;&nbsp;
				<!-- Ver Informe -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$row_consulta['cliente']."/fichas_visita/ficha_visita_".$row_consulta['id_ficha_visita'].".pdf";?>" target="_blank">Ver Ficha de visita</a>
			</div>
			<div style="float:right; padding-top:7px;">
				<!--  Navegacion -->
				<a href="index.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>">Volver</a>
				&nbsp;&nbsp;&nbsp;
				<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
			</div>
		</div>
		<br clear="all" />