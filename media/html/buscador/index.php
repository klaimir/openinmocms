		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace"><?php echo  $textos['titulo_seccion']; ?></span></div>
		<p align="justify" class="titulo_seccion"><?php echo  $textos['titulo_seccion']; ?></p>			
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="float:left; text-align:left">
				<!-- Buscar -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>buscar.png" align="absmiddle" />&nbsp;<?php echo  $textos['buscar']; ?>&nbsp;&nbsp;
				<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="<?php echo  $textos['ayuda']; ?>" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php"><?php echo  $textos['ayuda']; ?></a>
			</div>
			<br clear="all" />
		</div>
		<br />				
		<div style="width:100%">
			<div style="width:50%; float:left; text-align:left">
				<strong><?php echo  $textos['frase_buscador']; ?>:</strong>
			</div>	
			<div style="width:50%; float:right; text-align:right">
				<a href="<?php echo  URL_EMPRESA; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  URL_EMPRESA; ?>">Volver</a>
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
				<div class="titulo_errores"><strong><?php echo  $textos['informe_errores']; ?></strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresbusqueda']); ?> <?php echo  $textos['errores_encontrados']; ?></div>
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
			<span style="text-align:left; float:left;"><?php echo  $campos['provincia']; ?>: </span>
			<select id="provincia" name="provincia" onchange="carga_regiones(this.value,''); carga_poblaciones('',''); carga_zonas('','');" class="campo_texto" style="margin-left:10px; float:left;">
			<option value="" <?php if ($_POST) { if ($_POST['provincia'] == '') echo "selected"; } else { if (!isset($_SESSION['provincia_busq_inmuebles'])) echo "selected"; else { if ($_SESSION['provincia_busq_inmuebles'] == '') echo "selected"; } } ?>><?php echo  $campos['seleccionar_valor']; ?> ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['provincia'] == $provincia['id_provincia']) echo "selected"; } else { if (isset($_SESSION['provincia_busq_inmuebles'])) if ($_SESSION['provincia_busq_inmuebles'] == $provincia['id_provincia']) echo "selected"; } ?> value="<?php echo  $provincia['id_provincia'];?>"><?php echo  $provincia['provincia'];?></option>
			<?php
				} while ($provincia = $provincias->FetchRow());
			?>
			</select>
			<!-- Región -->
			<span style="text-align:left; float:left; margin-left:10px;"><?php echo  $campos['region']; ?>: </span>
			<div id="regiondiv" style="float:left; margin-left:10px;">
				<select id="region" name="region" class="campo_texto" style="margin-left:10px;">
				<option value=""><?php echo  $campos['seleccionar_valor']; ?> ...</option>
				</select>
			</div>
			<!-- Municipio -->
			<span style="text-align:left; float:left; margin-left:10px;"><?php echo  $campos['poblacion']; ?>: </span>
			<div id="poblaciondiv" style="float:left; margin-left:10px;">
				<select id="poblacion" name="poblacion" class="campo_texto" style="margin-left:10px;">
				<option value=""><?php echo  $campos['seleccionar_valor']; ?> ...</option>
				</select>
			</div>
			<span style="text-align:left; float:left; margin-left:20px;"><?php echo  $campos['zona']; ?>: </span>
			<!-- Zona -->
			<div id="zonadiv" style="float:left; margin-left:10px;">
				<select id="zona" name="zona" class="campo_texto">
					<option value=""><?php echo  $campos['seleccionar_valor']; ?>...</option>
				</select>
			</div>	
			<br clear="all" /><br  />
			<!-- Precio compra -->
			<span style="text-align:left; float:left;"><?php echo  $campos['precio_compra']; ?>: </span>
			<select id="precio_compra" name="precio_compra" class="campo_texto" style="margin-left:10px; float:left; ">
				<option value="" <?php if ($_POST) { if ($_POST['precio_compra'] == '') echo "selected"; } else { if (!isset($_SESSION['precio_compra_busq_inmuebles'])) echo "selected"; else { if ($_SESSION['precio_compra_busq_inmuebles'] == '') echo "selected"; } } ?>><?php echo  $campos['seleccionar_valor']; ?>...</option>
				<option value="menos_120" <?php if ($_POST) { if ($_POST['precio_compra'] == 'menos_120') echo "selected"; } else { if ($_SESSION['precio_compra_busq_inmuebles'] == 'menos_120') echo "selected"; } ?> ><?php echo  $campos['menos_de']; ?> 120.000 €</option>
				<option value="120_180" <?php if ($_POST) { if ($_POST['precio_compra'] == '120_180') echo "selected"; } else { if ($_SESSION['precio_compra_busq_inmuebles'] == '120_180') echo "selected"; } ?> >120.000 - 180.000 €</option>
				<option value="180_240" <?php if ($_POST) { if ($_POST['precio_compra'] == '180_240') echo "selected"; } else { if ($_SESSION['precio_compra_busq_inmuebles'] == '180_240') echo "selected"; } ?> >180.000 - 240.000 €</option>
				<option value="mas_240" <?php if ($_POST) { if ($_POST['precio_compra'] == 'mas_240') echo "selected"; } else { if ($_SESSION['precio_compra_busq_inmuebles'] == 'mas_240') echo "selected"; } ?> ><?php echo  $campos['mas_de']; ?> 240.000 €</option>
			</select>
			<!-- Precio alquiler -->
			<span style="text-align:left; float:left; margin-left:10px;"><?php echo  $campos['precio_alquiler']; ?>: </span>
			<select id="precio_alquiler" name="precio_alquiler" class="campo_texto" style="margin-left:10px; float:left; ">
				<option value="" <?php if ($_POST) { if ($_POST['precio_alquiler'] == '') echo "selected"; } else { if (!isset($_SESSION['precio_alquiler_busq_inmuebles'])) echo "selected"; else { if ($_SESSION['precio_alquiler_busq_inmuebles'] == '') echo "selected"; } } ?>><?php echo  $campos['seleccionar_valor']; ?>...</option>
				<option value="menos_400" <?php if ($_POST) { if ($_POST['precio_alquiler'] == 'menos_400') echo "selected"; } else { if ($_SESSION['precio_alquiler_busq_inmuebles'] == 'menos_400') echo "selected"; } ?> ><?php echo  $campos['menos_de']; ?> 400 €</option>
				<option value="400_600" <?php if ($_POST) { if ($_POST['precio_alquiler'] == '400_600') echo "selected"; } else { if ($_SESSION['precio_alquiler_busq_inmuebles'] == '400_600') echo "selected"; } ?> >400 - 600 €</option>
				<option value="600_800" <?php if ($_POST) { if ($_POST['precio_alquiler'] == '600_800') echo "selected"; } else { if ($_SESSION['precio_alquiler_busq_inmuebles'] == '600_800') echo "selected"; } ?> >600 - 800 €</option>
				<option value="mas_800" <?php if ($_POST) { if ($_POST['precio_alquiler'] == 'mas_800') echo "selected"; } else { if ($_SESSION['precio_alquiler_busq_inmuebles'] == 'mas_800') echo "selected"; } ?> ><?php echo  $campos['mas_de']; ?> 800 €</option>
			</select>
			<!-- Tipos -->
			<span style="text-align:left; margin-left:20px;"><?php echo  $campos['tipologia']; ?>: </span>
			<select id="tipos" name="tipos" class="campo_texto" onchange="modificado=true" style="margin-left:10px;">
				<option value="" <?php if ($_POST) { if ($_POST['tipos'] == '') echo "selected"; } else { if (!isset($_SESSION['tipos_busq_inmuebles'])) echo "selected"; else { if ($_SESSION['tipos_busq_inmuebles'] == '') echo "selected"; } } ?>><?php echo  $campos['seleccionar_valor']; ?>...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['tipos'] == $tipo['id_tipo']) echo "selected"; } else { if (isset($_SESSION['tipos_busq_inmuebles'])) if ($_SESSION['tipos_busq_inmuebles'] == $tipo['id_tipo']) echo "selected"; } ?> value="<?php echo  $tipo['id_tipo'];?>"><?php echo  $translator->TraducirTexto($tipo['nombre_tipo']);?></option>	
			<?php
				} while ($tipo = $tipos->FetchRow());
			?>
			</select>			
			<!-- Antigüedad -->
			<span style="text-align:left; margin-left:15px;">Antigüedad: </span>
			<select id="antiguedad" name="antiguedad" class="campo_texto" style="margin-left:15px;">
				<option value="" <?php if ($_POST) { if ($_POST['antiguedad'] == '') echo "selected"; } else { if (!isset($_SESSION['antiguedad_busq_inmuebles'])) echo "selected"; else { if ($_SESSION['antiguedad_busq_inmuebles'] == '') echo "selected"; } } ?>><?php echo  $campos['seleccionar_valor']; ?> ...</option>
				<option value="inmueble_usado" <?php if ($_POST) { if ($_POST['antiguedad'] == "inmueble_usado") echo "selected"; } else { if (isset($_SESSION['antiguedad_busq_inmuebles'])) if ($_SESSION['antiguedad_busq_inmuebles'] == "inmueble_usado") echo "selected"; } ?>><?php echo  $translator->TraducirTexto('Inmueble usado');?></option>
				<option value="nuevo_inmueble" <?php if ($_POST) { if ($_POST['antiguedad'] == "nuevo_inmueble") echo "selected"; } else { if (isset($_SESSION['antiguedad_busq_inmuebles'])) if ($_SESSION['antiguedad_busq_inmuebles'] == "nuevo_inmueble") echo "selected"; } ?>><?php echo  $translator->TraducirTexto('Nuevo inmueble');?></option>
			</select>			
			<br /><br  />
			<!-- Palabra(s) clave -->
			<span style="text-align:left;"><?php echo  $campos['palabras_clave']; ?>: </span>&nbsp;&nbsp;
			<input class="campo_texto" name="palabras" id="palabras" type="text" size="130" title="<?php echo  $campos['palabras_clave']; ?>" value="<?php if ($_POST) { if ($_POST['palabras']) echo $_POST['palabras']; } else { if (isset($_SESSION['palabras_busq_inmuebles'])) echo $_SESSION['palabras_busq_inmuebles']; } ?>">	
			<p align="center">
				<!-- Botón buscar -->
				<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false"><?php echo  $textos['buscar']; ?></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Botón resetear -->	
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('precio_compra').value=''; document.getElementById('precio_alquiler').value=''; document.getElementById('tipos').value=''; document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.getElementById('poblacion').value=''; document.getElementById('zona').value=''; document.getElementById('antiguedad').value=''; document.getElementById('palabras').value='';  document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('precio_compra').value=''; document.getElementById('precio_alquiler').value=''; document.getElementById('tipos').value=''; document.getElementById('provincia').value=''; document.getElementById('region').value=''; document.getElementById('poblacion').value=''; document.getElementById('zona').value=''; document.getElementById('palabras').value=''; document.getElementById('antiguedad').value=''; document.formulario.submit();return false"><?php echo  $textos['limpiar_filtros']; ?></a>			
			</p>
		</form>				
		<!-- Ordenación -->
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:50%; float:left; text-align:left">
				<!-- Ordenación -->	
				<span><?php echo  $textos['criterios_ordenacion']; ?>:</span>
			</div>
			<div style="width:50%; float:right; text-align:right">
				<span style="margin-left:15px"><?php echo  $campos['precio_compra']; ?></span>&nbsp;&nbsp;
				<a href="index.php?campo=precio_compra&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=precio_compra&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px"><?php echo  $campos['precio_alquiler']; ?></span>&nbsp;&nbsp;
				<a href="index.php?campo=precio_alquiler&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=precio_alquiler&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px"><?php echo  $textos['metros']; ?></span>&nbsp;&nbsp;
				<a href="index.php?campo=metros&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=metros&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
				<span style="margin-left:15px"><?php echo  $campos['habitaciones']; ?></span>&nbsp;&nbsp;
				<a href="index.php?campo=habitaciones&orden=asc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>asc_azul.gif" align="absmiddle" /></a>&nbsp;<a href="index.php?campo=habitaciones&orden=desc#listado"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>desc_azul.gif" align="absmiddle" /></a>
			</div>
			<br clear="all" />
		</div>		
		<!-- Resultados de Búsqueda -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;<?php echo  $textos['listado_comprar']; ?></p>
<?php
		if ($num_todos_comprar != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $_SESSION['display_pages_busq_inmuebles_comprar'];
			echo $_SESSION['display_menu_pages_busq_inmuebles_comprar'];
			?>
			<br /><br />
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="11"><?php echo  $textos['cabecera_comprar']; ?></td></tr>
			<tr class="cabecera_tabla">
				<td><?php echo  $campos['certificacion']; ?></td>
				<td><?php echo  $campos['tipologia']; ?></td>
				<td><?php echo  $campos['provincia']; ?></td>
				<td><?php echo  $campos['region']; ?></td>
				<td><?php echo  $campos['poblacion']; ?></td>
				<td><?php echo  $campos['zona']; ?></td>
				<td><?php echo  $campos['precio']; ?></td>
				<td><?php echo  $textos['metros']; ?></td>
				<td><?php echo  $campos['habitaciones']; ?></td>
				<td><?php echo  $campos['banios']; ?></td>
				<td><?php echo  $campos['informacion_adicional']; ?></td>
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
				<td>
				<?php
				if(!is_null($todo_comprar['certificacion_energetica']) && $todo_comprar['certificacion_energetica']!=0)
				{
				?>
				<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($todo_comprar['certificacion_energetica']);?>" height="16px;" width="60px;" title="Tipo de certificación energética" border="0" align="absmiddle">
				</td>
				<?php
				}
				else
				{
				?>
				<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($todo_comprar['certificacion_energetica']);?>" title="Tipo de certificación energética" border="0" align="absmiddle">
				<?php
				}
				?>
				</td>
                <td><?php echo  $translator->TraducirTexto(formatear_tipo($todo_comprar['tipo'])); ?></td>
				<td><?php echo  formatear_provincia($todo_comprar['provincia_inmueble']);?></td>
				<td><?php echo  formatear_region($todo_comprar['region']);?></td>
				<td><?php echo  formatear_poblacion($todo_comprar['poblacion_inmueble']);?></td>
				<td><?php echo  formatear_zona($todo_comprar['zona']);?></td>			
				<td><?php echo  number_format($todo_comprar['precio_compra'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo_comprar['metros'], 2, ',', '.'); ?></td>
				<td><?php echo  $todo_comprar['habitaciones']; ?></td>
				<td><?php echo  $todo_comprar['banios']; ?></td>
				<td><a href="ver_datos_adicionales.php?id=<?php echo  $todo_comprar['id_inmueble'];?>#listado"><img src="<?php echo $_SESSION['rutaimg'];?>pic.gif" title="<?php echo  $campos['informacion_adicional']; ?>" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			} while ($todo_comprar = $todos_comprar->FetchRow());
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;<?php echo  $textos['no_busqueda']; ?></p>
<?php
		}
?>
		<br  />
		<!-- Resultados de Búsqueda -->
		<a name="listado_alquilar"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;<?php echo  $textos['listado_alquilar']; ?></p>
<?php
		if ($num_todos_alquilar != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $_SESSION['display_pages_busq_inmuebles_alquilar'];
			echo $_SESSION['display_menu_pages_busq_inmuebles_alquilar'];
			?>
			<br /><br />
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="11"><?php echo  $textos['cabecera_alquilar']; ?></td></tr>
			<tr class="cabecera_tabla">
				<td><?php echo  $campos['certificacion']; ?></td>
				<td><?php echo  $campos['tipologia']; ?></td>
				<td><?php echo  $campos['provincia']; ?></td>
				<td><?php echo  $campos['region']; ?></td>
				<td><?php echo  $campos['poblacion']; ?></td>
				<td><?php echo  $campos['zona']; ?></td>
				<td><?php echo  $campos['precio']; ?></td>
				<td><?php echo  $textos['metros']; ?></td>
				<td><?php echo  $campos['habitaciones']; ?></td>
				<td><?php echo  $campos['banios']; ?></td>
				<td><?php echo  $campos['informacion_adicional']; ?></td>
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
				<td>
				<?php
				if(!is_null($todo_alquilar['certificacion_energetica']) && $todo_alquilar['certificacion_energetica']!=0)
				{
				?>
				<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($todo_alquilar['certificacion_energetica']);?>" height="16px;" width="60px;" title="Tipo de certificación energética" border="0" align="absmiddle">
				</td>
				<?php
				}
				else
				{
				?>
				<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($todo_alquilar['certificacion_energetica']);?>" title="Tipo de certificación energética" border="0" align="absmiddle">
				<?php
				}
				?>
				</td>
				<td><?php echo  $translator->TraducirTexto(formatear_tipo($todo_alquilar['tipo']));?></td>
				<td><?php echo  formatear_provincia($todo_alquilar['provincia_inmueble']);?></td>
				<td><?php echo  formatear_region($todo_alquilar['region']);?></td>
				<td><?php echo  formatear_poblacion($todo_alquilar['poblacion_inmueble']);?></td>
				<td><?php echo  formatear_zona($todo_alquilar['zona']);?></td>			
				<td><?php echo  number_format($todo_alquilar['precio_alquiler'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($todo_alquilar['metros'], 2, ',', '.'); ?></td>
				<td><?php echo  $todo_alquilar['habitaciones']; ?></td>
				<td><?php echo  $todo_alquilar['banios']; ?></td>
				<td><a href="ver_datos_adicionales.php?id=<?php echo  $todo_alquilar['id_inmueble'];?>#listado"><img src="<?php echo $_SESSION['rutaimg'];?>pic.gif" title="<?php echo  $campos['informacion_adicional']; ?>" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			} while ($todo_alquilar = $todos_alquilar->FetchRow());
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;<?php echo  $textos['no_busqueda']; ?></p>
<?php
		}
?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="<?php echo  URL_EMPRESA; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  URL_EMPRESA; ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>