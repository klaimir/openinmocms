		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Inmuebles</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>		
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Documentación generada</span>
		</div>
		<p align="justify" class="titulo_seccion">Inmuebles (Documentación generada)</p>			
		<!-- Certificaciones energéticas -->
		<div style="width:48%; float:left; text-align:left;">
			<div style="text-align:left; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Certificaciones energéticas
				<br  />
			</div>
			<br clear="all" />
<?php
		if ($num_certificaciones_energeticas != 0)
		{			
?>
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="4">CERTIFICACIONES ENERGÉTICAS</td></tr>
			<tr class="cabecera_tabla">
				<td>Fecha</td>
				<td>Propietario</td>
				<td>Agente</td>
				<td>Doc.</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			foreach($certificaciones_energeticas as $certificacion_energetica)
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
				<td><?php echo  cambiafecha_bd($certificacion_energetica['fecha']);?></td>
				<td><?php echo  $certificacion_energetica['apellidos'].", ".$certificacion_energetica['nombre'];?></td>
				<td><?php echo  formatear_usuario($certificacion_energetica['agente']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$certificacion_energetica['cliente']."/inmueble_".$certificacion_energetica['inmueble']."/certificacion_energetica.pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay generado ningún aviso de certificación energética para el inmueble seleccionado.</p>
<?php
		}
?>
		</div>
		<!-- Fichas de encargo -->
		<div style="width:49%; float:left; text-align:left; margin-left:20px;">
			<div style="text-align:left; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Fichas de encargo
				<br  />
			</div>
			<br clear="all" />
<?php
		if ($num_fichas_encargo != 0)
		{			
?>
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="4">FICHAS DE ENCARGO</td></tr>
			<tr class="cabecera_tabla">
				<td>Fecha</td>
				<td>Propietario</td>
				<td>Agente</td>
				<td>Doc.</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			foreach($fichas_encargo as $ficha_encargo)
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
				<td><?php echo  cambiafecha_bd($ficha_encargo['fecha']);?></td>
				<td><?php echo  $ficha_encargo['apellidos'].", ".$ficha_encargo['nombre'];?></td>
				<td><?php echo  formatear_usuario($ficha_encargo['agente']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$ficha_encargo['cliente']."/inmueble_".$ficha_encargo['inmueble']."/ficha_encargo_".$ficha_encargo['id_ficha_encargo'].".pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay generada ninguna ficha de encargo para el inmueble seleccionado.</p>
<?php
		}
?>
		</div>
		<br clear="all" /><br  />
		<!-- Fichas de visita -->
		<div style="width:48%; float:left; text-align:left;">
			<div style="text-align:left; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Fichas de visita
				<br  />
			</div>
			<br clear="all" />
<?php
		if ($num_fichas_visita != 0)
		{			
?>
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="4">FICHAS DE VISITA</td></tr>
			<tr class="cabecera_tabla">
				<td>Fecha</td>
				<td>Interesado</td>
				<td>Agente</td>
				<td>Doc.</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			foreach($fichas_visita as $ficha_visita)
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
				<td><?php echo  cambiafecha_bd($ficha_visita['fecha']);?></td>
				<td><?php echo  $ficha_visita['apellidos'].", ".$ficha_visita['nombre'];?></td>
				<td><?php echo  formatear_usuario($ficha_visita['agente']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$ficha_visita['cliente']."/fichas_visita/ficha_visita_".$ficha_visita['id_ficha_visita'].".pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay generada ninguna ficha de visita para el inmueble seleccionado.</p>
<?php
		}
?>
		</div>
		<!-- Contrato de compra-venta -->
		<div style="width:49%; float:left; text-align:left; margin-left:20px;">
			<div style="text-align:left; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Contrato de compra-venta
				<br  />
			</div>
			<br clear="all" />
<?php
		if ($num_contratos_compra_venta != 0)
		{			
?>
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="5">CONTRATO DE COMPRA-VENTA</td></tr>
			<tr class="cabecera_tabla">
				<td>Fecha</td>
				<td>Propieatario</td>
				<td>Comprador</td>
				<td>Agente</td>
				<td>Doc.</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			foreach($contratos_compra_venta as $contrato_compra_venta)
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
				<td><?php echo  cambiafecha_bd($contrato_compra_venta['fecha']);?></td>
				<td><?php echo  $contrato_compra_venta['apellidos'].", ".$contrato_compra_venta['nombre'];?></td>
				<td><?php echo  $contrato_compra_venta['apellidos_comprador'].", ".$contrato_compra_venta['nombre_comprador'];?></td>
				<td><?php echo  formatear_usuario($contrato_compra_venta['agente']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$contrato_compra_venta['cliente_vendedor']."/inmueble_".$contrato_compra_venta['inmueble']."/contrato_compra_venta_".$contrato_compra_venta['id_contrato_compra_venta'].".pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay generada ningún contrato de compra-venta para el inmueble seleccionado.</p>
<?php
		}
?>
		</div>
		<br clear="all" /><br  />
		<!-- Contrato de arrendamiento -->
		<div style="width:100%; float:left; text-align:left;">
			<div style="text-align:left; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Contrato de arrendamiento
				<br  />
			</div>
			<br clear="all" />
<?php
		if ($num_contratos_arrendamiento != 0)
		{			
?>
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="8">CONTRATO DE ARRENDAMIENTO</td></tr>
			<tr class="cabecera_tabla">
				<td>Fecha</td>
				<td>Tipo contrato</td>
				<td>Fecha inicio</td>
				<td>Fecha fin</td>
				<td>Arrendador</td>
				<td>Arrendatario</td>
				<td>Agente</td>
				<td>Doc.</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			foreach($contratos_arrendamiento as $contrato_arrendamiento)
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
				<td><?php echo  cambiafecha_bd($contrato_arrendamiento['fecha']);?></td>
				<td><?php echo  formatear_tipo_contrato_arrendamiento($contrato_arrendamiento['tipo_arrendamiento']);?></td>
				<td><?php echo  cambiafecha_bd($contrato_arrendamiento['fecha_inicio_contrato']);?></td>
				<td><?php echo  cambiafecha_bd($contrato_arrendamiento['fecha_fin_contrato']);?></td>
				<td><?php echo  $contrato_arrendamiento['apellidos'].", ".$contrato_arrendamiento['nombre'];?></td>
				<td><?php echo  $contrato_arrendamiento['apellidos_comprador'].", ".$contrato_arrendamiento['nombre_comprador'];?></td>
				<td><?php echo  formatear_usuario($contrato_arrendamiento['agente']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$contrato_arrendamiento['cliente_vendedor']."/inmueble_".$contrato_arrendamiento['inmueble']."/contrato_arrendamiento_".$contrato_arrendamiento['id_contrato_arrendamiento'].".pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay generada ningún contrato de arrendamiento para el inmueble seleccionado.</p>
<?php
		}
?>
		</div>
		<br clear="all" /><br  />
		<!--  Navegacion -->	
		<p align="right">
			<a href="editar.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="editar.php?id=<?php echo  $_GET['id']; ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>