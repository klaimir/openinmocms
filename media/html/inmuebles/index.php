		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Inmuebles</span></div>
		<p align="justify" class="titulo_seccion">Inmuebles</p>			
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
				<a href="../acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../acceso/index.php">Volver</a>
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
		<div style="float: left; width:350px; margin-left:200px;">
			<!-- Opciones -->
			<span style="text-align:left; float:left; width:75px;">Opciones: </span>
			<select id="opciones" name="opciones" class="campo_texto" onchange="modificado=true" style="float:left; ">
				<option value="" <?php if ($_POST) { if ($_POST['opciones'] == '') echo "selected"; } else { if (!isset($_SESSION['opciones_busq_gest_inmuebles'])) echo "selected"; else { if ($_SESSION['opciones_busq_gest_inmuebles'] == '') echo "selected"; } } ?>>Seleccione opcion ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['opciones'] == $opcion['id_opcion']) echo "selected"; } else { if (isset($_SESSION['opciones_busq_gest_inmuebles'])) if ($_SESSION['opciones_busq_gest_inmuebles'] == $opcion['id_opcion']) echo "selected"; } ?> value="<?php echo  $opcion['id_opcion'];?>"><?php echo  $opcion['nombre_opcion'];?></option>	
			<?php
				} while ($opcion = $opciones->FetchRow());
			?>
			</select>
			<br  /><br  />
			<!-- Tipos -->
			<span style="text-align:left; float:left; width:75px;">Tipología: </span>
			<select id="tipos" name="tipos" class="campo_texto" onchange="modificado=true" style="float:left; ">
				<option value="" <?php if ($_POST) { if ($_POST['tipos'] == '') echo "selected"; } else { if (!isset($_SESSION['tipos_busq_gest_inmuebles'])) echo "selected"; else { if ($_SESSION['tipos_busq_gest_inmuebles'] == '') echo "selected"; } } ?>>Seleccione tipo ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['tipos'] == $tipo['id_tipo']) echo "selected"; } else { if (isset($_SESSION['tipos_busq_gest_inmuebles'])) if ($_SESSION['tipos_busq_gest_inmuebles'] == $tipo['id_tipo']) echo "selected"; } ?> value="<?php echo  $tipo['id_tipo'];?>"><?php echo  $tipo['nombre_tipo'];?></option>	
			<?php
				} while ($tipo = $tipos->FetchRow());
			?>
			</select>
			<br  /><br  />
			<!-- Provincia -->
			<span style="text-align:left; float:left; width:75px;">Provincia: </span>
			<select id="provincia" name="provincia" class="campo_texto" onchange="carga_regiones_agente(this.value,''); carga_poblaciones_agente('',''); carga_zonas('','');" style="float:left;">
			<option value="" <?php if ($_POST) { if ($_POST['provincia'] == '') echo "selected"; } else { if (!isset($_SESSION['provincia_busq_gest_inmuebles'])) echo "selected"; else { if ($_SESSION['provincia_busq_gest_inmuebles'] == '') echo "selected"; } } ?>>Seleccione provincia ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['provincia'] == $provincia['id_provincia']) echo "selected"; } else { if (isset($_SESSION['provincia_busq_gest_inmuebles'])) if ($_SESSION['provincia_busq_gest_inmuebles'] == $provincia['id_provincia']) echo "selected"; } ?> value="<?php echo  $provincia['id_provincia'];?>"><?php echo  $provincia['provincia'];?></option>
			<?php
				} while ($provincia = $provincias->FetchRow());
			?>
			</select>
			<br  /><br  />
			<!-- Región -->
			<span style="text-align:left; float:left; width:75px;">Región: </span>
			<div id="regiondiv" style="float:left; ">
				<select id="region" name="region" class="campo_texto">
				<option value="">Seleccione región ...</option>
				</select>
			</div>
			<br  /><br  />
			<!-- Municipio -->
			<span style="text-align:left; float:left; width:75px;">Municipio: </span>
			<div id="poblaciondiv" style="float:left;">
				<select id="poblacion" name="poblacion" class="campo_texto">
				<option value="">Seleccion municipio ...</option>
				</select>
			</div>
			<br  /><br  />
			<span style="text-align:left; float:left; width:75px;">Zona: </span>
			<!-- Zona -->
			<div id="zonadiv" style="float:left;">
				<select id="zona" name="zona" class="campo_texto">
					<option value="">Seleccione zona...</option>
				</select>
			</div>
		</div>
		<div style="float:left; width:450px;">	
			<!-- Palabra(s) clave -->
			<span style="text-align:left">Palabra(s) clave: </span>
			<br  />
			<input class="campo_texto" name="palabras" id="palabras" type="text" size="70" title="Palabra(s) clave" value="<?php if ($_POST) { if ($_POST['palabras']) echo $_POST['palabras']; } else { if (isset($_SESSION['palabras_busq_gest_inmuebles'])) echo $_SESSION['palabras_busq_gest_inmuebles']; } ?>">
			<br  /><br  />
			<!-- Dirección -->
			<span style="text-align:left;">Dirección: </span>
			<br  />
			<input class="campo_texto" name="direccion" id="direccion" type="text" size="70" title="Dirección" value="<?php if ($_POST) { if ($_POST['direccion']) echo $_POST['direccion']; } else { if (isset($_SESSION['direccion_busq_gest_inmuebles'])) echo $_SESSION['direccion_busq_gest_inmuebles']; } ?>">
			<br  /><br  />
			<!-- Tipos de certificación energética -->
			<span style="text-align:left; float:left; width:150px;">Certificación energética: </span>
			<select id="tipo_certificacion_energetica" name="tipo_certificacion_energetica" class="campo_texto" onchange="modificado=true" style="margin-left:10px; float:left; ">
				<option value="" <?php if ($_POST) { if ($_POST['tipo_certificacion_energetica'] == '') echo "selected"; } else { if (!isset($_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles'])) echo "selected"; else { if ($_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles'] == '') echo "selected"; } } ?>>Seleccione categoría ...</option>
				<option value="sin_definir" <?php if ($_POST) { if ($_POST['tipo_certificacion_energetica'] == 'sin_definir') echo "selected"; } else { if ($_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles'] == 'sin_definir') echo "selected"; } ?>>Sin definir</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['tipo_certificacion_energetica'] == $certificacion['id_tipo_certificacion_energetica']) echo "selected"; } else { if (isset($_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles'])) if ($_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles'] == $certificacion['id_tipo_certificacion_energetica']) echo "selected"; } ?> value="<?php echo  $certificacion['id_tipo_certificacion_energetica'];?>"><?php echo  $certificacion['nombre_tipo_certificacion_energetica'];?></option>	
			<?php
				} while ($certificacion = $certificaciones->FetchRow());
			?>
			</select>
			<br  /><br  />
			<!-- Antigüedad -->
			<span style="text-align:left;">Antigüedad: </span>
			<select id="antiguedad" name="antiguedad" class="campo_texto" style="margin-left:15px;">
				<option value="" <?php if ($_POST) { if ($_POST['antiguedad'] == '') echo "selected"; } else { if (!isset($_SESSION['antiguedad_busq_gest_inmuebles'])) echo "selected"; else { if ($_SESSION['antiguedad_busq_gest_inmuebles'] == '') echo "selected"; } } ?>>Seleccione antigüedad ...</option>
				<option value="inmueble_usado" <?php if ($_POST) { if ($_POST['antiguedad'] == "inmueble_usado") echo "selected"; } else { if (isset($_SESSION['antiguedad_busq_gest_inmuebles'])) if ($_SESSION['antiguedad_busq_gest_inmuebles'] == "inmueble_usado") echo "selected"; } ?>>Inmueble usado</option>
				<option value="nuevo_inmueble" <?php if ($_POST) { if ($_POST['antiguedad'] == "nuevo_inmueble") echo "selected"; } else { if (isset($_SESSION['antiguedad_busq_gest_inmuebles'])) if ($_SESSION['antiguedad_busq_gest_inmuebles'] == "nuevo_inmueble") echo "selected"; } ?>>Nuevo inmueble</option>
			</select>
			<br  /><br  />
			<!-- Captadores -->
			<span style="text-align:left; float:left; width:90px;">Captadores: </span>
			<select id="captadores" name="captadores" class="campo_texto" onchange="modificado=true" style="float:left; ">
				<option value="" <?php if ($_POST) { if ($_POST['captadores'] == '') echo "selected"; } else { if (!isset($_SESSION['captadores_busq_gest_inmuebles'])) echo "selected"; else { if ($_SESSION['captadores_busq_gest_inmuebles'] == '') echo "selected"; } } ?>>Seleccione captador ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['captadores'] == $captador['id_usuario']) echo "selected"; } else { if (isset($_SESSION['captadores_busq_gest_inmuebles'])) if ($_SESSION['captadores_busq_gest_inmuebles'] == $captador['id_usuario']) echo "selected"; } ?> value="<?php echo  $captador['id_usuario'];?>"><?php echo  $captador['apellidos'].", ".$captador['nombre'];?></option>	
			<?php
				} while ($captador = $captadores->FetchRow());
			?>
			</select>
		</div>
		<br clear="all" /><br  />
		<p align="center">
			<!-- Botón buscar -->
			<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- Botón resetear -->	
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('opciones').value='';  document.getElementById('captadores').value=''; document.getElementById('tipos').value=''; document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.getElementById('poblacion').value=''; document.getElementById('zona').value=''; document.getElementById('palabras').value=''; document.getElementById('antiguedad').value=''; document.getElementById('direccion').value=''; document.getElementById('tipo_certificacion_energetica').value=''; document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('opciones').value=''; document.getElementById('captadores').value=''; document.getElementById('tipos').value=''; document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.getElementById('poblacion').value=''; document.getElementById('zona').value=''; document.getElementById('palabras').value=''; document.getElementById('direccion').value=''; document.getElementById('antiguedad').value=''; document.getElementById('tipo_certificacion_energetica').value=''; document.formulario.submit();return false">Limpiar filtro</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a href="exportar_pdf.php" target="_blank">Exportar listado a PDF</a>			
		</p>
		</form>				
		<!-- Ordenación -->
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:20%; float:left; text-align:left">
				<!-- Ordenación -->	
				<span>Criterios de ordenación:</span>
			</div>
			<div style="width:80%; float:right; text-align:right">
				<span style="margin-left:15px">Precio compra</span>&nbsp;&nbsp;
				<a href="index.php?campo=precio_compra&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=precio_compra&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px">Precio alquiler</span>&nbsp;&nbsp;
				<a href="index.php?campo=precio_alquiler&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=precio_alquiler&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px">Metros</span>&nbsp;&nbsp;
				<a href="index.php?campo=metros&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=metros&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px">Tipología</span>&nbsp;&nbsp;
				<a href="index.php?campo=tipo&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=tipo&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px">Cert. Energética</span>&nbsp;&nbsp;
				<a href="index.php?campo=certificacion_energetica&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=certificacion_energetica&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px">Habitaciones</span>&nbsp;&nbsp;
				<a href="index.php?campo=habitaciones&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=habitaciones&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
			</div>
			<br clear="all" />
		</div>	
		<br  />	
		<!-- Resultados de Búsqueda -->
		<a name="listado"></a>				
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Listado de Inmuebles
			</div>	
			<div style="width:70%; float:right; text-align:right">
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="insertar.php">Insertar inmueble</a>
				&nbsp;&nbsp;
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="insertar.php?cliente=1">Insertar inmueble y cliente</a>		
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
			echo $_SESSION['display_pages_busq_inmuebles'];
			echo $_SESSION['display_menu_pages_busq_inmuebles'];
			?>
			<br /><br />
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="13">INMUEBLES</td></tr>
			<tr class="cabecera_tabla">
				<td>Id.</td>
				<td>Certf.</td>
				<td>Tipología</td>
				<td>Municipio</td>
				<td>Zona</td>
				<td>Dirección</td>
				<td>
				Precio
				<br  />
				compra
				</td>
				<td>
				Precio
				<br  />
				alquiler
				</td>
				<td>Metros</td>
				<td>Hab.</td>
				<td>Baños</td>
				<td>Opciones</td>
				<td>Bloquear</td>
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
				<td>
				<?php
				if(!is_null($todo['certificacion_energetica']) && $todo['certificacion_energetica']!=0)
				{
				?>
				<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($todo['certificacion_energetica']);?>" height="16px;" width="60px;" title="Tipo de certificación energética" border="0" align="absmiddle">
				</td>
				<?php
				}
				else
				{
				?>
				<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($todo['certificacion_energetica']);?>" title="Tipo de certificación energética" border="0" align="absmiddle">
				<?php
				}
				?>
				<td><?php echo  formatear_tipo($todo['tipo']);?></td>			
				<td><?php echo  formatear_poblacion($todo['poblacion_inmueble']);?></td>
				<td><?php echo  formatear_zona($todo['zona']);?></td>
				<td><?php echo  $todo['direccion'];?></td>
				<td><?php echo  number_format($todo['precio_compra'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo['precio_alquiler'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo['metros'], 2, ',', '.'); ?></td>
				<td><?php echo  $todo['habitaciones'];?></td>
				<td><?php echo  $todo['banios'];?></td>
				<td>
					<a href="editar.php?id=<?php echo  $todo['id_inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a>
					<?php
					$acceso_borrar=ControlInmuebles::ComprobarBorrar($todo['id_inmueble']);
					if($acceso_borrar>0)
					{
					?>
					&nbsp;&nbsp;
					<a href="estas_seguro.php?id=<?php echo  $todo['id_inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a>
					<?php
					}
					?>
				</td>
				<td>
				<?php
				$acceso_bloquear=ControlInmuebles::ComprobarBloquear($todo['id_inmueble'],NULL);
				if($acceso_bloquear!=(int)-2)
				{					
					if($todo['bloqueado'])
					{
						$acceso_bloquear=ControlInmuebles::ComprobarBloquear($todo['id_inmueble'],0);
						if($acceso_bloquear==(int)-1)
						{
					?>
							<img src="<?php echo $_SESSION['rutaimg'];?>publicar.gif" title="Desbloquear" border="0" align="absmiddle">
					<?php
						}
						else
						{
						?>
							<a href="estas_seguro_bloquear.php?id=<?php echo  $todo['id_inmueble'];?>&bloqueado=0"><img src="<?php echo $_SESSION['rutaimg'];?>publicar.gif" title="Desbloquear" border="0" align="absmiddle"></a>
						<?php
						}
					}
					else
					{
					?>
						<a href="estas_seguro_bloquear.php?id=<?php echo  $todo['id_inmueble'];?>&bloqueado=1"><img src="<?php echo $_SESSION['rutaimg'];?>nopublicar.gif" title="Bloquear" border="0" align="absmiddle"></a>
					<?php
					}
				}
				else
				{				
				?>
					<img src="<?php echo $_SESSION['rutaimg'];?>publicar.gif" title="Inmueble bloqueado y cerrado" border="0" align="absmiddle">
				<?php
				}			
				?>
				</td>
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
			<a href="../acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../acceso/index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>