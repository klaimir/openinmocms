		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Informes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Informe por municipios</span></div>
		<p align="justify" class="titulo_seccion">Informes</p>			
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="float:left; text-align:left">
				<!-- Buscar -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>buscar.png" align="absmiddle" />&nbsp;Buscar
			</div>
			<br clear="all" />
		</div>
		<br />				
		<div style="width:100%">
			<div style="width:50%; float:left; text-align:left">
				<strong>1. Selecciona los criterios para la búsqueda:</strong>
			</div>	
			<div style="width:50%; float:right; text-align:right">
				<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			</div>
			<br clear="all" />
		</div><br />		
	<?php
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
        <form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
			<!-- Provincia -->
			<span style="text-align:left; float:left;">Provincia: </span>
			<select id="provincia" name="provincia" class="campo_texto" onchange="carga_regiones(this.value,''); carga_poblaciones('','');" style="float:left; margin-left:10px;">
			<option value="" <?php if ($_POST) { if ($_POST['provincia'] == '') echo "selected"; } ?>>Seleccione provincia ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['provincia'] == $provincia['id_provincia']) echo "selected"; } ?> value="<?php echo  $provincia['id_provincia'];?>"><?php echo  $provincia['provincia'];?></option>
			<?php
				} while ($provincia = $provincias->FetchRow());
			?>
			</select>
			<!-- Región -->
			<span style="text-align:left; float:left; margin-left:10px;">Región: </span>
			<div id="regiondiv" style="float:left; margin-left:10px;">
				<select id="region" name="region" class="campo_texto">
				<option value="">Seleccione región ...</option>
				</select>
			</div>
			<span style="text-align:left; float:left; margin-left:20px;">
				<!-- Botón buscar -->
				<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Botón resetear -->	
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.formulario.submit();return false">Limpiar filtro</a>
			</span>
		</form>	
		<br clear="all"  /><br  />
		<!-- Resultados de Búsqueda -->
		<a name="listado"></a>				
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Listado de Inmuebles
			</div>
			<?php
			if ($num_todos != 0)
			{			
			?>
				<div style="width:70%; float:right; text-align:right">
					<img src="<?php echo  $_SESSION['rutaimg'];?>pieplot.jpg" align="absmiddle" />&nbsp;&nbsp;<a href="generar_diagrama_municipios.php?provincia=<?php echo  $_POST['provincia'];?>&region=<?php echo  $_POST['region'];?>&tipo_diagrama=pie" target="_blank">Generar diagrama (Cuñas)</a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo  $_SESSION['rutaimg'];?>diagrama.png" align="absmiddle" />&nbsp;&nbsp;<a href="generar_diagrama_municipios.php?provincia=<?php echo  $_POST['provincia'];?>&region=<?php echo  $_POST['region'];?>&tipo_diagrama=plot" target="_blank">Generar diagrama (Barras)</a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a href="generar_diagrama_municipios.php?provincia=<?php echo  $_POST['provincia'];?>&region=<?php echo  $_POST['region'];?>&tipo_diagrama=pdf" target="_blank">Generar diagramas (PDF)</a>		
				</div>
			<?php
			}
			?>
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_todos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $_SESSION['display_pages_busq_informes_municipios'];
			echo $_SESSION['display_menu_pages_busq_informes_municipios'];
			?>
			<br /><br />
			<table style="border:1px solid #004000" width="80%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="7">INMUEBLES</td></tr>
			<tr class="cabecera_tabla">
				<td>Id.</td>
				<td>Municipio</td>
				<td>Zona</td>
				<td>Dirección</td>
				<td>Precio<br />compra</td>
				<td>Precio<br />alquiler</td>
				<td>Metros</td>
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
				<td><?php echo  $todo['id_inmueble'];?></td>			
				<td><?php echo  formatear_poblacion($todo['poblacion_inmueble']);?></td>
				<td><?php echo  formatear_zona($todo['zona']);?></td>
				<td><?php echo  $todo['direccion'];?></td>
				<td><?php echo  number_format($todo['precio_compra'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo['precio_alquiler'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo['metros'], 2, ',', '.'); ?></td>
				</tr>
<?php
			} while ($todo = $todos->FetchRow());
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrado ningún inmueble en el sistema con los criterios seleccionados.</p>
<?php
		}
?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>