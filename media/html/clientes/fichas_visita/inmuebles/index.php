		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../../index.php">Clientes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php?id=<?php echo  $_GET['id']; ?>">Ficha de visita</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>&id_ficha_visita=<?php echo  $_GET['ficha_visita']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Buscador de inmuebles</span>
		</div>
		<p align="justify" class="titulo_seccion">Clientes</p>			
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="float:left; text-align:left">
				<!-- Buscar -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>buscar.png" align="absmiddle" />&nbsp;Buscar&nbsp;&nbsp;
				<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
			</div>
			<br clear="all" />
		</div>
		<br />				
		<div style="width:100%">
			<div style="width:50%; float:left; text-align:left">
				<strong>1. Selecciona los criterios para la búsqueda:</strong>
			</div>	
			<div style="width:50%; float:right; text-align:right">
				<a href="../editar.php?id=<?php echo $_GET['id']; ?>&id_ficha_visita=<?php echo $_GET['ficha_visita']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../editar.php?id=<?php echo $_GET['id']; ?>&id_ficha_visita=<?php echo $_GET['ficha_visita']; ?>">Volver</a>
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
        <form action="index.php?id=<?php echo  $_GET['id']; ?>&ficha_visita=<?php echo  $_GET['ficha_visita']; ?>" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
			<!-- Provincia -->
			<span style="text-align:left; float:left;">Provincia: </span>
			<select id="provincia" name="provincia" onchange="carga_regiones(this.value,''); carga_poblaciones('',''); carga_zonas('','');" class="campo_texto" style="margin-left:10px; float:left;">
			<option value="" <?php if ($_POST) { if ($_POST['provincia'] == '') echo "selected"; } else { if (!isset($_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes'])) echo "selected"; else { if ($_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes'] == '') echo "selected"; } } ?>>Selecciona provincia ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['provincia'] == $provincia['id_provincia']) echo "selected"; } else { if (isset($_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes'])) if ($_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes'] == $provincia['id_provincia']) echo "selected"; } ?> value="<?php echo  $provincia['id_provincia'];?>"><?php echo  $provincia['provincia'];?></option>
			<?php
				} while ($provincia = $provincias->FetchRow());
			?>
			</select>
			<!-- Región -->
			<span style="text-align:left; float:left; margin-left:20px;">Región: </span>
			<div id="regiondiv" style="float:left; margin-left:10px;">
				<select id="region" name="region" class="campo_texto" style="margin-left:10px;">
				<option value="">Seleccione región ...</option>
				</select>
			</div>
			<!-- Municipio -->
			<span style="text-align:left; float:left; margin-left:20px;">Municipio: </span>
			<div id="poblaciondiv" style="float:left; margin-left:10px;">
				<select id="poblacion" name="poblacion" class="campo_texto" style="margin-left:10px;">
				<option value="">Seleccione municipio ...</option>
				</select>
			</div>
			<span style="text-align:left; float:left; margin-left:20px;">Zona: </span>
			<!-- Zona -->
			<div id="zonadiv" style="float:left; margin-left:10px;">
				<select id="zona" name="zona" class="campo_texto">
					<option value="">Seleccione zona...</option>
				</select>
			</div>	
			<br clear="all" /><br  />		
			<!-- Palabra(s) clave -->
			<span style="text-align:left">Palabra(s) clave: </span>&nbsp;&nbsp;
			<input class="campo_texto" name="palabras" id="palabras" type="text" size="140" title="Palabra(s) clave" value="<?php if ($_POST) { if ($_POST['palabras']) echo $_POST['palabras']; } else { if (isset($_SESSION['palabras_busq_gest_inmuebles_fichas_visita_clientes'])) echo $_SESSION['palabras_busq_gest_inmuebles_fichas_visita_clientes']; } ?>">	
			<!-- Opciones -->
			<span style="text-align:left; margin-left:10px;">Opciones: </span>
			<select id="opciones" name="opciones" class="campo_texto" onchange="modificado=true" style="margin-left:10px;">
				<option value="" <?php if ($_POST) { if ($_POST['opciones'] == '') echo "selected"; } else { if (!isset($_SESSION['opciones_busq_gest_inmuebles_fichas_visita_clientes'])) echo "selected"; else { if ($_SESSION['opciones_busq_gest_inmuebles_fichas_visita_clientes'] == '') echo "selected"; } } ?>>Seleccione opción ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['opciones'] == $opcion['id_opcion']) echo "selected"; } else { if (isset($_SESSION['opciones_busq_gest_inmuebles_fichas_visita_clientes'])) if ($_SESSION['opciones_busq_gest_inmuebles_fichas_visita_clientes'] == $opcion['id_opcion']) echo "selected"; } ?> value="<?php echo  $opcion['id_opcion'];?>"><?php echo  $opcion['nombre_opcion'];?></option>	
			<?php
				} while ($opcion = $opciones->FetchRow());
			?>
			</select>
			<br />	
			<p align="center">
				<!-- Botón buscar -->
				<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Botón resetear -->	
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('opciones').value=''; document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.getElementById('poblacion').value=''; document.getElementById('zona').value=''; document.getElementById('palabras').value='';  document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('opciones').value=''; document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.getElementById('poblacion').value=''; document.getElementById('zona').value=''; document.getElementById('palabras').value='';  document.formulario.submit();return false">Limpiar filtro</a>			
			</p>
		</form>				
		<br  />	
		<!-- Resultados de Búsqueda -->
		<a name="listado"></a>				
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Listado de Inmuebles
			</div>	
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_todos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $_SESSION['display_pages_busq_inmuebles_fichas_visita_clientes'];
			echo $_SESSION['display_menu_pages_busq_inmuebles_fichas_visita_clientes'];
			?>
			<br /><br />
			<table style="border:1px solid #004000" width="90%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="8">INMUEBLES NO ASIGNADOS A LA FICHA DE VISITA</td></tr>
			<tr class="cabecera_tabla">
				<td>Id.</td>
				<td>Municipio</td>
				<td>Zona</td>
				<td>Precio<br />compra</td>
				<td>Precio<br />alquiler</td>
				<td>Metros</td>
				<td>Dirección</td>
				<td>Asignar</td>
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
				<td><?php echo  number_format($todo['precio_compra'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo['precio_alquiler'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo['metros'], 2, ',', '.'); ?></td>
				<td><?php echo  $todo['direccion'];?></td>
				<td><a href="insertar.php?id=<?php echo  $_GET['id'];?>&ficha_visita=<?php echo  $_GET['ficha_visita'];?>&inmueble=<?php echo  $todo['id_inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>nopublicar.gif" title="Asignar" border="0" align="absmiddle"></a></td>
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
			<a href="../editar.php?id=<?php echo $_GET['id']; ?>&id_ficha_visita=<?php echo $_GET['ficha_visita']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../editar.php?id=<?php echo $_GET['id']; ?>&id_ficha_visita=<?php echo $_GET['ficha_visita']; ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>